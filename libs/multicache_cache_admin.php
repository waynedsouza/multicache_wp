<?php



/**

 * MulticacheWP

 * uri: http://www.multicache.org

 * Description: High Performance fastcache Controller

 * version 1.0.1.1

 * Author: Wayne DSouza

 * Author URI: http://onlinemarketingconsultants.in

 * License: GNU GENERAL PUBLIC LICENSE see license.txt

 */

defined('_MULTICACHEWP_EXEC') or die();



require_once plugin_dir_path(__FILE__).'multicache.php';

require_once plugin_dir_path(__FILE__).'multicache_stat.php';



class MulticacheCacheAdmin

{

	

	protected $_data = array();

	protected $_total = null;

	protected $_pagination = null;	

	protected $_file_count = null;	

	protected $_file_size = null;

	protected $_cache_type = 0;	

	

	protected static $instance = null;

	protected static $_ordering = null;	

	protected static $_direction = null;

	

	

	

	public function __construct()

	{

		$this->_pagination = new stdClass();

		$this->_pagination->limit = $this->initialisePagination('limit');		

		$this->_pagination->start  = $this->initialisePagination('start');

		$this->_cache_type = $this->getCacheType();

		

	}

	

	protected function getCacheType()

	{

		$user_ID = get_current_user_id();

		$cache_filter =(int) get_transient('multicache_cache_filter_'.$user_ID);

		if($cache_filter <=2 && $cache_filter >=0)

		{

			Return $cache_filter;

		}

		Return 0;

		

	}

	protected function initialisePagination($tag)

	{

		switch($tag)

		{

			case 'limit':

				$return = 20;

				break;

			case 'start':

				$return = 0;

				break;	

		}

		Return $return;

	}

	public static function getInstance()

	{

		// Only create the object if it doesn't exist.

		if (empty(self::$instance))

		{

	

			self::$instance = new MulticacheCacheAdmin();

		}

		return self::$instance;

	

	}

	

	public function getCacheAdminObject()

	{

		$cache_admin_object = new stdClass();

		$cache_admin_object->_data = $b = $this->getGroupCacheData();

		$cache_admin_object->stat = $this->getHitStats();

		$cache_admin_object->total = count($b);

		$cache_admin_object->cache_type = $this->_cache_type;

		

		Return $cache_admin_object;

	}

	protected function getGroupCacheData()

    {



        $config = MulticacheFactory::getConfig();

        $cache_handler_flag = $config->getC('storage') == 'fastcache' ? 1 : 0;

        

        if (empty($this->_data))

        {

            $cache = $this->getCache()->cache;

            $data = $cache->getAll();

            //$cachetypefilter = $this->getState('cacheType');

            $cachetypefilter = $this->_cache_type; //2 - memcache ; 1 - file cache

            

            if ($data != false)

            {

                if ($cachetypefilter == 2 && $cache_handler_flag)

                {

                    foreach ($data as $key => $value)

                    {

                       if(stripos($key,'_filecache') === false)

                        {

                            $temp[$key] = $value;

                        }

                    }

                    $this->_data = $data = $temp;

                }

                elseif ($cachetypefilter == 1 && $cache_handler_flag)

                {

                    

                    foreach ($data as $key => $value)

                    {

                        if (stripos($key, '_filecache') !== false)

                        {

                            $temp[$key] = $value;

                        }

                      

                    }

                    $this->_data = $data = $temp;

                }

                else

                {

                    $this->_data = $data;

                }

                $this->_total = count($data);

                

                if ($this->_total)

                {

                    

                    foreach ($data as $key => $value)

                    {

                        $this->_file_count += $value->count;

                        $this->_file_size += ($value->size * $this->_file_count);

                    }

                    

                    // Apply custom ordering

                    $ordering = 'group';//$this->getState('list.ordering');

                    $direction = 1;//($this->getState('list.direction') == 'asc') ? 1 : - 1;

                    self::$_ordering = $ordering;

                    self::$_direction = $direction;

                    

                    //jimport('joomla.utilities.arrayhelper');

                    $this->_data = MulticacheHelper::sortObjects($data, $ordering, $direction);

                    // usort($data, 'self::cmp');

                    $this->_data = $data;

                    // Apply custom pagination

                    if ($this->_total > $this->_pagination->limit && $this->_pagination->limit)

                    {

                        $this->_data = array_slice($this->_data, $this->_pagination->start, $this->_pagination->limit);

                    }

                }

            }

            else

            {

                $this->_data = array();

            }

        }

        return $this->_data;

    

    }

    

    

   protected  function getCache()

    {



        $conf = MulticacheFactory::getConfig();

        

        $options = array(

            'defaultgroup' => '',

            'storage' => $conf->getC('storage', 'fastcache'),

            'caching' => true,

            'cachebase' => WP_CONTENT_DIR .'/cache/',

        );

        

        $cache = Multicache::getInstance('', $options);

        

        return $cache;

    

    }

    

    protected function getHitStats()

    {

    	$ping = new MulticacheStat();

    	$ping->prepareStat();

    //lets ensure stats are updated here

    //end stats update

    global $wpdb;

    $table = $wpdb->prefix.'multicache_items_stats';

    $query = "SELECT * FROM $table ORDER BY timestamp desc";

    $quick_stat = $wpdb->get_row($query);

    /*

    	$db = JFactory::getDBO();

    	$query = $db->getQuery('true');

    	$query->select('*');

    	$query->from($db->quoteName('#__multicache_items_stats'));

    	$query->order($db->quotename('timestamp') . ' DESC');

    	$db->setQuery($query);

    	$quick_stat = $db->LoadObject();

    	*/

    	if (empty($quick_stat))

    	{

    		Return false;

    	}

    	if (($quick_stat->get_hits + $quick_stat->get_misses) > 0)

    	{

    		$quick_stat->getrate = $quick_stat->get_hits / ($quick_stat->get_hits + $quick_stat->get_misses);

    	}

    	else

    	{

    		$quick_stat->getrate = 0;

    	}

    	if (($quick_stat->delete_hits + $quick_stat->delete_hits))

    	{

    		$quick_stat->deleterate = $quick_stat->delete_hits / ($quick_stat->delete_hits + $quick_stat->delete_hits);

    	}

    	else

    	{

    		$quick_stat->deleterate = 0;

    	}

    	$quick_stat->filesize = $this->_file_size;

    	$quick_stat->filecount = $this->_file_count;

    

    	Return $quick_stat;

    

    }

    

    public function clean($group = '')

    {

    

    	$cache = $this->getCache()->cache;

    	$cache->clean($group);

    

    }

    

    public function clear_cache($array)

    {

    if(empty($array))

    {

    	Return false;

    }

    	foreach ($array as $group)

    	{

    		$this->clean($group);

    	}

    

    }

    

}