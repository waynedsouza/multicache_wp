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

require_once dirname(__FILE__) . '/multicache.php';
require_once dirname(__FILE__) . '/multicache_application.php';

class MulticacheFactory
{

    public static $config = null;

    protected $data;

    protected static $application = null;
    
    protected static $templater = null;
    
    protected static $tweaker = null;
    
    protected static $lnobject = null;
    
    protected static $strategy = null;
    
    protected static $cache = null;
    
    protected static $cache_admin = null;
    
    protected static $multicacheurls = null;
    
    protected static $multicacheuri = null;
    
    protected static $profiler = null;
    
    protected static $advancedsimulation = null;
    
    protected static $pagecacheobject = null;

    public function __construct($data = null)
    {

        $this->data = new stdClass();
        
        if (is_array($data) || is_object($data))
        {
            $this->bindData($this->data, $data);
        }
        elseif (! empty($data) && is_string($data))
        {
            $this->loadString($data);
        }
    
    }

    public static function getConfig($file = null, $type = 'PHP', $namespace = '')
    {

        if (! self::$config)
        {
            if ($file === null)
            {
                $file = dirname(__FILE__) . '/multicache_config.php';
            }
            
            self::$config = self::createConfig($file, $type, $namespace);
        }
        return self::$config;
    
    }

    public function getC($c_key, $default = null)
    {

        if (empty(self::$config) && ! isset($default))
        {
            Return false;
        }
      
        $conf_value = isset(self::$config->data->$c_key) ? self::$config->data->$c_key: null;
        if (! isset($conf_value))
        {
            if (isset($default))
            {
                Return $default;
            }
            Return null;
        }
        Return $conf_value;
    
    }

    public function setC($c_key, $value)
    {

        if (empty(self::$config))
        {
            Return false;
        }
        self::$config->data->$c_key = $value;
        if (! isset(self::$config->data->$c_key))
        {
            
            Return false;
        }
        Return true;
    
    }

    public static function getApplication()
    {

        if (! self::$application)
        {
            
            self::$application = MulticacheApplication::getInstance();
        }
        
        return self::$application;
    
    }
    
    public static function getTemplater()
    {
    	require_once dirname(__FILE__) . '/multicache_templater.php';
    
    	if (! self::$templater)
    	{
    
    		self::$templater = MulticacheTemplater::getInstance();
    	}
    
    	return self::$templater;
    
    }
    
    public static function getTweaker()
    {
    	require_once dirname(__FILE__) . '/multicache_tweaker.php';
    
    	if (! self::$tweaker)
    	{
    
    		self::$tweaker = MulticacheTweaker::getInstance();
    	}
    
    	return self::$tweaker;
    
    }
    
    public static function getLnObject()
    {
    	require_once dirname(__FILE__) . '/multicache_lnobject.php';
    
    	if (! self::$lnobject)
    	{
    
    		self::$lnobject = MulticacheLnObject::getInstance();
    	}
    
    	return self::$lnobject;
    
    }
    
    public static function getMulticacheUrls()
    {
    	require_once dirname(__FILE__) . '/multicache_urls.php';
    
    	if (! self::$multicacheurls)
    	{
    
    		self::$multicacheurls = MulticacheUrls::getInstance();
    	}
    
    	return self::$multicacheurls;
    
    }
    
    public static function getMulticacheURI()
    {
    
    	require_once dirname(__FILE__) . '/multicache_uri.php';
    
    	if (! self::$multicacheuri)
    	{
    
    		self::$multicacheuri = MulticacheUri::getInstance();
    	}
    
    	return self::$multicacheuri;
    
    }
    
    public static function getStrategy()
    {
    	require_once dirname(__FILE__) . '/multicache_strategy.php';
    
    	if (! self::$strategy)
    	{
    
    		self::$strategy = MulticacheStrategy::getInstance();
    	}
    
    	return self::$strategy;
    
    }
    
    public static function getCacheAdmin()
    {
    	require_once dirname(__FILE__) . '/multicache_cache_admin.php';
    
    	if (! self::$cache_admin)
    	{
    
    		self::$cache_admin = MulticacheCacheAdmin::getInstance();
    	}
    
    	return self::$cache_admin;
    
    }
    
    public static function getAdvancedSimulation()
    {
    	require_once dirname(__FILE__) . '/multicache_advancedsimulation.php';
    	if (! self::$advancedsimulation)
    	{
    
    		self::$advancedsimulation = MulticacheAdvancedSimulation::getInstance();
    	}
    
    	return self::$advancedsimulation;
    
    }
    
    public static function getPageCacheObject()
    {
    	require_once dirname(__FILE__) . '/multicache_pagecacheobject.php';
    
    	if (! self::$pagecacheobject)
    	{
    
    		self::$pagecacheobject = MulticachePageCacheObject::getInstance();
    	}
    
    	return self::$pagecacheobject;
    
    }
    
    public static function getCache($group = '', $handler = '', $storage = 'fastcache')
    {
    	$hash = md5($group . $handler . $storage);
    	if (isset(self::$cache[$hash]))
    	{
    		return self::$cache[$hash];
    	}
    	//$handler = ($handler == 'function') ? 'callback' : $handler;
    	$options = array('defaultgroup' => $group);
    	if (isset($storage))
    	{
    		$options['storage'] = $storage;
    	}
    	$cache = Multicache::getInstance($handler, $options);
    	self::$cache[$hash] = $cache;
    	return self::$cache[$hash];
    }

    protected static function createConfig($file, $type = 'PHP', $namespace = '')
    {

        if (is_file($file))
        {
            include_once $file;
        }
        
        $register = new MulticacheFactory();
        // Sanitize the namespace.
        $namespace = ucfirst((string) preg_replace('/[^A-Z_]/i', '', $namespace));
        // Build the config name.
        $name = 'MulticacheConfig' . $namespace;
        // Handle the PHP configuration type.
        if ($type == 'PHP' && class_exists($name))
        {
            // Create the JConfig object
            $config = new $name();
            
            // Load the configuration values into the registry
            $register->loadObject($config);
        }
        return $register;
    
    }

    protected function loadObject($object)
    {

        $this->bindData($this->data, $object);
    
    }

    protected function bindData($parent, $data)
    {
        // Ensure the input data is an array.
        if (is_object($data))
        {
            $data = get_object_vars($data);
        }
        else
        {
            $data = (array) $data;
        }
        foreach ($data as $k => $v)
        {
            if ((is_array($v) && self::isAssociative($v)) || is_object($v))
            {
                $parent->$k = new stdClass();
                $this->bindData($parent->$k, $v);
            }
            else
            {
                $parent->$k = $v;
            }
        }
    
    }

    protected static function isAssociative($array)
    {

        if (is_array($array))
        {
            foreach (array_keys($array) as $k => $v)
            {
                if ($k !== $v)
                {
                    return true;
                }
            }
        }
        return false;
    
    }
    
    /*
     * UNCOMMENT ERROR LOGGER FOR DEBUGGING ONLY
     */

    public static function getProfiler($prefix = '')
    {
    
    	require_once dirname(__FILE__) . '/multicache_profiler.php';
    
    	if (! self::$profiler[$prefix])
    	{
    
    		self::$profiler[$prefix] = MulticacheProfiler::getInstance($prefix);
    	}
    
    	return self::$profiler[$prefix];
    
    }
    public static function loadErrorLogger($message = '', $extra_message = '', $type = '', $error_file = 'multicache_factory_error_logger.log')
    {
    
    
    	$error_dir = dirname(dirname(__FILE__));
    	$uri = self::getMulticacheURI(); // this load MulticacheUri if not already present
    	$root = MulticacheUri::root();
    	$uri_context = $uri->toString();
    	$config = self::getConfig();
    	
    	    	
    	$error_file = $error_dir .'/logs/'. $error_file;
    	if (@filesize($error_file) >= 104857600)
    	{
    		Return;
    	}
    	$date = date('Y-m-d  H:i:s');
    
    	$s_vars = '  ua -' . $_SERVER['HTTP_USER_AGENT'] . '   ip - ' . $_SERVER['REMOTE_ADDR'];
    	$server_vars = $s_vars;
    	if ($_SERVER['REQUEST_METHOD'] != 'GET')
    	{
    		$request_vars = var_export($_REQUEST, true);
    		$request_vars .= var_export($_POST, true);
    		$request_vars .= var_export($_SERVER, true);
    	}
    	else
    	{
    		$request_vars = 'na';
    	}
    
    	if (! empty($extra_message))
    	{
    		$extra_message = var_export($extra_message, true);
    	}
    	$error_message = "\n" . $date . ' 	' . ' ' . $message . '  url-' . $uri_context . ' useragent-' . $s_vars . ' POST REQUEST' . $request_vars . '   extra message' . $extra_message;

    	error_log($error_message, 3, $error_file);
    
    }

}