<?php



/**

 * MulticacheWP

 * uri: http://www.multicache.org

 * Description: High Performance fastcache Controller

 * version 1.0.1.1

 * Author: Wayne DSouza

 * Author URI: http://multicachewp.com

 * License: GNU GENERAL PUBLIC LICENSE see license.txt

 */

defined('_MULTICACHEWP_EXEC') or die();









//JLoader::register('JCacheControllerPage', JPATH_ROOT . '/administrator/components/com_multicache/lib/page.php', true);

if(file_exists(plugin_dir_path(__FILE__).'jscachestrategy.php'))

{

	require_once plugin_dir_path(__FILE__).'jscachestrategy.php';

}

//JLoader::register('JsStrategy', JPATH_ROOT . '/administrator/components/com_multicache/lib/jscachestrategy.php');

require_once plugin_dir_path(__FILE__).'compression_libs/multicachehtmlminify.php';



//JLoader::register('MulticacheHtmlMinify', JPATH_ROOT . '/administrator/components/com_multicache/lib/compression_libs/multicachehtmlminify.php');

if(file_exists(plugin_dir_path(__FILE__).'jscachestrategy_simcontrol.php'))

{

	require_once plugin_dir_path(__FILE__).'jscachestrategy_simcontrol.php';

}

//JLoader::register('JsStrategySimControl', JPATH_ROOT . '/administrator/components/com_multicache/lib/jscachestrategy_simcontrol.php');



//customization hacks

if(file_exists(dirname(__FILE__) .'/multicache_mobilestrategy.php'))

{

	define('MULTICACHEEXTRAORDINARYMOBILE' ,true);

	require_once (dirname(__FILE__) .'/multicache_mobilestrategy.php');

}

if(file_exists(dirname(__FILE__) .'/multicache_extraordinary.php'))

{

	define('MULTICACHEEXTRAORDINARY' ,true);

	require_once (dirname(__FILE__) .'/multicache_extraordinary.php');

}

if(file_exists(dirname(__FILE__) .'/multicache_extraordinary_image.php'))

{

	define('MULTICACHEEXTRAORDINARYIMAGE' ,true);

	require_once (dirname(__FILE__) .'/multicache_extraordinary_image.php');

}

if(file_exists(dirname(__FILE__) .'/multicache_mobile_nolazy.php'))

{

	define('MULTICACHEIMAGENOLAZY' ,true);

	require_once (dirname(__FILE__) .'/multicache_mobile_nolazy.php');

}

//detox start

//js start

if(file_exists(dirname(__FILE__) .'/multicache_detox_orphanedjs.php'))

{

	define('MULTICACHEDETOXORPHANEDJS' ,true);

	require_once (dirname(__FILE__) .'/multicache_detox_orphanedjs.php');

}

//js end



//css start

if(file_exists(dirname(__FILE__) .'/multicache_detox_orphanedcss.php'))

{

	define('MULTICACHEDETOXORPHANEDCSS' ,true);

	require_once (dirname(__FILE__) .'/multicache_detox_orphanedcss.php');

}

//css end

//detox end







class MulticacheTweaker

{



    protected $uri = null;

    

    protected $current = null;

    

    protected $css_groupsasync = null;

    

    protected $body = null;

    

    protected $error_location = null;

    

	protected static $_signatures = null;



    protected static $_signatures_css = null;



    protected static $_loadsections = null;

    

    protected static $_loadsections_css = null;

    

    protected static $css_switch = null;



    protected static $js_switch = null;

    

    protected static $internal_lazy = false;

    

    protected static $internal_lazy_css = false;

    

    //version1.0.0.2

    protected static $dontmove_js_p = null;

    

    protected static $dontmove_urls_js_p = null;

    

    protected static $allow_multiple_orphaned = null;

    

    protected static $mobile_strategy_replace_inlinestyle = null;

    

    protected static $master_inlinecss_buffer_mobile = null;

    

    protected static $_img_urlstringexclude = null;

    //end v1.0.0.2



    protected $js_simulation = null;



    protected $js_advanced = null;



    protected $_debug_mode = null;



    protected $_minify_html = null;



    protected $_img_tweaks = null;



    protected static $_js_loadinstruction = null;



    protected static $_js_orphaned = null;



    protected static $_css_orphaned = null;



    protected static $_js_orphaned_buffer = null;



    protected static $_css_orphaned_buffer = null;



    protected static $_js_orphan_sig = null;



    protected static $_css_orphan_sig = null;



    protected static $_jscomments = null;



    protected static $_css_comments = null;

    

   

    protected static $_js_replace = null;



    protected static $_img_tweak_params = null;



    protected static $_cando = null;

    

    protected static $instance = null;

    

    //excluded scripts & styles

    protected static $_js_excludescripts = null;

    protected static $_css_excludescripts = null;

    protected static $_img_excludedscripts = null;

    

    //excclude page

    protected static $_js_excludepage = null;

    protected static $_css_excludepage = null;

    protected static $_img_excludepage = null;

    protected static $_lazy_load = null;

    protected static $_js_inlineorphaned_defer = null;

    protected static $_multicache_extraordinary_nolazy = null;

    //detox start

    protected static $_detox_orphaned_js_src = null;

    protected static $_detox_orphaned_js_code = null;

    protected static $_detox_orphaned_css_link = null;

    protected static $_detox_orphaned_css_code = null;

     

    

    function __construct()

    {

        //error_reporting(0);

        $this->params = $this->getSystemParams();

        self::$js_switch = isset($this->params->js_switch) ? $this->params->js_switch : 0;

        self::$css_switch = isset($this->params->css_switch) ? $this->params->css_switch : 0;

        $this->css_groupsasync = isset($this->params->css_groupsasync) ? $this->params->css_groupsasync : null;

        $this->js_simulation = isset($this->params->js_simulation) ? $this->params->js_simulation: 0;

        $this->js_advanced = $this->params->js_advanced;

        $this->_debug_mode = $this->params->debug_mode;

        $this->_minify_html = $this->params->minify_html;

        $this->_img_tweaks = $this->params->img_tweaks;

        

        if (isset($this->_debug_mode))

        {

            define('MULTICACHE_PLUGIN_DEBUG', true);

        }

        $this->conduit_switch = isset($this->params->conduit_switch) ? $this->params->conduit_switch : 0;

        $this->testing_switch = isset($this->params->testing_switch) ? $this->params->testing_switch : 0; 

        self::$_jscomments = isset($this->params->js_comments) ? $this->params->js_comments : 1;

        self::$_css_comments = isset($this->params->css_comments) ? $this->params->css_comments :1;

        self::$_js_loadinstruction = isset($this->params->js_loadinstruction) ? $this->params->js_loadinstruction : null;

        self::$_js_orphaned = $this->params->js_orphaned;

        self::$_css_orphaned = $this->params->orphaned_styles_loading;

        //inline  orphaned defer begin

        self::$_js_inlineorphaned_defer = array(

        		'mau' => 0,

        		'switch' =>0,

        		'jQuery'=> 'jQuery',

        		'time' => 30,

        		'count' => 100,

        		'ifjqdefined' => 0,

        		'head_loaded' => false,

        		'compress' => true,

        		'buffer' => array()

        );

        //inline orphan defer end

        $this->uri = MulticacheUri::getInstance();

        $this->current = MulticacheUri::current();

        $this->uri_root = MulticacheUri::root();

        

        

        if (! empty(self::$_js_orphaned))

        {

            self::$_js_orphaned_buffer = '';

        }

        if (! empty(self::$_css_orphaned))

        {

            self::$_css_orphaned_buffer = '';

        }

        $this->error_location = 'tweaker-';

        $this->setExcludedScriptsANDPages('JST');

        $this->setExcludedScriptsANDPages('CSS');

        $this->setExcludedScriptsANDPages('IMG');

    

    }

    

    protected function setExcludedScriptsANDPages($type)

    {

    	$classname = (null !== $this->uri->getVar('multicachesimulation', null)) || isset(self::$_js_loadinstruction) && ! empty($this->testing_switch) ? 'JsStrategySimControl':'JsStrategy';

    	$propertyname = $type.'excluded_components';

    	if(!property_exists($classname, $propertyname)

    			|| (property_exists($classname, $propertyname) && !isset($classname::$$propertyname))

    			)

    	{

    		return;

    	}

    	

 foreach($classname::$$propertyname As $key=>$value)

 {   

 	$path = $value['path'];	

 	if($value['value'] == 1)

 	{

    	switch($type)

    	{

    		case 'JST':

    			self::$_js_excludescripts[$path] = 1;

    			break;

    		case 'CSS':

    			self::$_css_excludescripts[$path] = 1;

    			break;

    		case 'IMG':

    		self::$_img_excludedscripts[$path] = 1;

    			

    		

    	}

 	}

 	elseif($value['value'] == 2)

 			{

 				switch($type)

 				{

 					case 'JST':

 						self::$_js_excludepage[$path] = 1;

 						break;

 					case 'CSS':

 						self::$_css_excludepage[$path] = 1;

 						break;

 					case 'IMG':

 						self::$_img_excludepage[$path] = 1;

 						 

 				

 				}

 			}

 }

    }

    

    public static function getInstance()

    {

    	// Only create the object if it doesn't exist.

    	if (empty(self::$instance))

    	{

    

    		self::$instance = new MulticacheTweaker();

    	}

    	return self::$instance;

    

    }

    

    protected function getSystemParams()

    {

    	static $_system_params = null;

    	if(isset($_system_params))

    	{

    		Return $_system_params;

    	}

    	$options_system_params_array = get_option('multicache_system_params');

    	$_system_params = MulticacheHelper::toObject($options_system_params_array);

    	Return $_system_params;    	

    }



    protected static function scriptInlineCodeWrap($code , $compress = false)

    {

    	if($compress)

    	{

    		$code = MulticacheJSOptimize::process($code);

    	}

    	Return '<script>' . $code . '</script>';

    }

    

    protected function performJstweaks($page)

    {



        if (null !== ($simflag = $this->uri->getVar('multicachesimulation', null)) || isset(self::$_js_loadinstruction) && ! empty($this->testing_switch))

        {

            

            if (! class_exists('JsStrategySimControl'))

            {

                $emessage = "Simulation Control did not successfully create the strategy. Please ensure Javascript Tweaks is properly initialised.";

                //JLog::add(JText::_($emessage) . ' req-' . $simflag . '	' . self::$_js_loadinstruction, JLog::ERROR);

                MulticacheHelper::log_error(__($emessage. ' req-' . $simflag . '	' . self::$_js_loadinstruction,'multicache-plugin') ,$this->error_location.'js');

                

                Return $page;

            }

            

           

            if (! $this->canDoOp('JST', 'JsStrategySimControl'))

            {

                Return $page;

            }

            

            

            if (self::$_js_loadinstruction === JsStrategySimControl::$simulation_id || $simflag === JsStrategySimControl::$simulation_id)

            {

                define("PLG_MULTICACHE_SIMCONTROL", true);

                if (defined('MULTICACHE_PLUGIN_DEBUG') && MULTICACHE_PLUGIN_DEBUG)

                {

                    $page = isset(self::$_js_loadinstruction) ? '<h1 style="font-size:6em;margin-top:0.5em;letter-spacing: 0.2em;line-height:2em;">LoadInstruction 	' . self::$_js_loadinstruction . '</h1>' . $page : $page;

                    $page = isset($simflag) ? '<h1 style="font-size:6em;margin-top:0.5em;letter-spacing: 0.5em;line-height: 2em;">Simflag 	' . $simflag . '</h1>' . $page : $page;

                }

                self::$_signatures = JsStrategySimControl::getJsSignature();

                $loadsections = JsStrategySimControl::getLoadSection();

            }

            else

            {

                

                $emessage = "Simulation Control error in simulation id.";

                //JLog::add(JText::_($emessage) . ' req-' . $simflag . '	' . self::$_js_loadinstruction . '	JsCacheready-' . JsStrategySimControl::$simulation_id, JLog::ERROR);

                MulticacheHelper::log_error($emessage  . ' req-' . $simflag . '	' . self::$_js_loadinstruction . '	JsCacheready-' . JsStrategySimControl::$simulation_id, $this->error_location.'js');

                Return $page;

            }

            

        }

        else

        {

            /*

             * check for excludes and return

             * begin

             */

            

            if (! $this->canDoOp('JST'))

            {

                Return $page;

            }

         

            

            define("PLG_MULTICACHE_STRATEGY", true);

            self::$_signatures = JsStrategy::getJsSignature();

            $loadsections = JsStrategy::getLoadSection();

            if (empty($loadsections))

            {

                Return $page;

            }

        }

        //version1.0.0.2 begin block

        if (defined('PLG_MULTICACHE_STRATEGY'))

        {

        	self::$dontmove_js_p = property_exists('JsStrategy', 'dontmove_js') ? JsStrategy::$dontmove_js : null;

        	self::$dontmove_urls_js_p = property_exists('JsStrategy', 'dontmove_urls_js') ? JsStrategy::$dontmove_urls_js : null;

        	self::$allow_multiple_orphaned = property_exists('JsStrategy', 'allow_multiple_orphaned') ? JsStrategy::$allow_multiple_orphaned : null;

        	;

        }

        elseif (defined('PLG_MULTICACHE_SIMCONTROL'))

        {

        	self::$dontmove_js_p = property_exists('JsStrategySimControl', 'dontmove_js') ? JsStrategySimControl::$dontmove_js : null;

        	self::$dontmove_urls_js_p = property_exists('JsStrategySimControl', 'dontmove_urls_js') ? JsStrategySimControl::$dontmove_urls_js : null;

        	self::$allow_multiple_orphaned = property_exists('JsStrategySimControl', 'allow_multiple_orphaned') ? JsStrategySimControl::$allow_multiple_orphaned : null;

        }

        //v1.0.0.2 end block

        //detox orphaned begin

        if(defined('MULTICACHEDETOXORPHANEDJS'))

        {

        	self::$_detox_orphaned_js_src = property_exists('MulticacheDetoxOrphanedJS' ,'_js_src') ? MulticacheDetoxOrphanedJS::$_js_src : null;

        	self::$_detox_orphaned_js_code = property_exists('MulticacheDetoxOrphanedJS' ,'_js_code') ? MulticacheDetoxOrphanedJS::$_js_code : null;

        }

        //detox orphaned end

        

       /* $search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<script(?= (?> [^\\s>]*+[\\s] (?(?=type= )type=["\']?(?:text|application)/javascript ) )*+ [^\\s>]*+> )(?:(?> [^\\s>]*+\\s )+? (?>src)=["\']?)?[^>]*+> (?> <?[^<]*+ )*? </script>)|\\K$)~six';*/

       /*$search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<script(?= (?> [^\\s>]*+[\\s] (?(?=type= )type=["\']?(?:text|application)/javascript ) )*+ [^\\s>]*+> )(?:(?> [^\\s>]*+\\s )+? (?>src)=["\']?( (?<!["\']) [^\\s>]*+| (?<!\') [^"]*+ | [^\']*+ ))?[^>]*+>(?: (?> <?[^<]*+ )*? )</script>)|\\K$)~six';*/

         $search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<script(?= (?> [^\\s>]*+[\\s] (?(?=type= )type=["\']?(?:text|application)/javascript ) )*+ [^\\s>]*+> )(?:(?> [^\\s>]*+\\s )+? (?>src)=["\']?( (?<!["\']) [^\\s>]*+| (?<!\') [^"]*+ | [^\']*+ ))?[^>]*+>( (?> <?[^<]*+ )*? )</script>)|\\K$)~six';

        

        $tweaks = preg_replace_callback($search, 'self::matchJsSignature', $page);

        //version1.0.0.2

        $tweaks = isset($tweaks) ? $tweaks : $page;

        

        $multicache_name = (isset($simflag) || isset(self::$_js_loadinstruction)) ? 'MulticacheSimControl' : 'MulticachePlugin';

        

        $load_js = array(); // a carry over var for combining js to css

                                                       

         //v1.0.0.2 does away with stubs completely 

         //dated comment->v1.0.0.0looks like a potential mistake here simcontrol loading stubs from strategy

         /*

        if (defined("PLG_MULTICACHE_STRATEGY") && property_exists('JsStrategy', 'stubs'))

        {

            $stub = unserialize(JsStrategy::$stubs);

            $preheadsection_search = $stub["head_open"];

            $headsection_search = $stub["head"];

            $bodysection_search = $stub["body"];

            $footersection_search = $stub["footer"];

        }

        elseif (defined("PLG_MULTICACHE_SIMCONTROL") && property_exists('JsStrategySimControl', 'stubs'))

        {

            $stub = unserialize(JsStrategySimControl::$stubs);

            $preheadsection_search = $stub["head_open"];

            $headsection_search = $stub["head"];

            $bodysection_search = $stub["body"];

            $footersection_search = $stub["footer"];

        }

        else

        {

            $preheadsection_search = array(

                '<head>'

            );

            $headsection_search = array(

                '</head>'

            );

            $bodysection_search = array(

                '<body>'

            );

            $footersection_search = array(

                '</body>'

            );

        }

        

        if(empty($headsection_search))

        {

        	$headsection_search = array(

        			'</head>'

        	);

        }

        if(empty($footersection_search))

        {

        	$footersection_search = array(

                '</body>'

            );

        }

        */

        //version1.0.0.2 start preg code

        $preheadsection_search = '~<head(

            (?(?=(\s[^>]*))\s[^>]*)

            )>~ixU';

        $headsection_search = '~</head(

            (?(?=(\s[^>]*))\s[^>]*)

            )>~ixU';

        $bodysection_search = '~<body(

            (?(?=(\s[^>]*))\s[^>]*)

            )>~ixU';

        $footersection_search = '~</body(

            (?(?=(\s[^>]*))\s[^>]*)

            )>~ixU';

        // replacers

        $prehead = '<head\1>';

        $head = '</head\1>';

        $body_tag = '<body\1>';

        $foot_tag = '</body\1>';

        // end preg code

        // begin

        $search_array = array(); // initialise search array to null array

        $replace_array = array();

        $comment_end = "Loaded by " . $multicache_name . " Copyright OnlineMarketingConsultants.in-->";

        //moved out of moderate self::$_js_orphaned block

        if (is_array($loadsections))

        {

        	$temp_js = array_filter($loadsections);

        	$all_keys = array_keys($temp_js);

        	$lazyloadsection = isset($all_keys) && is_array($all_keys) ? max($all_keys) : 2;

        }

        // moderate self::$_js_orphaned

        if (! empty(self::$_js_orphaned_buffer) && ! empty(self::$_js_orphaned) && empty($loadsections[self::$_js_orphaned]))

        {

           

            //verion1.0.0.2  IMPORTANT COMMENTED UNDER TESTING

            //self::$_js_orphaned = isset($all_keys) && is_array($all_keys) ? max($all_keys) : self::$_js_orphaned;

        }

        

        //prepare lazy slugs

        if(!empty(self::$_lazy_load['script']))

        {

        			//deactivated for combined test

        			//$p_speed = self::checkPageSpeedStrategy(null , true);

        			$p_speed = null;

                     if(isset($p_speed) && (!empty($p_speed['resultant_async']) || !empty($p_speed['resultant_defer'])))

        		     {

        		     	$lazyslug  =   MulticacheHelper::getloadableSourceScript(plugins_url('delivery/assets/js/jquery.lazyloadad.js' , dirname(__FILE__))) . MulticacheHelper::getloadableCodeScript(self::$_img_tweak_params["ll_script"]);

                      }

                     else 

                     {

            	$lazyslug  =   MulticacheHelper::getloadableSourceScript(plugins_url('delivery/assets/js/jquery.lazyload.js' , dirname(__FILE__)))/* . MulticacheHelper::getloadableCodeScript(self::$_img_tweak_params["ll_script"])*/;

        	

                     }

            $lazyslug = self::checkPageSpeedStrategy($lazyslug);

        }

        //setup orphaned inlined defer

        if(!empty(self::$_js_inlineorphaned_defer) && 1 === self::$_js_inlineorphaned_defer['switch'])

        {

        	$inline_orphaned_buffer_head = 'window.MULTICACHEDEFERINLINELOAD=[];var loadMulticacheinlineddefer=function(){for(var E=window.MULTICACHEDEFERINLINELOAD.length,I=0;E>I;I++)window.MULTICACHEDEFERINLINELOAD[I](),window.MULTICACHEDEFERINLINELOAD[I]=function(){}};';

        	if(!empty(self::$_js_inlineorphaned_defer['mau']))

        	{

        		$inline_orphaned_buffer_mau_trigger = 'if("undefined"!=typeof multicache_MAU&&"undefined"!=typeof loadMulticacheinlineddefer){var check={checkType:function(){return typeof '.self::$_js_inlineorphaned_defer['jQuery'].'},name:"multicache_defered_inline"};multicache_MAU(loadMulticacheinlineddefer,function(){console.log("failed to load inline defer orphaned")},check,'.self::$_js_inlineorphaned_defer['time'].',void 0,' .self::$_js_inlineorphaned_defer['count']. ',check.name)}';

        	}

        }

        

        if (! empty($loadsections[1]))

        {

        	/*v1.0.0.2

            foreach ($preheadsection_search as $prehead)

            {

                $search_array[] = $prehead;

                $load_js[1]["search"][] = $prehead;

                $comment = "<!--pre headsection ";

                $r_code = $prehead . trim(unserialize($loadsections[1]));

                $load_js1_item_temp = trim(unserialize($loadsections[1]));

                if (! empty(self::$_js_orphaned_buffer) && isset(self::$_js_orphaned) && self::$_js_orphaned == 1)

                {

                    

                    $r_code = self::$_jscomments ? $r_code . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $r_code . self::$_js_orphaned_buffer;

                    $load_js1_item_temp = self::$_jscomments ? $load_js1_item_temp . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $load_js1_item_temp . self::$_js_orphaned_buffer;

                }

                $replace_array[] = self::$_jscomments ? $r_code . $comment . $comment_end : $r_code;

                $load_js[1]["item"][] = self::$_jscomments ? $load_js1_item_temp . $comment . $comment_end : $load_js1_item_temp;

            }

            */

        	

        	//version 1.0.0.2

        	$search_array[] = $preheadsection_search;

        	$load_js[1]["search"][] = $preheadsection_search;

        	$comment = "<!--pre headsection ";

        	$r_code = $prehead . trim(unserialize($loadsections[1]));

        	$load_js1_item_temp = trim(unserialize($loadsections[1]));

        	if(empty(self::$internal_lazy) && !empty(self::$_lazy_load['script']) && strpos($loadsections[1] ,'jquery')!== false)

        	{

        		

        		

        		$r_code .= $lazyslug;

        		$load_js1_item_temp .= $lazyslug;

        		self::$internal_lazy = true;

        		

        	}

        	if(isset($inline_orphaned_buffer_head) && false === self::$_js_inlineorphaned_defer['head_loaded'])

        	{

        		$r_code = self::scriptInlineCodeWrap($inline_orphaned_buffer_head) . $r_code;

        		$load_js1_item_temp = self::scriptInlineCodeWrap($inline_orphaned_buffer_head) .$load_js1_item_temp;

        		self::$_js_inlineorphaned_defer['head_loaded'] = true;

        	}

        	if (! empty(self::$_js_orphaned_buffer) && isset(self::$_js_orphaned) && self::$_js_orphaned == 1)

        	{

        	

        		$r_code = self::$_jscomments ? $r_code . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $r_code . self::$_js_orphaned_buffer;

        		$load_js1_item_temp = self::$_jscomments ? $load_js1_item_temp . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $load_js1_item_temp . self::$_js_orphaned_buffer;

        	}

        	$replace_array[] = self::$_jscomments ? $r_code . $comment . $comment_end : $r_code;

        	$load_js[1]["item"][] = self::$_jscomments ? $load_js1_item_temp . $comment . $comment_end : $load_js1_item_temp;

        	$load_js[1]["tag"][] = $prehead;

        	 

        }

        

        if (! empty($loadsections[2]))

        {

        	/*

            foreach ($headsection_search as $head)

            {

                $search_array[] = $head;

                $load_js[2]["search"][] = $head;

                $comment = "<!-- headsection ";

                $r_code = trim(unserialize($loadsections[2]));

                $load_js2_item_temp = trim(unserialize($loadsections[2]));

                if(!empty(self::$_lazy_load['script']))

                {

                	$r_code .= MulticacheHelper::getloadableSourceScript(plugins_url('delivery/assets/js/jquery.lazyload.js' , dirname(__FILE__))) . MulticacheHelper::getloadableCodeScript(self::$_img_tweak_params["ll_script"]);

                	$load_js2_item_temp .= MulticacheHelper::getloadableSourceScript(plugins_url('delivery/assets/js/jquery.lazyload.js' , dirname(__FILE__))) . MulticacheHelper::getloadableCodeScript(self::$_img_tweak_params["ll_script"]);

                }

                if (! empty(self::$_js_orphaned_buffer) && isset(self::$_js_orphaned) && self::$_js_orphaned == 2)

                {

                    

                    $r_code = self::$_jscomments ? $r_code . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $r_code . self::$_js_orphaned_buffer;

                    $load_js2_item_temp = self::$_jscomments ? $load_js2_item_temp . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $load_js2_item_temp . self::$_js_orphaned_buffer;

                }

                $r_code .= $head;

                $replace_array[] = self::$_jscomments ? $comment . $comment_end . $r_code : $r_code;

                $load_js[2]["item"][] = self::$_jscomments ? $comment . $comment_end . $load_js2_item_temp : $load_js2_item_temp;

            }

            */

        	//version1.0.0.2

        	$search_array[] = $headsection_search;

        	$load_js[2]["search"][] = $headsection_search;

        	$comment = "<!-- headsection ";

        	$r_code = trim(unserialize($loadsections[2]));

        	$load_js2_item_temp = trim(unserialize($loadsections[2]));

        	if(empty(self::$internal_lazy) && !empty(self::$_lazy_load['script']) && strpos($loadsections[2] ,'jquery')!== false)

        	{

        		

        		$r_code .= $lazyslug;

        		$load_js2_item_temp .=  $lazyslug;

        		self::$internal_lazy = true;

        	}

        	if(isset($inline_orphaned_buffer_head) && false === self::$_js_inlineorphaned_defer['head_loaded'])

        	{

        		$r_code = self::scriptInlineCodeWrap($inline_orphaned_buffer_head) . $r_code;

        		$load_js2_item_temp = self::scriptInlineCodeWrap($inline_orphaned_buffer_head) .$load_js2_item_temp;

        		self::$_js_inlineorphaned_defer['head_loaded'] = true;

        	}

        	if (! empty(self::$_js_orphaned_buffer) && isset(self::$_js_orphaned) && self::$_js_orphaned == 2)

        	{

        		$r_code = self::$_jscomments ? $r_code . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $r_code . self::$_js_orphaned_buffer;

        		$load_js2_item_temp = self::$_jscomments ? $load_js2_item_temp . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $load_js2_item_temp . self::$_js_orphaned_buffer;

        	}

        	$r_code .= $head;

        	$replace_array[] = self::$_jscomments ? $comment . $comment_end . $r_code : $r_code;

        	$load_js[2]["item"][] = self::$_jscomments ? $comment . $comment_end . $load_js2_item_temp : $load_js2_item_temp;

        	$load_js[2]["tag"][] = $head;

        }

        

        if (! empty($loadsections[3]))

        {

        	/*

            foreach ($bodysection_search as $body_tag)

            {

                $search_array[] = $body_tag;

                $load_js[3]["search"][] = $body_tag;

                $comment = "<!-- bodysection ";

                $r_code = $body_tag . trim(unserialize($loadsections[3]));

                $load_js3_item_temp = trim(unserialize($loadsections[3]));

                if (! empty(self::$_js_orphaned_buffer) && isset(self::$_js_orphaned) && self::$_js_orphaned == 3)

                {

                    

                    $r_code = self::$_jscomments ? $r_code . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $r_code . self::$_js_orphaned_buffer;

                    $load_js[3]["item"][] = self::$_jscomments ? $load_js3_item_temp . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $load_js3_item_temp . self::$_js_orphaned_buffer;

                }

                $replace_array[] = self::$_jscomments ? $r_code . $comment . $comment_end : $r_code;

                $load_js[3]["item"][] = self::$_jscomments ? $load_js3_item_temp . $comment . $comment_end : $load_js3_item_temp;

            }

            */

        	//version - 1.0.0.2

        	$search_array[] = $bodysection_search;

        	$load_js[3]["search"][] = $bodysection_search;

        	$comment = "<!-- bodysection ";

        	$r_code = $body_tag . trim(unserialize($loadsections[3]));

        	$load_js3_item_temp = trim(unserialize($loadsections[3]));

        	if(empty(self::$internal_lazy) && !empty(self::$_lazy_load['script']) && strpos($loadsections[3] ,'jquery')!== false)

        	{

        		

        		$r_code .= $lazyslug;

        		$load_js3_item_temp .= $lazyslug;

        		self::$internal_lazy = true;

        	}

        	if(isset($inline_orphaned_buffer_head) && false === self::$_js_inlineorphaned_defer['head_loaded'])

        	{

        		$r_code = self::scriptInlineCodeWrap($inline_orphaned_buffer_head) . $r_code;

        		$load_js3_item_temp = self::scriptInlineCodeWrap($inline_orphaned_buffer_head) .$load_js3_item_temp;

        		self::$_js_inlineorphaned_defer['head_loaded'] = true;

        	}

        	if (! empty(self::$_js_orphaned_buffer) && isset(self::$_js_orphaned) && self::$_js_orphaned == 3)

        	{

        	

        		$r_code = self::$_jscomments ? $r_code . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $r_code . self::$_js_orphaned_buffer;

        		$load_js3_item_temp = self::$_jscomments ? $load_js3_item_temp . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $load_js3_item_temp . self::$_js_orphaned_buffer;

        	}

        	$replace_array[] = self::$_jscomments ? $r_code . $comment . $comment_end : $r_code;

        	$load_js[3]["item"][] = self::$_jscomments ? $load_js3_item_temp . $comment . $comment_end : $load_js3_item_temp;

        	$load_js[3]["tag"][] = $body_tag;

        }

        

       // if (! empty($loadsections[4]))

       if (! empty($loadsections[4]) || (isset(self::$_js_orphaned) && self::$_js_orphaned == 4))

        {

        	/*

            foreach ($footersection_search as $foot_tag)

            {

                $search_array[] = $foot_tag;

                $load_js[4]["search"][] = $foot_tag;

                $comment = "<!-- footsection ";

                $r_code = trim(unserialize($loadsections[4]));

                $load_js4_item_temp = trim(unserialize($loadsections[4]));

                if (! empty(self::$_js_orphaned_buffer) && isset(self::$_js_orphaned) && self::$_js_orphaned == 4)

                {

                    

                    $r_code = self::$_jscomments ? $r_code . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $r_code . self::$_js_orphaned_buffer;

                    $load_js4_item_temp = self::$_jscomments ? $load_js4_item_temp . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $load_js4_item_temp . self::$_js_orphaned_buffer;

                }

                $r_code .= $foot_tag;

                $replace_array[] = self::$_jscomments ? $comment . $comment_end . $r_code : $r_code;

                $load_js[4]["item"][] = self::$_jscomments ? $comment . $comment_end . $load_js4_item_temp : $load_js4_item_temp;

            }

            */

        	//version1.0.0.2

        	$search_array[] = $footersection_search;

        	$load_js[4]["search"][] = $footersection_search;

        	$comment = "<!-- footsection ";

        	$r_code = ! empty($loadsections[4]) ? trim(unserialize($loadsections[4])) : '';

        	$load_js4_item_temp = ! empty($loadsections[4]) ? trim(unserialize($loadsections[4])) : '';

        	if(empty(self::$internal_lazy) && !empty(self::$_lazy_load['script']) && strpos($loadsections[4] ,'jquery')!== false)

        	{

        		

        		$r_code .= $lazyslug;

        		$load_js4_item_temp .= $lazyslug;

        		self::$internal_lazy = true;//leaving this hanging for now

        	}

        	if(isset($inline_orphaned_buffer_head) && false === self::$_js_inlineorphaned_defer['head_loaded'])

        	{

        		$r_code = self::scriptInlineCodeWrap($inline_orphaned_buffer_head) . $r_code;

        		$load_js4_item_temp = self::scriptInlineCodeWrap($inline_orphaned_buffer_head) .$load_js4_item_temp;

        		self::$_js_inlineorphaned_defer['head_loaded'] = true;

        	}

        	if (! empty(self::$_js_orphaned_buffer) && isset(self::$_js_orphaned) && self::$_js_orphaned == 4)

        	{

        	

        		$r_code = self::$_jscomments ? $r_code . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $r_code . self::$_js_orphaned_buffer;

        		$load_js4_item_temp = self::$_jscomments ? $load_js4_item_temp . '<!-- orphaned scripts -->' . self::$_js_orphaned_buffer : $load_js4_item_temp . self::$_js_orphaned_buffer;

        	}

        	//start mau inline defer code

        	if(!empty(self::$_js_inlineorphaned_defer) && 1=== self::$_js_inlineorphaned_defer['switch']

        			&& 1=== self::$_js_inlineorphaned_defer['mau'])

        	{

        		$r_code .= self::scriptInlineCodeWrap( 'if("undefined"!==typeof multicache_MAU&&"undefined"!==typeof loadMulticacheinlineddefer){var check={checkType:function(){return typeof '.self::$_js_inlineorphaned_defer['jQuery'].'},name:"multicache_defered_inline"};multicache_MAU(loadMulticacheinlineddefer,function(){console.log("failed to load inline defer orphaned")},check,'.self::$_js_inlineorphaned_defer['time'].',void 0,'.self::$_js_inlineorphaned_defer['count'].',check.name)}' , true);

        		$load_js4_item_temp .= self::scriptInlineCodeWrap( 'if("undefined"!==typeof multicache_MAU&&"undefined"!==typeof loadMulticacheinlineddefer){var check={checkType:function(){return typeof '.self::$_js_inlineorphaned_defer['jQuery'].'},name:"multicache_defered_inline"};multicache_MAU(loadMulticacheinlineddefer,function(){console.log("failed to load inline defer orphaned")},check,'.self::$_js_inlineorphaned_defer['time'].',void 0,'.self::$_js_inlineorphaned_defer['count'].',check.name)}' , true);

        	}

        	//end mau inline defer code

        	$r_code .= $foot_tag;

        	$replace_array[] = self::$_jscomments ? $comment . $comment_end . $r_code : $r_code;

        	$load_js[4]["item"][] = self::$_jscomments ? $comment . $comment_end . $load_js4_item_temp : $load_js4_item_temp;

        	$load_js[4]["tag"][] = $foot_tag;

        }

        elseif(!empty(self::$_js_inlineorphaned_defer) && 1=== self::$_js_inlineorphaned_defer['switch']

        		&& 1=== self::$_js_inlineorphaned_defer['mau'])

        {

        	//critical footer scripts

        	$search_array[] = $footersection_search;

        	$load_js[4]["search"][] = $footersection_search;

        	$comment = "<!-- footsection Critical ";

        	//start mau inline defer code

        	 

        	$r_code = self::scriptInlineCodeWrap( 'if("undefined"!==typeof multicache_MAU&&"undefined"!==typeof loadMulticacheinlineddefer){var check={checkType:function(){return typeof '.self::$_js_inlineorphaned_defer['jQuery'].'},name:"multicache_defered_inline"};multicache_MAU(loadMulticacheinlineddefer,function(){console.log("failed to load inline defer orphaned")},check,'.self::$_js_inlineorphaned_defer['time'].',void 0,'.self::$_js_inlineorphaned_defer['count'].',check.name)}' , true);

        	$load_js4_item_temp = self::scriptInlineCodeWrap( 'if("undefined"!==typeof multicache_MAU&&"undefined"!==typeof loadMulticacheinlineddefer){var check={checkType:function(){return typeof '.self::$_js_inlineorphaned_defer['jQuery'].'},name:"multicache_defered_inline"};multicache_MAU(loadMulticacheinlineddefer,function(){console.log("failed to load inline defer orphaned")},check,'.self::$_js_inlineorphaned_defer['time'].',void 0,'.self::$_js_inlineorphaned_defer['count'].',check.name)}' , true);

        	 

        	//end mau inline defer code

        	$r_code .= $foot_tag;

        	$replace_array[] = self::$_jscomments ? $comment . $comment_end . $r_code : $r_code;

        	$load_js[4]["item"][] = self::$_jscomments ? $comment . $comment_end . $load_js4_item_temp : $load_js4_item_temp;

        	$load_js[4]["tag"][] = $foot_tag;

        	 

        }

        

        if (! empty($replace_array))

        {

            if (self::$css_switch)

            {

                

                self::$_js_replace = $load_js;

                Return $tweaks; // at this point $tweaks is stripped of its script tags

            }

           // $tweaks = str_replace($search_array, $replace_array, $tweaks);

            $tweaks = preg_replace($search_array, $replace_array, $tweaks);

        }

        

        Return $tweaks;

    

    }

    

    //version 10.0.2

    protected static function checkPageSpeedStrategy( $obj , $getstrat = false)

    {

    	$pagespeed_obj = property_exists('JsStrategy' ,'pagespeed_strategy' )? JsStrategy::$pagespeed_strategy :false;

    	if($getstrat)

    	{

    		Return $pagespeed_obj;

    	}

    	if(!$pagespeed_obj || strpos($obj , 'google') !== false)

    	{

    		Return $obj;

    	}

    	$search = '~(<script[^>]*?)>~';

    	if(!empty($pagespeed_obj['resultant_async']) && strpos($obj, ' async') === false)

    	{

    		//$obj = str_replace('>' , ' async >' , $obj);

    

    		$obj = preg_replace($search , '$1 async >' , $obj);

    	}

    	if(!empty($pagespeed_obj['resultant_defer']) && strpos($obj, ' defer') === false)

    	{

    		//$obj = str_replace('>' , ' defer >' , $obj);

    		$obj = preg_replace($search , '$1 defer >' , $obj);

    	}

    	Return $obj;

    

    

    }

    

    protected static function wrapInlineDeferStub($stub , $compress = false)

    {

    	if($compress)

    	{

    		$stub = MulticacheJSOptimize::process($stub);

    	}

    	/*$inline_code = '"undefined"!==typeof '.self::$_js_inlineorphaned_defer['jQuery'].'?('.$stub.'):window.MULTICACHEDEFERINLINELOAD.push(function(){'.$stub.'});';*/

    	$inline_code = 'if("undefined" !== typeof ' . self::$_js_inlineorphaned_defer['jQuery'].'){'.$stub.';}else{window.MULTICACHEDEFERINLINELOAD.push(function(){' .$stub. ' });}';

    	Return  self::scriptInlineCodeWrap($inline_code);

    }



    protected static function matchJsSignature($matches)

    {



        if (empty($matches[0]))

        {

            Return $matches[0];

        }

        //dequeue lazyload0

        if(strpos($matches[0] ,'/jquery.lazyloado.js')!== false )

        {

        	Return "";

        }

        //wrap for code

        if(!empty(self::$_js_inlineorphaned_defer)

        		&& 1 === self::$_js_inlineorphaned_defer['switch']

        		&& !empty($matches[2])

        		&& strpos($matches[2] , 'adsbygoogle' ) === false

        		&&(

        				0 === self::$_js_inlineorphaned_defer['ifjqdefined']

        				|| (1 === self::$_js_inlineorphaned_defer['ifjqdefined']

        						&& strpos( $matches[2] , self::$_js_inlineorphaned_defer['jQuery'] )!== false )

        				)

        		)

        {

        	 

        	$matches[0] = self::wrapInlineDeferStub($matches[2]);

        }

        // positional excludes come here

        if(isset(self::$_js_excludescripts) && !empty($matches[1]))

        {

        	foreach(self::$_js_excludescripts As $key_path_script =>$val)

        	{

        		if(stripos($matches[1],$key_path_script) !== false)

        		{

        			//assiging async and defer is not in our scope for excluded scripts

        			Return $matches[0];

        		}

        	}

        }

        // version1.0.0.2 positional excludes come here

        // urls begin

        if (isset(self::$dontmove_urls_js_p))

        {

        	foreach (self::$dontmove_urls_js_p as $bit => $val)

        	{

        		if (stripos($matches[0], $bit) !== false)

        		{

        			Return self::checkPageSpeedStrategy($matches[0]);

        		}

        	}

        }

        $sig = md5(serialize($matches[0]));

        //version1.0.0.2 hash begin

        if (isset(self::$dontmove_js_p[$sig]))

        {

        	Return self::checkPageSpeedStrategy($matches[0]);

        }

        // hash end

        if (isset(self::$_signatures[$sig]))

        {

            $blank = "";

            Return $blank;

        }

        else

        {

            if (empty(self::$_js_orphaned))

            {

                Return self::checkPageSpeedStrategy($matches[0]);

            }

            $blank = '';

            

            //detox orphaned

            if(isset(self::$_detox_orphaned_js_src) && !empty($matches[1]))

            {

            	//src links

            	foreach(self::$_detox_orphaned_js_src As $key=> $src)

            	{

            		if(strpos($matches[1] , $src['name']) !== false)

            		{

            			Return $blank;

            		}

            	}

            	 

            }

            if(isset(self::$_detox_orphaned_js_code) && !empty($matches[2]))

            {

            	 

            	//src links

            	foreach(self::$_detox_orphaned_js_code As $key=> $code)

            	{

            

            		$check_1 = $check_2 = $check_3 = false;

            		if( strpos($matches[2] , $code['name']) !== false)

            		{

            			//Return $blank;

            			$check_1 = true;

            		}

            		if( strpos($matches[2] , $code['name_2']) !== false)

            		{

            			//Return $blank;

            			$check_2 = true;

            		}

            		if( strpos($matches[2] , $code['name_3']) !== false)

            		{

            			//Return $blank;

            			$check_3 = true;

            		}

            

            		if($check_1 && $check_2 && $check_3)

            		{

            			$test_ejection = false;

            			if($test_ejection)

            			{

            				error_log(var_export($matches[2] , true) , 3 , dirname(__FILE__).'/zzeject.log');

            			}

            			Return $blank;

            		}

            	}

            	 

            }

            //end detox orphaned

                  

            if (! isset(self::$_js_orphan_sig[$sig]))

            {

                self::$_js_orphaned_buffer .= self::checkPageSpeedStrategy($matches[0]);

                //self::$_js_orphan_sig[$sig] = 1; // loads orphans only once

                //version1.0.0.2

                $skip = false;

                if (isset(self::$allow_multiple_orphaned) && is_array(self::$allow_multiple_orphaned))

                {

                

                	foreach (self::$allow_multiple_orphaned as $key => $v)

                	{

                		if (strpos($matches[0], $key) !== false)

                		{

                			$skip = true;

                			break;

                		}

                	}

                }

                if (! (isset(self::$allow_multiple_orphaned) && self::$allow_multiple_orphaned === - 1) && ! $skip)

                {

                	self::$_js_orphan_sig[$sig] = 1; // loads orphans only once

                }

            }

            Return $blank;

        }

    

    }



    protected function accountForJavascript($tweaks)

    {



  if (empty(self::$_js_replace))

        {

            Return $tweaks;

        }

        $search_array = array();

        $replace_array = array();

        $load_js = self::$_js_replace;

        foreach ($load_js as $key => $item)

        {

        	if(empty($item))

        	{

        		continue;

        	}

        	foreach($item As $type => $code)

        	{

        		if(empty($code))

        		{

        			continue;

        		}

        		foreach($code As $k => $string)

        		{

        		

        		     if($type == 'search')

        		     {

        		       $search_array[] =$string;

        		     }

        		      elseif($type=='item')

        		      {

        		        //$replace_array[] = strpos($item['search'][$k] ,'</')  !==false  ? $string . $item['search'][$k] : $item['search'][$k]. $string;

        		        //version1.0.0.2

        		         $replace_array[] = strpos($item['search'][$k] , '</') !== false ? $string . $item['tag'][$k] : $item['tag'][$k] . $string;

        		      }

        		}

        	}

            

        }

       

        //$tweaks = str_replace($search_array, $replace_array, $tweaks);

        //version1.0.0.2

          $tweaks = preg_replace($search_array, $replace_array, $tweaks);

        Return $tweaks;

    

    }



    protected function performCsstweaks($page)

    {



        if (! $this->canDoOp('CSS'))

        {

            $page = $this->accountForJavascript($page);

            Return $page;

        }

        // css exclusions



        

        if (! class_exists('JsStrategy') 

        		|| ! property_exists('JsStrategy', 'sig_css') 

        		|| (property_exists('JsStrategy', 'sig_css') && !isset(JsStrategy::$sig_css))

        		|| ! property_exists('JsStrategy', 'loadsec_css')

        		|| (property_exists('JsStrategy', 'loadsec_css') && !isset(JsStrategy::$loadsec_css))

        		)

        {

            $page = $this->accountForJavascript($page);

            Return $page;

        }

        

        self::$_signatures_css = JsStrategy::$sig_css;

        $loadsections_css = JsStrategy::$loadsec_css;

        

        if (empty($loadsections_css))

        {

            // if any remnants from js tweaks dump them here

            $page = $this->accountForJavascript($page);

            

            return $page;

        }

        //detox orphaned css begin

        

        if(defined('MULTICACHEDETOXORPHANEDCSS'))

        {

        	self::$_detox_orphaned_css_link = property_exists('MulticacheDetoxOrphanedCss' ,'_css_link') ? MulticacheDetoxOrphanedCss::$_css_link : null;

        	self::$_detox_orphaned_css_code = property_exists('MulticacheDetoxOrphanedCss' ,'_css_style') ? MulticacheDetoxOrphanedCss::$_css_style : null;

        	 

        }

        //detox orphaned css end

        $search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<link(?= (?>[^\\s>]*+[\\s] (?!(?:itemprop|disabled|type=(?!  ["\']?text/css)|rel=(?!["\']?stylesheet))))*+[^\\s>]*+>)(?>[^\\s>]*+\\s)+?(?>href)=["\']?((?<!["\'])[^\\s>]*+|(?<!\')[^"]*+| [^\']*+)[^>]*+>)|(?:<style(?:(?!(?:type=(?!["\']?text/css))|(?:scoped))[^>])*>(?:(?><?[^<]+)*?)</style>)|\\K$)~six';

        

        $tweaks = preg_replace_callback($search, 'self::matchMulticacheCssSignature', $page);

        //if a regex fails it has the tendency to return a null

        // avoid blank page issues

        $tweaks = isset($tweaks) ? $tweaks : $page;

        $multicache_name = 'MulticachePluginCsstweaks';

        /* version1.0.0.2 changes dump the stubs

        if (property_exists('JsStrategy', 'stubs'))

        {

            $stub = unserialize(JsStrategy::$stubs);

            $preheadsection_search = $stub["head_open"];

            $headsection_search = $stub["head"];

            $bodysection_search = $stub["body"];

            $footersection_search = $stub["footer"];

        }

        else

        {

            $preheadsection_search = array(

                '<head>'

            );

            $headsection_search = array(

                '</head>'

            );

            $bodysection_search = array(

                '<body>'

            );

            $footersection_search = array(

                '</body>'

            );

        }

        //at min these should be set

        if(empty($headsection_search))

        {

        	$headsection_search = array(

        			'</head>'

        	);

        }

        if(empty($footersection_search))

        {

        	$footersection_search = array(

        			'</body>'

        	);

        }

        */

        // start preg code

        $preheadsection_search = '~<head(

            (?(?=(\s[^>]*))\s[^>]*)

            )>~ixU';

        $headsection_search = '~</head(

            (?(?=(\s[^>]*))\s[^>]*)

            )>~ixU';

        $bodysection_search = '~<body(

            (?(?=(\s[^>]*))\s[^>]*)

            )>~ixU';

        $footersection_search = '~</body(

            (?(?=(\s[^>]*))\s[^>]*)

            )>~ixU';

        // replacers

        $prehead = '<head\1>';

        $head = '</head\1>';

        $body_tag = '<body\1>';

        $foot_tag = '</body\1>';

        // end preg code

        // begin

        $search_array = array(); // initialise search array to null array

        $replace_array = array();

        $comment_end = "Loaded by " . $multicache_name . " Copyright OnlineMarketingConsultants.in-->";

        $load_css = array();

        //critical css includes

        //ints on wp 

        if(isset($this->css_groupsasync) && (2 === $this->css_groupsasync || 1 === $this->css_groupsasync))

        {

        	if($_REQUEST['f'] ==='m')

        	{

        		$path = preg_replace('~[^a-zA-Z0-9]~','' ,$this->uri->getPath());

        		$crit_loc_exclusive = dirname(dirname(__FILE__)).'/delivery/assets/css/multicachemobilecritical-'.$path.'.css';

        		if(1)

        		{

        			$crit_stub = 'delivery/assets/css/multicachemobilecritical-'.$path.'.css';

        			//drop this name only if you neeed to get the path to which critical file must be setup

        			error_log($crit_stub , 3 , dirname(__FILE__).'/zzzCriticalfilename.log');

        		}

        		if(is_file($crit_loc_exclusive))

        		{

        			$crit_stub = 'delivery/assets/css/multicachemobilecritical-'.$path.'.css';

        			$crit_loc = dirname(dirname(__FILE__)).'/'.$crit_stub;

        			$href = plugins_url($crit_stub , dirname(__FILE__));

        			$critical_css_link = '<link href="' . $href . '" rel="stylesheet" type="text/css"/>';

        			$critical_added = false;

        		}

        		else{

        		$crit_loc = dirname(dirname(__FILE__)).'/delivery/assets/css/multicachemobilecriticalcss.css';

        		if(is_file($crit_loc))

        		{

        			//$path = Multicac

        			//$href = $this->uri->toString(array('scheme','host')).'/media/com_multicache/assets/css/multicachecriticalcss.css';

        			$href = plugins_url('delivery/assets/css/multicachemobilecriticalcss.css' , dirname(__FILE__));

        			$critical_css_link = '<link href="' . $href . '" rel="stylesheet" type="text/css"/>';

        			$critical_added = false;

        		}

        		}

        	}

        	else{

        		//start

        		$path = preg_replace('~[^a-zA-Z0-9]~','' ,$this->uri->getPath());

        		$crit_loc_exclusive = dirname(dirname(__FILE__)).'/delivery/assets/css/multicachecritical-'.$path.'.css';

        		if(1)

        		{

        			$crit_stub = 'delivery/assets/css/multicachecritical-'.$path.'.css';

        			//drop this name only if you neeed to get the path to which critical file must be setup

        			error_log($crit_stub , 3 , dirname(__FILE__).'/zzzCriticalfilenameDesktop.log');

        		}

        		if(is_file($crit_loc_exclusive))

        		{

        			$crit_stub = 'delivery/assets/css/multicachecritical-'.$path.'.css';

        			$crit_loc = dirname(dirname(__FILE__)).'/'.$crit_stub;

        			$href = plugins_url($crit_stub , dirname(__FILE__));

        			$critical_css_link = '<link href="' . $href . '" rel="stylesheet" type="text/css"/>';

        			$critical_added = false;

        		}

        		else{

        		//stop

        		$crit_loc = dirname(dirname(__FILE__)).'/delivery/assets/css/multicachecriticalcss.css';

        		if(is_file($crit_loc))

        		{

        			//$href = $this->uri->toString(array('scheme','host')).'/media/com_multicache/assets/css/multicachecriticalcss.css';

        			$href = plugins_url('delivery/assets/css/multicachecriticalcss.css' , dirname(__FILE__));

        			$critical_css_link = '<link href="' . $href . '" rel="stylesheet" type="text/css"/>';

        			$critical_added = false;

        		}

        		//end here

        		}

        	}

        	

        }

        //moved out from lower block

        

        if (is_array($loadsections_css))

        {

        	$temp_css = array_filter($loadsections_css);

        	$all_keys = array_keys($temp_css);

        	//block is used by other segments

        	$CSSlazylloadloadsection = isset($all_keys) && is_array($all_keys) ? max($all_keys) : 2;

        }

        

        // moderate self::$_js_orphaned

        if (! empty(self::$_css_orphaned_buffer) && ! empty(self::$_css_orphaned) && empty($loadsections_css[self::$_css_orphaned]))

        {

           

            // loadsection is optimizing itself in the spl case that no other script exists at that section

           // self::$_css_orphaned = isset($all_keys) && is_array($all_keys) ? max($all_keys) : self::$_css_orphaned;

        }

        if (! empty($loadsections_css[1]))

        {

        	//version 1.0.0.2

        	/*

            foreach ($preheadsection_search as $prehead)

            {

                $search_array[] = $prehead;

                $load_css[1]["search"][] = $prehead;

                $comment = "<!--pre headsection css ";

                $r_code = $prehead . trim(unserialize($loadsections_css[1]));

                $load_css1_item_temp = trim(unserialize($loadsections_css[1]));

                if (! empty(self::$_css_orphaned_buffer) && isset(self::$_css_orphaned) && self::$_css_orphaned == 1)

                {

                    

                    $r_code = self::$_css_comments ? $r_code . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $r_code . self::$_css_orphaned_buffer;

                    $load_css1_item_temp = self::$_css_comments ? $load_css1_item_temp . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $load_css1_item_temp . self::$_css_orphaned_buffer;

                }

                $replace_array[] = self::$_css_comments ? $r_code . $comment . $comment_end : $r_code;

                $load_css[1]["item"][] = self::$_css_comments ? $load_css1_item_temp . $comment . $comment_end : $load_css1_item_temp;

            }

            */

        	$search_array[] = $preheadsection_search;

        	$load_css[1]["search"][] = $preheadsection_search;

        	$comment = "<!--pre headsection css ";

        	$r_code = $prehead . trim(unserialize($loadsections_css[1]));

        	$load_css1_item_temp = trim(unserialize($loadsections_css[1]));

        	if(false === $critical_added)

        	{

        		$r_code .= $critical_css_link;

        		$load_css1_item_temp .=$critical_css_link;

        		$critical_added = true;

        	}

        	if(empty(self::$internal_lazy_css) && !empty(self::$_lazy_load['style']) )

        	{

        		$r_code .= MulticacheHelper::getloadableCodeCss(self::$_img_tweak_params["ll_style"]);

        		$load_css1_item_temp .= MulticacheHelper::getloadableCodeCss(self::$_img_tweak_params["ll_style"]);

        		self::$internal_lazy_css = true;

        	}

        	if (! empty(self::$_css_orphaned_buffer) && isset(self::$_css_orphaned) && self::$_css_orphaned == 1)

        	{

        	

        		$r_code = self::$_css_comments ? $r_code . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $r_code . self::$_css_orphaned_buffer;

        		$load_css1_item_temp = self::$_css_comments ? $load_css1_item_temp . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $load_css1_item_temp . self::$_css_orphaned_buffer;

        	}

        	$replace_array[] = self::$_css_comments ? $r_code . $comment . $comment_end : $r_code;

        	$load_css[1]["item"][] = self::$_css_comments ? $load_css1_item_temp . $comment . $comment_end : $load_css1_item_temp;

        	$load_css[1]["tag"][] = $prehead;

        	

        }

        

        if (! empty($loadsections_css[2]))

        {

        	//version1.0.0.2

        	/*

            foreach ($headsection_search as $head)

            {

                $search_array[] = $head;

                $load_css[2]["search"][] = $head;

                $comment = "<!-- headsection ";

                $r_code = trim(unserialize($loadsections_css[2]));

                $load_css2_item_temp = trim(unserialize($loadsections_css[2]));

                if(!empty(self::$_lazy_load['style']))

                {

                	$r_code .= MulticacheHelper::getloadableCodeCss(self::$_img_tweak_params["ll_style"]);

                	$load_css2_item_temp .= MulticacheHelper::getloadableCodeCss(self::$_img_tweak_params["ll_style"]);

                }

                if (! empty(self::$_css_orphaned_buffer) && isset(self::$_css_orphaned) && self::$_css_orphaned == 2)

                {

                    

                    $r_code = self::$_css_comments ? $r_code . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $r_code . self::$_css_orphaned_buffer;

                    $load_css2_item_temp = self::$_css_comments ? $load_css2_item_temp . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $load_css2_item_temp . self::$_css_orphaned_buffer;

                }

                $r_code .= $head;

                $replace_array[] = self::$_css_comments ? $comment . $comment_end . $r_code : $r_code;

                $load_css[2]["item"][] = self::$_css_comments ? $comment . $comment_end . $load_css2_item_temp : $load_css2_item_temp;

            }

            */

        	$search_array[] = $headsection_search;

        	$load_css[2]["search"][] = $headsection_search;

        	$comment = "<!-- headsection ";

        	$r_code = trim(unserialize($loadsections_css[2]));

        	$load_css2_item_temp = trim(unserialize($loadsections_css[2]));

        	if(false === $critical_added)

        	{

        		$r_code .= $critical_css_link;

        		$load_css2_item_temp .=$critical_css_link;

        		$critical_added = true;

        	}

        	if(empty(self::$internal_lazy_css) && !empty(self::$_lazy_load['style']) )

        	{

        		$r_code .= MulticacheHelper::getloadableCodeCss(self::$_img_tweak_params["ll_style"]);

        		$load_css2_item_temp .= MulticacheHelper::getloadableCodeCss(self::$_img_tweak_params["ll_style"]);

        		self::$internal_lazy_css = true;

        	}

        	if (! empty(self::$_css_orphaned_buffer) && isset(self::$_css_orphaned) && self::$_css_orphaned == 2)

        	{

        	

        		$r_code = self::$_css_comments ? $r_code . '<!-- orphaned css ls2-->' . self::$_css_orphaned_buffer : $r_code . self::$_css_orphaned_buffer;

        		$load_css2_item_temp = self::$_css_comments ? $load_css2_item_temp . '<!-- orphaned css ls2 -->' . self::$_css_orphaned_buffer : $load_css2_item_temp . self::$_css_orphaned_buffer;

        	}

        	$r_code .= $head;

        	$replace_array[] = self::$_css_comments ? $comment . $comment_end . $r_code : $r_code;

        	$load_css[2]["item"][] = self::$_css_comments ? $comment . $comment_end . $load_css2_item_temp : $load_css2_item_temp;

        	$load_css[2]["tag"][] = $head;

        }

        

        if (! empty($loadsections_css[3]))

        {

            //version1.0.0.2

            /*foreach ($bodysection_search as $body_tag)

            {

                $search_array[] = $body_tag;

                $load_css[3]["search"][] = $body_tag;

                $comment = "<!-- bodysection ";

                $r_code = $body_tag . trim(unserialize($loadsections_css[3]));

                $load_css3_item_temp = trim(unserialize($loadsections_css[3]));

                if (! empty(self::$_css_orphaned_buffer) && isset(self::$_css_orphaned) && self::$_css_orphaned == 3)

                {

                    

                    $r_code = self::$_css_comments ? $r_code . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $r_code . self::$_css_orphaned_buffer;

                    $load_css3_item_temp = self::$_css_comments ? $load_css3_item_temp . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $load_css3_item_temp . self::$_css_orphaned_buffer;

                }

                $replace_array[] = self::$_css_comments ? $r_code . $comment . $comment_end : $r_code;

                $load_css[3]["item"][] = self::$_css_comments ? $load_css3_item_temp . $comment . $comment_end : $load_css3_item_temp;

            }

            */

        	$search_array[] = $bodysection_search;

        	$load_css[3]["search"][] = $bodysection_search;

        	$comment = "<!-- bodysection ";

        	$r_code = $body_tag . trim(unserialize($loadsections_css[3]));

        	$load_css3_item_temp = trim(unserialize($loadsections_css[3]));

        	if(false === $critical_added)

        	{

        		$r_code .= $critical_css_link;

        		$load_css3_item_temp .=$critical_css_link;

        		$critical_added = true;

        	}

        	if(empty(self::$internal_lazy_css) && !empty(self::$_lazy_load['style']))

        	{

        		$r_code .= MulticacheHelper::getloadableCodeCss(self::$_img_tweak_params["ll_style"]);

        		$load_css3_item_temp .= MulticacheHelper::getloadableCodeCss(self::$_img_tweak_params["ll_style"]);

        		self::$internal_lazy_css = true;

        	}

        	if (! empty(self::$_css_orphaned_buffer) && isset(self::$_css_orphaned) && self::$_css_orphaned == 3)

        	{

        	

        		$r_code = self::$_css_comments ? $r_code . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $r_code . self::$_css_orphaned_buffer;

        		$load_css3_item_temp = self::$_css_comments ? $load_css3_item_temp . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $load_css3_item_temp . self::$_css_orphaned_buffer;

        	}

        	$replace_array[] = self::$_css_comments ? $r_code . $comment . $comment_end : $r_code;

        	$load_css[3]["item"][] = self::$_css_comments ? $load_css3_item_temp . $comment . $comment_end : $load_css3_item_temp;

        	$load_css[3]["tag"][] = $body_tag;

        }

        $d = ! empty(self::$_css_orphaned_buffer) && isset(self::$_css_orphaned) && self::$_css_orphaned == 4;

        if (! empty($loadsections_css[4]))

        {

        	//version1.0.0.2

        	/*

            foreach ($footersection_search as $foot_tag)

            {

                $search_array[] = $foot_tag;

                $load_css[4]["search"][] = $foot_tag;

                $comment = "<!-- footsection ";

                $r_code = trim(unserialize($loadsections_css[4]));

                $load_css4_item_temp = trim(unserialize($loadsections_css[4]));

                if (! empty(self::$_css_orphaned_buffer) && isset(self::$_css_orphaned) && self::$_css_orphaned == 4)

                {

                    

                    $r_code = self::$_css_comments ? $r_code . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $r_code . self::$_css_orphaned_buffer;

                    $load_css4_item_temp = self::$_css_comments ? $load_css4_item_temp . '<!-- orphaned css -->' . self::$_css_orphaned_buffer : $load_css4_item_temp . self::$_css_orphaned_buffer;

                }

                $r_code .= $foot_tag;

                $replace_array[] = self::$_css_comments ? $comment . $comment_end . $r_code : $r_code;

                $load_css[4]["item"][] = self::$_css_comments ? $comment . $comment_end . $load_css4_item_temp : $load_css4_item_temp;

            }

            */

        	$search_array[] = $footersection_search;

        	$load_css[4]["search"][] = $footersection_search;

        	$comment = "<!-- footsection ";

        	$r_code = trim(unserialize($loadsections_css[4]));

        	$load_css4_item_temp = trim(unserialize($loadsections_css[4]));

        	if(false === $critical_added)

        	{

        		$r_code .= $critical_css_link;

        		$load_css4_item_temp .=$critical_css_link;

        		$critical_added = true;

        	}

        	if(empty(self::$internal_lazy_css) && !empty(self::$_lazy_load['style']))

        	{

        		$r_code .= MulticacheHelper::getloadableCodeCss(self::$_img_tweak_params["ll_style"]);

        		$load_css4_item_temp .= MulticacheHelper::getloadableCodeCss(self::$_img_tweak_params["ll_style"]);

        		self::$internal_lazy_css = true;//leaving this hanging for now

        	}

        	if (! empty(self::$_css_orphaned_buffer) && isset(self::$_css_orphaned) && self::$_css_orphaned == 4)

        	{

        	

        		$r_code = self::$_css_comments ? $r_code . '<!-- orphaned css ls4-->' . self::$_css_orphaned_buffer : $r_code . self::$_css_orphaned_buffer;

        		$load_css4_item_temp = self::$_css_comments ? $load_css4_item_temp . '<!-- orphaned css ls4-->' . self::$_css_orphaned_buffer : $load_css4_item_temp . self::$_css_orphaned_buffer;

        	}

        	$r_code .= $foot_tag;

        	$replace_array[] = self::$_css_comments ? $comment . $comment_end . $r_code : $r_code;

        	$load_css[4]["item"][] = self::$_css_comments ? $comment . $comment_end . $load_css4_item_temp : $load_css4_item_temp;

        	$load_css[4]["tag"][] = $foot_tag;

        }elseif(! empty(self::$_css_orphaned_buffer) && isset(self::$_css_orphaned) && self::$_css_orphaned == 4){

        	$search_array[] = $footersection_search;

        	$load_css[4]["search"][] = $footersection_search;

        	$comment = "<!-- footsection spl orphaned process ";

        	$r_code = '';

        	$load_css4_item_temp = '';

        	      		 

        		$r_code = self::$_css_comments ? $r_code . '<!-- orphaned css ls4xt-->' . self::$_css_orphaned_buffer : $r_code . self::$_css_orphaned_buffer;

        		$load_css4_item_temp = self::$_css_comments ? $load_css4_item_temp . '<!-- orphaned css ls4 xt-->' . self::$_css_orphaned_buffer : $load_css4_item_temp . self::$_css_orphaned_buffer;

        	

        	$r_code .= $foot_tag;

        	$replace_array[] = self::$_css_comments ? $comment . $comment_end . $r_code : $r_code;

        	$load_css[4]["item"][] = self::$_css_comments ? $comment . $comment_end . $load_css4_item_temp : $load_css4_item_temp;

        	$load_css[4]["tag"][] = $foot_tag;

        }

        

        if (! empty($replace_array) && empty(self::$js_switch))

        {

            

            //$tweaks = str_replace($search_array, $replace_array, $tweaks);

        	$tweaks = preg_replace($search_array, $replace_array, $tweaks);

            Return $tweaks;

        }

        

        $search_array = array();

        $replace_array = array();

        $load_js = self::$_js_replace;

        

        /*

         * Segmentwise stitching

         */

        // prehead segment

        

        if (isset($load_css))

        {

            foreach ($load_css as $key_lsec => $seg)

            {

                /*verion1.0.0.2

                foreach ($seg["search"] as $key => $val)

                {

                	$replace_temp = null;

                    $search_array[] = $val;

                    $replace_temp = $key_lsec % 2 != 0 ? $val : '';

                    $replace_temp .= (isset($load_css[$key_lsec]["item"][$key])) ? $load_css[$key_lsec]["item"][$key] : '';

                    $replace_temp .= (isset($load_js[$key_lsec]["item"][$key]) && $load_js[$key_lsec]["search"][$key] == $val) ? $load_js[$key_lsec]["item"][$key] : '';

                    $replace_temp .= $key_lsec % 2 == 0 ? $val : '';

                    if (isset($replace_temp))

                    {

                    	$replace_array[] = $replace_temp;

                    }

                }

                */

            	foreach ($seg["search"] as $key => $val)

            	{

            		$replace_temp = null;

            		$search_array[] = $val;

            		$replace_temp = $key_lsec % 2 != 0 ? $load_css[$key_lsec]["tag"][$key] : '';

            		$replace_temp .= (isset($load_css[$key_lsec]["item"][$key])) ? $load_css[$key_lsec]["item"][$key] : '';

            		$replace_temp .= (isset($load_js[$key_lsec]["item"][$key]) && $load_js[$key_lsec]["search"][$key] == $val) ? $load_js[$key_lsec]["item"][$key] : '';

            		$replace_temp .= $key_lsec % 2 == 0 ? $load_css[$key_lsec]["tag"][$key] : '';

            		if (isset($replace_temp))

            		{

            			$replace_array[] = $replace_temp;

            		}

            	}

                

            }

        }

        //A moderation method for js sections that were not set in css

        if (isset($load_js))

        {

            foreach ($load_js as $key_lsec_js => $seg_js)

            {

                /*

                foreach ($seg_js["search"] as $key_js => $val_js)

                {

                	$replace_temp = null;

                    if (in_array($val_js, $search_array))

                    {

                        continue;

                    }

                    $search_array[] = $val_js;

                    $replace_temp = $key_lsec_js % 2 != 0 ? $val_js : '';

                    $replace_temp .= (isset($load_css[$key_lsec_js]["item"][$key_js]) && $load_css[$key_lsec_js]["search"][$key_js] == $val_js) ? $load_css[$key_lsec_js]["item"][$key_js] : '';

                    $replace_temp .= (isset($load_js[$key_lsec_js]["item"][$key_js])) ? $load_js[$key_lsec_js]["item"][$key_js] : '';

                    $replace_temp .= $key_lsec_js % 2 == 0 ? $val_js : '';

                    if (isset($replace_temp))

                    {

                    	$replace_array[] = $replace_temp;

                    }

                }

                */

            	foreach ($seg_js["search"] as $key_js => $val_js)

            	{

            		$replace_temp = null;

            		if (in_array($val_js, $search_array))

            		{

            			continue;

            		}

            		$search_array[] = $val_js;

            		$replace_temp = $key_lsec_js % 2 != 0 ? $load_js[$key_lsec_js]["tag"][$key_js] : '';

            		$replace_temp .= (isset($load_css[$key_lsec_js]["item"][$key_js]) && $load_css[$key_lsec_js]["search"][$key_js] == $val_js) ? $load_css[$key_lsec_js]["item"][$key_js] : '';

            		if(false === $critical_added && $key_lsec_js == 2)

            		{

            			$replace_temp .= $critical_css_link;

            			$critical_added = true;

            		}

            		$replace_temp .= (isset($load_js[$key_lsec_js]["item"][$key_js])) ? $load_js[$key_lsec_js]["item"][$key_js] : '';

            		$replace_temp .= $key_lsec_js % 2 == 0 ? $load_js[$key_lsec_js]["tag"][$key_js] : '';

            		if (isset($replace_temp))

            		{

            			$replace_array[] = $replace_temp;

            		}

            	}

               

            }

        }

        

        if (! empty($replace_array))

        {

            

            //$tweaks = str_replace($search_array, $replace_array, $tweaks);

            //version1.0.0.2

        	$tweaks = preg_replace($search_array, $replace_array, $tweaks);

            Return $tweaks;

        }

        

        Return $page;

    

    

    }



    protected static function imgAttrRep($matches)

    {

    	//new code

    	if(empty($matches))

    	{

    		Return $matches[0];

    	}

    	//$matches = array_map('html_entity_decode' , $matches);

    	/*$e_message = var_export($matches , true);

    	

    	error_log($e_message, 3 , dirname(dirname(__FILE__)).'/logs/imGG4.log');*/

    	$attributes = array();

    	foreach($matches As $key => $match)

    	{

    		if(strpos($key , 'MULTICACHEGROUP') !== false)

    		{

    			continue;

    		}

    		if($key%2 === 1)

    		{

    			$type = !empty($match) ? trim($match): null;

    		}

    		else

    		{

    			if(isset($type))

    			{

    				switch($type)

    				{

    					case 'id':

    						$attributes["id"] = !empty($match) ? trim($match): '';

    						break;

    					case 'class':

    						$attributes["classes"] = !empty($match) ? trim($match): '';

    						break;

    					case 'src':

    						$attributes["src"] = !empty($match) ? trim($match): '';

    						break;

    					case 'alt':

    						$attributes["alt"] = !empty($match) ? trim($match): '';

    						break;

    					case 'style':

    						$attributes["style"] = !empty($match) ? trim($match): '';

    						 

    						break;

    					case 'type':

    						$attributes["type"] = !empty($match) ? trim($match): '';

    						break;

    					case 'data_original':

    						$attributes["data_original"] = !empty($match) ? trim($match): '';

    						break;

    					case 'srcset':

    						$attributes["srcset"] = !empty($match) ? trim($match): '';

    						break;

    					case 'height':

    						$attributes["height"] = !empty($match) ? trim($match): '';

    						break;

    					case 'width':

    						$attributes["width"] = !empty($match) ? trim($match): '';

    						break;

    					case 'title':

    						$attributes["title"] = !empty($match) ? trim($match): '';

    						break;

    

    				}

    			}

    

    		}

    	}

    

    	//end new code

    	/*

    	 $pattern = '~(["\'])\s~';

    	 $attributes = array();

    	 $attributes["id"] = self::matchIMGcase('id', $matches[1]);

    	 $attributes["src"] = self::matchIMGcase('src', $matches[1]);

    	 $attributes["data_original"] = self::matchIMGcase('data-original', $matches[1]);

    	 $attributes["classes"] = self::matchIMGcase('class', $matches[1]);

    	 $attributes["alt"] = self::matchIMGcase('alt', $matches[1]);

    	 $attributes["style"] = self::matchIMGcase('style', $matches[1]);

    	 $attributes["height"] = self::matchIMGcase('height', $matches[1], 2);

    	 $attributes["width"] = self::matchIMGcase('width', $matches[1], 2);

    	 */

    	$attributes["closure_type"] = strpos(trim($matches[0]),'/>') !== false ? 'html' : 'xml';

    

    	if (! empty($attributes["classes"]))

    	{

    		$attributes["class"] = array_map('trim', explode(' ', $attributes["classes"]));

    	}

    

    

    

    	// start sending them home

    

    	if (empty($attributes["src"]) || (isset($attributes["src"]) && strpos(trim($attributes["src"]), 'data:') === 0))

    	{

    		Return $matches[0];

    	}

    

    	//plugin exclusions

    	if(isset(self::$_img_excludedscripts) && !empty($attributes["src"]))

    	{

    		foreach(self::$_img_excludedscripts As $img_path_key =>$val)

    		{

    			if(stripos($attributes["src"], $img_path_key) !== false )

    			{

    				Return $matches[0];

    			}

    		}

    	}

    	if(isset(self::$_multicache_extraordinary_nolazy))

    	{

    		foreach(self::$_multicache_extraordinary_nolazy As $key =>$src)

    		{

    			if(stripos($attributes["src"], $src['name']) !== false )

    			{

    				Return $matches[0];

    			}

    		}

    	}

    	// $container_rules = null;abandoned due to memory leaks in phpquery lib

    	$img_selector_rules = null;

    	$img_deselector_rules = null;

    	if (! isset($params))

    	{

    		$params = ! empty(self::$_img_tweak_params) ? self::$_img_tweak_params : null;

    	}

    	//version1.0.0.2

    	if (! isset($params_urlstrings))

    	{

    		$params_urlstrings = ! empty(self::$_img_urlstringexclude) ? self::$_img_urlstringexclude : null;

    	}

    	if (! empty($params_urlstrings))

    	{

    		foreach ($params_urlstrings as $url_bit)

    		{

    			if (strpos($attributes["src"], $url_bit) !== false)

    			{

    				Return $matches[0];

    			}

    		}

    	}

    	// moderate params to unserialize serialized content

    

    	if (! empty($params["img_selectors_switch"]) && isset($params["img_selector_rules"]))

    	{

    		$img_selector_rules = unserialize($params["img_selector_rules"]);

    	}

    	if (! empty($params["image_deselector_switch"]) && isset($params["image_deselector_rules"]))

    	{

    		$img_deselector_rules = unserialize($params["image_deselector_rules"]);

    	}

    

    	$continue_flag = false;

    	$curid = ! empty($attributes["id"]) ? $attributes["id"] : null;

    	// deselctors

    	if (! empty($img_deselector_rules))

    	{

    		$img_deselector_rules = array_map('trim', $img_deselector_rules);

    		foreach ($img_deselector_rules as $deselct)

    		{

    			if (strpos($deselct, '.') === 0 && ! empty($attributes["class"]))

    			{

    				$classname = substr($deselct, 1);

    

    				$cf = in_array($classname, $attributes["class"]);

    

    				if ($cf)

    				{

    					Return $matches[0];

    				}

    			}

    			elseif ((strpos($deselct, '#') === 0) && isset($curid))

    			{

    				$deselct = substr($deselct, 1);

    

    				if ($curid === $deselct)

    				{

    					Return $matches[0];

    				}

    			}

    		}

    	}

    

    	// end deselectors

    	// selectors

    

    	if (! empty($img_selector_rules))

    	{

    		$img_selector_rules = array_map('trim', $img_selector_rules);

    		$continue_flag = true;

    		foreach ($img_selector_rules as $select)

    		{

    			if (strpos($select, '.') === 0 && ! empty($attributes["class"]))

    			{

    				$classname = substr($select, 1);

    				$cf = in_array($classname, $attributes["class"]);

    

    				if ($cf)

    				{

    					$continue_flag = false;

    					break;

    				}

    			}

    			elseif ((strpos($select, '#') === 0) && isset($curid))

    			{

    				$select = substr($select, 1);

    

    				if ($curid === $select)

    				{

    

    					$continue_flag = false;

    					break;

    				}

    			}

    		}

    

    		if ($continue_flag)

    		{

    			Return $matches[0];

    		}

    	}

    

    	// end selectors

    

    	$lazyimage = self::makeLazeImage($attributes);

    	Return $lazyimage . '<noscript>' . $matches[0] . '</noscript>';

    

    }

    protected function performIMGtweaks($page)

    {

    	

        // initiating vars

        if (empty(self::$_img_tweak_params) 

        		&& property_exists('JsStrategy', 'img_tweak_params')

        		&& isset(JsStrategy::$img_tweak_params))

        {

            self::$_img_tweak_params = JsStrategy::$img_tweak_params;

        }

        //version 1.0.0.2

        if (empty(self::$_img_urlstringexclude) && property_exists('JsStrategy', 'IMGurl_strings'))

        {

        	self::$_img_urlstringexclude = JsStrategy::$IMGurl_strings;

        }

        if(defined('MULTICACHEIMAGENOLAZY') && isset($_REQUEST['f']) && $_REQUEST['f'] == 'm')

        {

        	 

        	self::$_multicache_extraordinary_nolazy = property_exists('MulticacheMobileNoLazy' , '_no_lazy')? MulticacheMobileNoLazy::$_no_lazy : null;

        	 

        }

        if (empty(self::$_img_tweak_params))

        {

            Return $page;

        }

        //version1.0.0.2 issues with IAL register

        //$page = html_entity_decode($page);

        /*$search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<img([^>]+)>))~';*/

       /* $search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<\s*img\s{1}.*(width|height|src|class|id|alt|title|data_original|style|type|srcset)=[\'"]{1}([^\'"]*)[\'"]{1}.*(width|height|src|class|id|alt|title|data_original|style|type|srcset)=[\'"]{1}([^\'"]*)[\'"]{1}.*(width|height|src|class|id|alt|title|data_original|style|type|srcset)=[\'"]{1}([^\'"]*)[\'"]{1}.*>))~ixU';*/

       /*

        $search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<\s*img\s{1}[^>]*

        

(?(?=[^>]*(?<MULTICACHEGROUP1>\w+)=)(?:\k<MULTICACHEGROUP1>=[\'"]{1}([^\'"]*)[\'"]{1}.*) )

(?(?=[^>]*(?<MULTICACHEGROUP2>\w+)=)(?:\k<MULTICACHEGROUP2>=[\'"]{1}([^\'"]*)[\'"]{1}.*) )

(?(?=[^>]*(?<MULTICACHEGROUP3>\w+)=)(?:\k<MULTICACHEGROUP3>=[\'"]{1}([^\'"]*)[\'"]{1}.*) )

(?(?=[^>]*(?<MULTICACHEGROUP4>\w+)=)(?:\k<MULTICACHEGROUP4>=[\'"]{1}([^\'"]*)[\'"]{1}.*) )

(?(?=[^>]*(?<MULTICACHEGROUP5>\w+)=)(?:\k<MULTICACHEGROUP5>=[\'"]{1}([^\'"]*)[\'"]{1}.*) )

(?(?=[^>]*(?<MULTICACHEGROUP6>\w+)=)(?:\k<MULTICACHEGROUP6>=[\'"]{1}([^\'"]*)[\'"]{1}.*) )

(?(?=[^>]*(?<MULTICACHEGROUP7>\w+)=)(?:\k<MULTICACHEGROUP7>=[\'"]{1}([^\'"]*)[\'"]{1}.*) )

(?(?=[^>]*(?<MULTICACHEGROUP8>\w+)=)(?:\k<MULTICACHEGROUP8>=[\'"]{1}([^\'"]*)[\'"]{1}.*) )

		>))~ixU';

		*/

        /*//PRE UNICODE

        $search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<\s*img\s{1}[^>]*

        

(?(?=[^>]*(?<MULTICACHEGROUP1>[\w-]+)=)(?:\k<MULTICACHEGROUP1>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP2>[\w-]+)=)(?:\k<MULTICACHEGROUP2>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP3>[\w-]+)=)(?:\k<MULTICACHEGROUP3>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP4>[\w-]+)=)(?:\k<MULTICACHEGROUP4>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP5>[\w-]+)=)(?:\k<MULTICACHEGROUP5>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP6>[\w-]+)=)(?:\k<MULTICACHEGROUP6>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP7>[\w-]+)=)(?:\k<MULTICACHEGROUP7>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP8>[\w-]+)=)(?:\k<MULTICACHEGROUP8>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

		>))~ixU';

		

		*/

                                                 /*$search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<\s*img\s{1}[^>]**/

        $search = '~(?><noscript).*?(?></noscript>)(*SKIP)(*F)|(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<\s*img\s{1}[^>]*

        

(?(?=[^>]*(?<MULTICACHEGROUP1>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP1>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP2>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP2>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP3>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP3>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP4>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP4>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP5>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP5>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP6>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP6>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP7>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP7>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP8>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP8>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

        		>))~ixUu';

        //refer hack for double noscripts under testing

        //$page = preg_replace_callback($search, 'self::imgAttrRep', $page);

        //version 1.0.0.2

        $pagenew = preg_replace_callback($search, 'self::imgAttrRep', $page);

        $page = isset($pagenew) ? $pagenew : $page;

        

        Return $page;

    

    }

/*

    protected static function matchIMGcase($name, $string, $type = 1)

    {



        if ($type == 1)

        {

        	//perform a complete html_entity_decode

            $pattern = '~' . $name . '=(["\'])?([^"\'&]+)(["\'&])?~';

           

        }

        elseif ($type == 2)

        {

            $pattern = '~' . $name . '=["\']?([\S]+)["\']?~';

        }

        

        

        preg_match($pattern, $string, $matches);

        Return $matches[1];

    

    }

    */







    protected static function makeLazeImage($img_attr)

    {



        $image_string_start = '<img';

        $image_string_end = $img_attr["closure_type"] == 'html' ? ' />' : ' >';

        $image_attributes = '';

        if (empty($img_attr["class"]))

        {

            $classes_string = "multicache_lazy";

        }

        else

        {

            $classes_string = implode(' ', $img_attr["class"]);

            $classes_string .= ' multicache_lazy';

        }

        $image_attributes = ' class="' . $classes_string . '" ';

        foreach ($img_attr as $key => $attr)

        {

            if (empty($attr))

            {

                continue;

            }

            if ($key != 'classes' && $key != 'closure_type' && $key != 'class')

            {

                $key =  ( $key != 'src') ? $key : 'data-original';

                $image_attributes .= ' ' . $key . '=' . '"' . $attr . '" ';

            }

        }

        

        $image = $image_string_start . $image_attributes . $image_string_end;

        Return $image;

    

    }



    protected static function matchMulticacheCssSignature($matches)

    {

    //dequeuing lazyload

 if(strpos($matches[0] , '/m_ll.css') !== false)

 {

 	Return "";

 }

        $sig = md5(serialize($matches[0]));

        if(isset(self::$_css_excludescripts) && !empty($matches[1]))

        {

        	foreach(self::$_css_excludescripts As $key_path_css =>$val)

        	{

        		if(stripos($matches[1] , $key_path_css) !== false)

        		{

        			Return $matches[0];

        		}

        	}

        }

        

        if (isset(self::$_signatures_css[$sig]))

        {

            $blank = "";

            Return $blank;

        }

        else

        {

            

            if (empty(self::$_css_orphaned))

            {

                Return $matches[0];

            }

            $blank = '';

            //detox begin

            

                   

            

            if(isset(self::$_detox_orphaned_css_link) && !empty($matches[1]))

            {

            	//src links

            	foreach(self::$_detox_orphaned_css_link As $key=> $src)

            	{

            		if(strpos($matches[1] , $src['name']) !== false)

            		{

            			Return $blank;

            		}

            	}

            

            }

            elseif(isset(self::$_detox_orphaned_css_code) && !isset($matches[1]) && !empty($matches[0]))

            {

            	 

            	foreach(self::$_detox_orphaned_css_code As $key=> $code)

            	{

            		$check_1 = $check_2 = $check_3 = false;

            		if(empty($check_1) && strpos($matches[0] , $code['name']) !== false)

            		{

            			//Return $blank;

            			$check_1 = true;

            		}

            		if(empty($check_2) && strpos($matches[0] , $code['name_2']) !== false)

            		{

            			//Return $blank;

            			$check_2 = true;

            		}

            		if(empty($check_3) && strpos($matches[0] , $code['name_3']) !== false)

            		{

            			//Return $blank;

            			$check_3 = true;

            		}

            		if($check_1 && $check_2 && $check_3)

            		{

            			$test_ejection = false;

            			if($test_ejection)

            			{

            				error_log(var_export($matches[2] , true) , 3 , dirname(__FILE__).'/zzcsseject.log');

            			}

            			Return $blank;

            		}

            	}

            }

            //detox end

            if (! isset(self::$_css_orphan_sig[$sig]))

            {

                self::$_css_orphaned_buffer .= $matches[0];

                self::$_css_orphan_sig[$sig] = 1; // loads orphans only once

            }

            Return $blank;

        }

    

    }

    

    public function getMulticacheLazyScriptsAndStyles()

    {

    /*

     * Preloader

     */

    	if(empty($this->_img_tweaks))

    	{

    		self::$_lazy_load = false;

    		Return false;

    	}

    	if (!property_exists('JsStrategy', 'img_tweak_params')

    			|| ! isset(JsStrategy::$img_tweak_params)

    			)

    	{

    		self::$_lazy_load = false;

    		Return false;

    	}

    	

    	/*if (! empty($this->_img_tweaks))

    	{*/

    	//version1.0.0.2

    		$loader['pagespeed_ad'] = self::checkPageSpeedStrategy(null , true);

    		/*if (property_exists('JsStrategy', 'img_tweak_params') 

    				&& isset(JsStrategy::$img_tweak_params)

    				&& $this->canDoOP('IMG'))

    		{*/

    			if (empty(self::$_img_tweak_params))

    			{

    				self::$_img_tweak_params = JsStrategy::$img_tweak_params;

    			}

    			//llswitch is coutesy redundant as when its 0 the imgtweak params is not present

    			if ( empty(self::$_img_tweak_params["ll_script"]) 

    					||  empty(self::$_img_tweak_params["ll_style"])

    					|| 0 === self::$_img_tweak_params['llswitch'])

    			{

    				self::$_lazy_load = false;

    				Return false;

    			}

    			//were tweaking this function down

    			$loader['script'] = true;

    			$loader['style'] = true;

    			self::$_lazy_load['script'] = true;//overide settings

    			self::$_lazy_load['style'] = true;//this will overide the outer load

    			Return $loader;

    			//exit beyond this

    			//init the loader array

    			/*

    			$loader['script'] = false;

    			$loader['style'] = false;

    			/*if (! empty(self::$_img_tweak_params["ll_script"]) && ! empty(self::$_img_tweak_params["ll_style"]))

    			{*/

    				//if were loading in the tweaker : preloading not required

    				//are we in a simulation or normal

    				//check loadsections 2 & 1 priority

    				//check that jquery library or jquery function is called at least once

    				/*

    				if(null !== ($simflag = $this->uri->getVar('multicachesimulation', null)) || isset(self::$_js_loadinstruction) && ! empty($this->testing_switch))

    				{

    					//were in a simulation

    					$loader['script'] = true;

    					$loader['style'] = true;

    					self::$_lazy_load['script'] = $loader['script'] ===false? true : false;

    					self::$_lazy_load['style'] = $loader['style'] ===false? true : false;

    					Return $loader;

    					

    				}

    				else 

    				{

    					if(!class_exists('JsStrategy'))

    					{

    						//class does not exist execute preloading

    						$loader['script'] = true;

    						$loader['style'] = true;

    						self::$_lazy_load['script'] = $loader['script'] ===false? true : false;

    						self::$_lazy_load['style'] = $loader['style'] ===false? true : false;

    						Return $loader;

    					}

    					if(!$this->canDoOp('JST', 'JsStrategy'))

    					{

    						$loader['script'] = true;

    					}

    					$loadsections =null;

    					if(method_exists('JsStrategy' , 'getLoadSection' ))

    					{

    					$loadsections = JsStrategy::getLoadSection();

    					}

    					

    					if(!(isset($loadsections[2]) && stripos($loadsections[2],'jquery') !== false))

    					{

    						$loader['script'] = true;

    					}

    					//for styles

    					if(! $this->canDoOp('CSS'))

    					{

    						$loader['style'] = true;

    					}

    					if(! property_exists('JsStrategy', 'sig_css')

    							|| (property_exists('JsStrategy', 'sig_css')  

    									&& !isset(JsStrategy::$sig_css)

    									) 

    							|| ! property_exists('JsStrategy', 'loadsec_css')

    							|| (property_exists('JsStrategy', 'loadsec_css') 

    									&& !isset(JsStrategy::$loadsec_css)

    									)

    							 )

    					{

    						$loader['style'] = true;

    					}

    					$loadsections_css = null;

    					if(property_exists('JsStrategy', 'loadsec_css')

    							&& isset(JsStrategy::$loadsec_css)

    							)

    					{

    						$loadsections_css = JsStrategy::$loadsec_css;

    					}

    					if(!isset($loadsections_css[2]))

    					{

    						$loader['style'] = true;

    					}

    						

    					

    					

    				} 

    				

    			

    				/*

    				$loader = array();

    				$loader['script'] = unserialize(self::$_img_tweak_params["ll_script"]);

    				$loader['style'] = unserialize(self::$_img_tweak_params["ll_style"]);

    				*/

    				// ensure the jQuery library is loaded

    	            /*

    				JHtml::_('jquery.framework');

    				JHtml::_('jquery.ui');

    				$document->addScript(JURI::Root() . 'media/com_multicache/assets/js/jquery.lazyload.js');

    				$document->addScriptDeclaration($script);

    				$document->addStyleDeclaration($style);

    				*//*

    				self::$_lazy_load['script'] = $loader['script'] ===false? true : false;

    				self::$_lazy_load['style']  = $loader['style'] ===false? true : false;

    				Return $loader;

    			/*}*/

    		/*}*/

    	/*}

    	self::$_lazy_load = false;

    	Return false;*/

    }

/*

    public function onAfterDispatch()

    {



        $app = JFactory::getApplication();

        if ($app->isAdmin())

        {

            Return;

        }

        $this->initPageCacheClear();

        // return if switched off

        if (! ($this->conduit_switch || $this->_img_tweaks))

        {

            return;

        }

        

        // normal filters 1) Not applicable for admin 2) not applicable for loggedin users and 3) not applicable for post requests

        

        if ($app->isAdmin() || ! JFactory::getUser()->get('guest') || $app->input->getMethod() != 'GET')

        {

            

            return;

        }

       

        $document = JFactory::getDocument();

        if ($this->conduit_switch == 1)

        {

            $document->addScript(JURI::Root() . 'media/com_multicache/assets/js/conduit.js');

        }

        elseif ($this->conduit_switch == 2)

        {

            $document->addScript(JURI::Root() . 'media/com_multicache/assets/js/conduit_jquery.js');

        }

        

        // loading libraries for image tweaks

        if (! empty($this->_img_tweaks))

        {

            

            if (property_exists('JsStrategy', 'img_tweak_params') 

            		&& isset(JsStrategy::$img_tweak_params)

            		&& $this->canDoOP('IMG'))

            {

                if (empty(self::$_img_tweak_params))

                {

                    self::$_img_tweak_params = JsStrategy::$img_tweak_params;

                }

                

                if (! empty(self::$_img_tweak_params["ll_script"]) && ! empty(self::$_img_tweak_params["ll_style"]))

                {

                    $script = unserialize(self::$_img_tweak_params["ll_script"]);

                    $style = unserialize(self::$_img_tweak_params["ll_style"]);

                    // ensure the jQuery library is loaded

                    

                    JHtml::_('jquery.framework');

                    JHtml::_('jquery.ui');

                    $document->addScript(JURI::Root() . 'media/com_multicache/assets/js/jquery.lazyload.js');

                    $document->addScriptDeclaration($script);

                    $document->addStyleDeclaration($style);

                }

            }

        }

    

    }

*/

    public function performStrategy( $body)

    {

    	

    	if(empty($body))

    	{

    		Return $body;

    	}

    	//init the body

    	$this->body = $body;



       /* $app = JFactory::getApplication();

        $user = JFactory::getUser();

        if ($app->isAdmin() || ! JFactory::getUser()->get('guest') || $app->input->getMethod() != 'GET')

        {

            

            return;

        }

        

        if (count($app->getMessageQueue()))

        {

            

            return;

        }

        */

        if (isset($this->_debug_mode))

        {

            

            $debug_url = unserialize($this->_debug_mode);

            

            if (strtolower($debug_url) !== strtolower($this->current))

            {

                return $this->body;

            }

        }

        //if permission issues exist problems could be faced when theyre

        // passed through here esp if not a html page

        //version 1.0.0.2

        

        $match2 = preg_match('#^(?><?[^<]*+)+?<html(?><?[^<]*+)+?<head(?><?[^<]*+)+?</head(?>' . '<?[^<]*+)+?<body(?><?[^<]*+)+?</body(?><?[^<]*+)+?</html.*+$#i', $this->body);

        if (! $match2)

        {

        	Return $body;

        }

        $setbodyflag = false;

        //hack for mobiles this is raw and differentiators will need to be set manually

        //hack for mobile pages hence it is deactivated

        if($_REQUEST['f'] == 'm' && defined('MULTICACHEEXTRAORDINARYMOBILE'))

        {

        	$body_sub = $this->doMobileOptimizations($body);

        	

        

        	Return $body_sub;

        }

       

        // were not checking for class simcontrol as the work flow assumes that simcontrol can be prepared only if initial strategy exists

        

        if ($this->_img_tweaks && $this->canDoOP('IMG'))

        {

        	

            

            $body_sub = self::performIMGtweaks($body);

            

            $setbodyflag = true;

        }

        $scraping = (null === $this->uri->getVar('multicachecsstask', null) ) && (null === $this->uri->getVar('multicachetask', null));

        if (class_exists('JsStrategy') && $scraping && (self::$js_switch || ($this->js_simulation && $this->js_advanced)))

        {

            if (! $setbodyflag)

            {

                $body_sub = $body;

            }

            

            $body_sub = $this->performJstweaks($body_sub);

            

            $setbodyflag = true;

        }

        if (class_exists('JsStrategy') && $scraping && self::$css_switch)

        {

            if (! $setbodyflag)

            {

                

                $body_sub = $body;

            }

            

            $body_sub = $this->performCsstweaks($body_sub);

            $setbodyflag = true;

        }

        //version-1.0.0.2 extraordinary hacks

        if(defined('MULTICACHEEXTRAORDINARY')&& $scraping)

        {

        	if (! $setbodyflag)

        	{

        	     $body_sub = $body;

        	}

        	$body_sub = $this->doExtraOrdinaryHacks($setbodyflag , $body_sub);

        	$setbodyflag = true;

        }

        //version-1.0.0.3 extraordinary images

        if(defined('MULTICACHEEXTRAORDINARYIMAGE') && $scraping)

        {

        	if (! $setbodyflag)

        	{

        		$body_sub = $body;

        	}

        	$body_sub = $this->doExtraOrdinaryImageHacks($setbodyflag , $body_sub);

        	$setbodyflag = true;

        }

        //end extraordinary images

        if ($this->_minify_html && $scraping && class_exists("MulticacheHtmlMinify"))

        {

            

            if (! $setbodyflag)

            {

                $body_sub = $body;

            }

            $options = array();

            $options['minify_level'] = 3;

            $options['jsMinifier'] = array(

                'MulticacheJSOptimize',

                'process'

            );

            $options['cssMinifier'] = array(

                'MulticacheCSSOptimize',

                'optimize'

            );

            $options['js_comments'] = self::$_jscomments;

            $options['css_comments'] = self::$_css_comments;

            $options['jsCleanComments'] = true;

            $body_sub = MulticacheHtmlMinify::process($body_sub, $options);

            $setbodyflag = true;

        }

        if ($setbodyflag)

        {

            // $body_sub = Minify_HTML::minify($body_sub,$options);

            

            //$app->setBody($body_sub);

            Return $body_sub;

        }

             Return $body;

    }



//version1.0.0.2 block

    protected function doMobileOptimizations($body = false)

    {

    	//$app = JFactory::getApplication();

    	if(empty($body))

    	{

    		Return $body;

    	}

    	//removeParts

    	if(method_exists('MulticacheMobileStrategy' , 'removeParts'))

    	{

    		$body = MulticacheMobileStrategy::removeParts($body);

    	}

    	$search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<script(?= (?> [^\\s>]*+[\\s] (?(?=type= )type=["\']?(?:text|application)/javascript ) )*+ [^\\s>]*+> )(?:(?> [^\\s>]*+\\s )+? (?>src)=["\']?( (?<!["\']) [^\\s>]*+| (?<!\') [^"]*+ | [^\']*+ ))?[^>]*+>(?: (?> <?[^<]*+ )*? )</script>)|\\K$)~six';

    

    	$tweaks = preg_replace_callback($search, 'self::matchJsMobileSignature', $body);

    	$search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<link(?= (?>[^\\s>]*+[\\s] (?!(?:itemprop|disabled|type=(?!  ["\']?text/css)|rel=(?!["\']?stylesheet))))*+[^\\s>]*+>)(?>[^\\s>]*+\\s)+?(?>href)=["\']?((?<!["\'])[^\\s>]*+|(?<!\')[^"]*+| [^\']*+)[^>]*+>)|(?:<style(?:(?!(?:type=(?!["\']?text/css))|(?:scoped))[^>])*>(?:(?><?[^<]+)*?)</style>)|\\K$)~six';

    	//preg_match_all($search , $tweaks , $e_message);

    	/*

    	 $e_message = print_r($e_message ,true);

    	 error_log($e_message , 3, __DIR__ .'/e_message.log');

    	 */

    	if(1 && class_exists('MulticacheMobileStrategy'))

    	{

    		$tweaks = preg_replace_callback($search, 'self::matchCssMobileSignature', $tweaks);

    		if(self::$mobile_strategy_replace_inlinestyle)

    		{

    			$tweaks = str_replace('</body' , self::$master_inlinecss_buffer_mobile . '</body' , $tweaks);

    		}

    	}

    	$options = array();

    	$options['minify_level'] = 3;

    	$options['jsMinifier'] = array(

    			'MulticacheJSOptimize',

    			'process'

    	);

    	$options['cssMinifier'] = array(

    			'MulticacheCSSOptimize',

    			'optimize'

    	);

    	$options['js_comments'] = self::$_jscomments;

    	$options['css_comments'] = self::$_css_comments;

    	$options['jsCleanComments'] = true;

    	Return MulticacheHtmlMinify::process($tweaks, $options);

    	//$app->setBody($tweaks);

    }

    protected static function matchJsMobileSignature( $matches)

    {

    	if (empty($matches[0]))

    	{

    		Return $matches[0];

    	}

    	$sub = $matches[0];

    	if(stripos($sub , ' async ') ===false)

    	{

    		$sub = str_replace('>' , ' async >', $sub);

    	}

    	if(stripos($sub , ' defer ') ===false)

    	{

    		$sub = str_replace('>' , ' defer >', $sub);

    	}

    	$sub = MulticacheJSOptimize::process($sub);

    	Return $sub;

    }

    

    protected function doExtraOrdinaryHacks($setbodyflag , $body_sub = false)

    {

    	if(!$setbodyflag)

    	{

    		//$app = JFactory::getApplication();

    		$body_sub = $this->body;

    	}

    	/*$search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<link(?= (?>[^\\s>]*+[\\s] (?!(?:itemprop|disabled|type=(?!  ["\']?text/css)|rel=(?!["\']?stylesheet))))*+[^\\s>]*+>)(?>[^\\s>]*+\\s)+?(?>href)=["\']?((?<!["\'])[^\\s>]*+|(?<!\')[^"]*+| [^\']*+)[^>]*+>)|(?:<style(?:(?!(?:type=(?!["\']?text/css))|(?:scoped))[^>])*>(?:(?><?[^<]+)*?)</style>)|\\K$)~six';*/

    	$search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<link(?= (?>[^\\s>]*+[\\s] (?!(?:itemprop|disabled|type=(?!  ["\']?text/css)|rel=(?!["\']?stylesheet))))*+[^\\s>]*+>)(?>[^\\s>]*+\\s)+?(?>href)=["\']?((?<!["\'])[^\\s>]*+|(?<!\')[^"]*+| [^\']*+)[^>]*+>)|\\K$)~six';

    	//preg_match_all($search ,$body_sub , $e_message );

    	//var_dump($matches);exit;

    	 

    	//$e_message = print_r($e_message ,true);

    	//error_log($e_message , 3, __DIR__ . '/e_message.log' );

    

    	$tweaks = preg_replace_callback($search, 'self::matchMulticacheExtraordinary', $body_sub);

    	/*

    	 if(isset(self::$master_inlinecss_buffer))

    	 {

    	 //$tweaks = str_replace('</body' ,'<!--MulticacheInliningCSs-->'.self::$master_inlinecss_buffer .'</body' , $tweaks  );

    	 }

    	 */

    	Return $tweaks;

    }

    //lets build static property master_inlinecss_buffer

    protected static function matchMulticacheExtraordinary($matches)

    {

    	if(empty($matches[0]))

    	{

    		Return $matches[0];

    	}

    	$begin = '<!-- Multicache ExtraOrdinary Insert begin -->';

    	$end = '<!-- Multicache ExtraOrdinary Insert End -->';

    	$inline_css = property_exists('MulticacheExtraOrdinary' , '_css_property')? MulticacheExtraOrdinary::$_css_property : false;

    	if(!$inline_css)

    	{

    		Return $matches[0];

    	}

    	foreach($inline_css As $css_obj)

    	{

    		if(strpos($matches[1] , $css_obj['name']) !== false)

    		{

    			//self::$master_inlinecss_buffer .= $css_obj['css'];

    			Return $begin . $css_obj['css']. $end;

    		}

    	}

    	Return $matches[0];

    }

    protected static function matchCssMobileSignature($matches)

    {

    	if (empty($matches[0]))

    	{

    		Return $matches[0];

    	}

    	if(!isset($inline_css))

    	{

    		$inline_css = property_exists('MulticacheMobileStrategy' , '_mobile_property')? MulticacheMobileStrategy::$_mobile_property : false;

    	}

    	if(!$inline_css)

    	{

    		Return $matches[0];

    	}

    	 

    

    	$sub = $matches[0];

    	foreach($inline_css As $css_obj)

    	{

    		if(stripos($sub , $css_obj['url']) !==false)

    		{

    			self::$master_inlinecss_buffer_mobile .= $css_obj['style'];

    			//IMP FLAG change to false to append style at location

    			self::$mobile_strategy_replace_inlinestyle = false;

    			if(self::$mobile_strategy_replace_inlinestyle)

    			{

    				Return '';

    			}

    

    			Return $css_obj['style'];

    		}

    	}

    	Return $matches[0];

    }

    //version1.0.0.3

    protected function doExtraOrdinaryImageHacks($setbodyflag , $body_sub = false)

    {

    if(!$setbodyflag)

    	{

    		//$app = JFactory::getApplication();

    		$body_sub = $this->body;

    	}

    	/* //PRE UNICODE

    	 $search = '~(?><noscript).*?(?></noscript>)(*SKIP)(*F)|(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<\s*img\s{1}[^>]*

        

(?(?=[^>]*(?<MULTICACHEGROUP1>[\w-]+)=)(?:\k<MULTICACHEGROUP1>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP2>[\w-]+)=)(?:\k<MULTICACHEGROUP2>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP3>[\w-]+)=)(?:\k<MULTICACHEGROUP3>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP4>[\w-]+)=)(?:\k<MULTICACHEGROUP4>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP5>[\w-]+)=)(?:\k<MULTICACHEGROUP5>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP6>[\w-]+)=)(?:\k<MULTICACHEGROUP6>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP7>[\w-]+)=)(?:\k<MULTICACHEGROUP7>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP8>[\w-]+)=)(?:\k<MULTICACHEGROUP8>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

		>))~ixU';

		*/

    	$search = '~(?><noscript).*?(?></noscript>)(*SKIP)(*F)|(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<\s*img\s{1}[^>]*

    	

(?(?=[^>]*(?<MULTICACHEGROUP1>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP1>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP2>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP2>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP3>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP3>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP4>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP4>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP5>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP5>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP6>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP6>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP7>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP7>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

(?(?=[^>]*(?<MULTICACHEGROUP8>[\pL\pN\w-]+)=)(?:\k<MULTICACHEGROUP8>=(?:[\'"]{1}|(?>&quot;))([^\'"]*)(?:[\'"]{1}|(?>&quot;)).*) )

    			>))~ixUu';

    	 

    	$tweaks = preg_replace_callback($search ,'self::matchMulticacheExtraordinaryImage',$body_sub );

    	$tweaks = isset($tweaks) ? $tweaks : $body_sub;

    

    	Return $tweaks;

    }

    

    protected static function matchMulticacheExtraordinaryImage($sub)

    {

    	if (empty($sub))

    	{

    		Return $sub[0];

    	}

    	//$sub = array_map('html_entity_decode' , $sub);

    	//$e_message = var_export($sub , true);

       // error_log($e_message, 3 , dirname(dirname(__FILE__)).'/logs/imagelog.log');

    	$attributes = array();

    	foreach ($sub as $key => $match)

    	{

    

    		if (strpos($key, 'MULTICACHEGROUP') !== false)

    		{

    			continue;

    		}

    		if ($key % 2 === 1)

    		{

    			$type = ! empty($match) ? trim($match) : null;

    

    		}

    		else

    		{

    			if (isset($type))

    			{

    

    				switch ($type)

    				{

    					case 'id':

    						$attributes["id"] = ! empty($match) ? trim($match) : '';

    						break;

    					case 'class':

    						$attributes["class"] = ! empty($match) ? trim($match) : '';

    						break;

    					case 'src':

    						$attributes["src"] = ! empty($match) ? trim($match) : '';

    						break;

    					case 'alt':

    						$attributes["alt"] = ! empty($match) ? trim($match) : '';

    						break;

    					case 'style':

    						$attributes["style"] = ! empty($match) ? trim($match) : '';

    

    						break;

    					case 'type':

    						$attributes["type"] = ! empty($match) ? trim($match) : '';

    						break;

    					case 'data-original':

    						$attributes["data-original"] = ! empty($match) ? trim($match) : '';

    						break;

    					case 'srcset':

    						$attributes["srcset"] = ! empty($match) ? trim($match) : '';

    						break;

    					case 'height':

    						$attributes["height"] = ! empty($match) ? trim($match) : '';

    						break;

    					case 'width':

    						$attributes["width"] = ! empty($match) ? trim($match) : '';

    						break;

    					case 'title':

    						$attributes["title"] = ! empty($match) ? trim($match) : '';

    						break;

    					case 'data-lazyload':

    						$attributes["data-lazyload"] = ! empty($match) ? trim($match) : '';

    						break;

    				}

    			}

    		}

    	}

    	if(empty($attributes["data-lazyload"]) && empty($attributes["data-original"]) && empty($attributes["src"]))

    	{

    		Return $sub[0];

    	}

    	$src_string = !empty($attributes["data-lazyload"])?$attributes["data-lazyload"]:( !empty($attributes["data-original"]) ? $attributes["data-original"] :$attributes["src"]);

    	//start

    	//new remove images for mobile

    	if($_REQUEST['f'] ==='m' && property_exists('MulticacheExtraOrdinaryImage' , '_mobile_removeimage_property'))

    	{

    		if(!isset($mobile_removeimage))

    		{

    			$mobile_removeimage = property_exists('MulticacheExtraOrdinaryImage' , '_mobile_removeimage_property')? MulticacheExtraOrdinaryImage::$_mobile_removeimage_property : false;

    		}

    		if(!$mobile_removeimage)

    		{

    			Return $sub[0];

    		}

    		foreach($mobile_removeimage As $image_obj)

    		{

    			if(strpos($src_string , $image_obj['name']) !== false)

    			{

    				//self::$master_inlinecss_buffer .= $css_obj['css'];

    				Return '';

    			}

    		}

    		Return $sub[0];

    	}

    	//end remove images for mobile

    	static $inline_imageencode;

    	if(!isset($inline_imageencode))

    	{

    		$inline_imageencode = property_exists('MulticacheExtraOrdinaryImage' , '_inlinebaseimage_property')? MulticacheExtraOrdinaryImage::$_inlinebaseimage_property : false;

    	}

    	 

    	if(!$inline_imageencode)

    	{

    		Return $sub[0];

    	}

    	foreach($inline_imageencode As $image_obj)

    	{

    		if(strpos($src_string , $image_obj['name']) !== false)

    		{

    			//self::$master_inlinecss_buffer .= $css_obj['css'];

    			Return self::makeBaseImage($attributes , $src_string , $sub , $image_obj);

    		}

    	}

    	Return $sub[0];

    	//end

    

    

    

    

    }

    

    protected static function baseImageresolvePath($path ,$obj)

    {

    	static $site;

    	if(!isset($site))

    	{

    		$site = MulticacheUri::getInstance()->toString(array('scheme' , 'host'));

    	}

    

    	if((strpos($path , 'http://') !==false || strpos($path , 'https://') !== false)

    			&&!(strpos($path , $site) === 0))

    	{

    

    		Return $path;

    	}

    

    	static $root;

    	if(!isset($root))

    	{

    		$root = $_SERVER["DOCUMENT_ROOT"];

    	}

    //correction for dynamic images

    if(isset($obj['type']) && $obj['type'] === 'php')

    {

    	Return $path;

    }

    

    	if(strpos($path , $site) === 0)

    	{

    		$path = str_replace($site , $root , $path);

    

    		Return $path;

    	}

    

    	if(strpos($path ,'/') === 0)

    	{

    		Return $root. $path;

    	}

    

    	If(preg_match('~^[a-zA-Z]~' , $path))

    	{

    		Return $root . '/' . $path;

    	}

    	Return $path;

    }

    protected static function makeBaseImage($attr ,$src_string , $sub , $image_obj )

    {

    	$m = preg_match('~^[^\s]+\.(?:jpe?g|png|gif)~' , $src_string , $sub_src_string);

    	if(!$m)

    	{

    		/*$e_message = var_export(array($src_string ) , true);

    		error_log($e_message, 3 , dirname(dirname(__FILE__)).'/logs/FAILEDTYPES.log');*/

    		Return $sub[0];

    	}

    	$type = pathinfo($sub_src_string[0], PATHINFO_EXTENSION);

    	

    	

    	/*

    	 if(strpos($src_string , 'http://') === false

    	 && strpos($src_string , 'https://') === false

    	 )

    	 {

    		if(strpos($src_string , '/') !== 0)

    		{

    		$src_string = '/' . $src_string;

    		}

    		$a = JURI::getInstance();

    		$a->setPath($src_string);

    		$src_string = $a->toString(array('scheme' ,'host' , 'path'));

    		}

    		*/

    	$src_string = self::baseImageresolvePath($src_string , $image_obj);

    	$src_string = html_entity_decode($src_string);

    	$data = @file_get_contents($src_string);

    

    	if($data === false){

    		/*$e_message = var_export($src_string , true);

    		$e_message .= var_export($type , true);

            error_log($e_message, 3 , dirname(dirname(__FILE__)).'/logs/baseimagelog.log');*/

    		Return $sub[0];

    	}

    	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    	$img_tag_open = "<img";

    	$attr["class"] = str_replace('multicache_lazy' , ' ' ,$attr["class"]);

    	if(isset($attr["data-lazyload"]))

    	{

    		unset($attr["data-lazyload"]);

    	}

    	$img_tag = "";

    	/*

    	 if($attr["src"] == "/images/speed.jpg")

    	 {

    		//FILE_USE_INCLUDE_PATH

    

    		var_dump($src_string , $type ,$attr ,$data );

    		var_dump($a);

    

    		exit;

    		}

    		*/

    	foreach($attr As $key => $a)

    	{

    		if($key == 'src' || $key == 'data-original')

    		{

    			continue;

    		}

    		$img_tag .= ' '. $key . '=' . '"'. $a.'"';

    	}

    	$img = $img_tag_open .' src="'. $base64 .'" '. $img_tag . '/>';

    	

    	Return $img;

    }

//end version 1.0.0.2 block

    protected function canDoOp($pre = 'JST', $classname = 'JsStrategy')

    {



        $st_var = $pre . '_' . $classname;

        if (isset(self::$_cando[$st_var]))

        {

            Return self::$_cando[$st_var];

        }

        

        if (! class_exists($classname))

        {

            //self::$_cando[$st_var] = true;Cant understand why this was true

            //Return true;

        	self::$_cando[$st_var] = false;

        	Return false;

        }

        // initiating static

        self::$_cando[$st_var] = false;

        

        // lets just return true or false

        //part 1 check for setting

        $clude_settings = null;

        $property_name_setting = $pre . 'setting';

        if (property_exists($classname, $property_name_setting)

        		&& isset($classname::$$property_name_setting))

        {

            $clude_settings = $classname::$$property_name_setting;

        }

        //part 2 exclude/include urls

        $property_name_cludeurl = $pre . 'CludeUrl';

        if (property_exists($classname, $property_name_cludeurl)

        		&& isset($classname::$$property_name_cludeurl)

        	    && isset($clude_settings))

        {

            $P_CludeUrl = $classname::$$property_name_cludeurl;

            if (($clude_settings['url_switch'] == 1 && ! isset($P_CludeUrl[$this->current])) || ($clude_settings['url_switch'] == 2 && isset($P_CludeUrl[$this->current])))

            {

                // exclude these pages

                Return false;

            }

        }

        //part 3 check the query

        $property_name_cludequery = $pre . 'CludeQuery';

        if (property_exists($classname, $property_name_cludequery) 

        		&& isset($classname::$$property_name_cludequery)

        		&& isset($clude_settings))

        {

            $query_params = $this->uri->getQuery(true);

            $P_cludequeries = $classname::$$property_name_cludequery;

            if ($clude_settings['query_switch'] == 1)

            {

                // include these pages

                $include_page = false;

                foreach ($query_params as $key => $value)

                {

                    if (isset($P_cludequeries[$key][$value]) || (isset($P_cludequeries[$key]) && $P_cludequeries[$key][true] == 1))

                    {

                        $include_page = true;

                        break;

                    }

                }

                if (! $include_page)

                {

                    Return false;

                }

            }

            if ($clude_settings['query_switch'] == 2)

            {

                // exclude these pages

                foreach ($query_params as $key => $value)

                {

                    if (isset($P_cludequeries[$key][$value]) || (isset($P_cludequeries[$key]) && $P_cludequeries[$key][true] == 1))

                    {

                        Return false;

                    }

                }

            }

        }

        //get plugin footprint

        $exist = null;

        if($pre === 'JST' && isset(self::$_js_excludepage))

        {

        	$exist = $this->checkPluginFootPrint(self::$_js_excludepage);

        }

        elseif($pre === 'CSS' && isset(self::$_css_excludepage))

        {

        	$exist = $this->checkPluginFootPrint(self::$_css_excludepage);

        }

        elseif($pre === 'IMG' && isset(self::$_img_excludepage))

        {

        	$exist = $this->checkPluginFootPrint(self::$_img_excludepage);

        }

        if($exist)

        {

        	Return false;

        }

        

        //this cannot be done from here for wp

        /*

        $property_name_excluded_components = $pre . 'excluded_components';

        

        if (property_exists($classname, $property_name_excluded_components))

        {

            // $excluded_comp = JsStrategy::$JSTexcluded_components;

            $option = JFactory::getApplication()->input->get('option', null);

            $O_ptionsxclude = $classname::$$property_name_excluded_components;

            if (isset($O_ptionsxclude[$option]))

            {

                Return false;

            }

        }

        */

        $property_name_url_strings = $pre . 'url_strings';

        if (property_exists($classname, $property_name_url_strings)

        		&& isset($classname::$$property_name_url_strings)

        		)

        {

            $urlstrings = $classname::$$property_name_url_strings;

            $current = $this->uri->toString() ;//JURI::getInstance()->toString();

            foreach ($urlstrings as $string)

            {

            	//moved from stristr to strcasecmp for better accuracy

                /*if (strcasecmp($current, $string) === 0)

                {*/

            	if (stristr($current, $string))

            	{

                    Return false;

                }

            }

        }

        self::$_cando[$st_var] = true;

        Return true;

    

    }

    //keys contain the paths

    protected function checkPluginFootPrint($array)

    {

    	if(empty($this->body))

    	{

    		Return false;

    	}

    	

    	$body_tags = $this->getBodytags();

    	if(empty($body_tags))

    	{

    		Return false;

    	}

    	foreach($body_tags As $tag)

    	{

    		foreach($array As $key => $val)

    		{

    			if(stristr($tag , $key))

    			{

    				Return true;

    			}

    		}

    	}

    	Return false;

    }

    protected function getBodytags()

    {

    	static $body_tags = null;

    	if(isset($body_tags))

    	{

    		Return $body_tags;

    	}

    	$search = '~(?><?[^<]*+(?:<!--(?>-?[^-]*+)*?-->)?)*?\\K(?:(?:<script(?= (?> [^\\s>]*+[\\s] (?(?=type= )type=["\']?(?:text|application)/javascript ) )*+ [^\\s>]*+> )(?:(?> [^\\s>]*+\\s )+? (?>src)=["\']?( (?<!["\']) [^\\s>]*+| (?<!\') [^"]*+ | [^\']*+ ))?[^>]*+></script>)|(?:<link(?= (?> [^\\s>]*+[\\s] (?! (?: itemprop | disabled | type= (?! ["\']?text/css ) | rel= (?! ["\']?stylesheet ) ) ) )*+ [^\\s>]*+> ) (?> [^\\s>]*+\\s )+? (?>href)=["\']?( (?<!["\']) [^\\s>]*+ | (?<!\') [^"]*+ | [^\']*+ )[^>]*+>)|(?:(?:<img[^>]+(?=src)src=["\']?([^\s"\']+)[^>]+>))|\\K$)~six';

    	     

    	preg_match_all($search , $this->body,$matches);

    	if(empty($matches))

    	{

    		Return false;

    	}

    	foreach($matches[1] As $key=>$match)

    	{

    		if(!empty($match))

    		{

    			$body_tags[] = $match;

    		}

    		elseif(!empty($matches[2][$key]))

    		{

    			$body_tags[] = $matches[2][$key];

    		}

    		elseif(!empty($matches[3][$key]))

    		{

    			$body_tags[] = $matches[3][$key];

    		}

    	}

    	

    	Return $body_tags;

    	

    }

/*

    protected function initPageCacheClear()

    {



        $app = JFactory::getApplication();

        $user = JFactory::getUser();

        $app->input->getMethod();

        $session = JFactory::getSession();

        if ($app->input->getMethod() != 'GET')

        {

            Return;

        }

        $hide_panel = $session->get('multicache_cclr_panelhide');

        if (! empty($hide_panel))

        {

            Return;

        }

        $doc = JFactory::getDocument();

        if ($user->get('guest'))

        {

            Return;

        }

        $canDo = new JObject();

        $assetName = 'com_multicache';

        $actions = array(

            'core.admin',

            'core.manage',

            'core.create',

            'core.edit',

            'core.edit.own',

            'core.edit.state',

            'core.delete'

        );

        

        foreach ($actions as $action)

        {

            $canDo->set($action, $user->authorise($action, $assetName));

        }

        if (! $canDo->get('core.admin'))

        {

            Return;

        }

        

        $script_content = 'jQuery(function(){

var tcclr="<div id=\'cclr_admin_multicache_container\' style=\'position: absolute; top: 0px;right:0px;\'><button id=\'cclr_admin_multicache\' p_sec=\"' . JSession::getFormToken() . '\" p_cur=\"' . JURI::Current() . '\" p_instance=\"' . JURI::getInstance()->toString() . '\"  style=\' z-index: 99; height: 30px; width: 120px; font-size: 1.2em; border-radius: 4px; cursor: pointer; background: none repeat scroll 0% 0% rgb(68, 121, 186); color: rgb(255, 255, 255); border: 1px solid rgb(32, 83, 141); text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4); box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.4) inset, 0px 1px 1px rgba(0, 0, 0, 0.2);\'  >Clear Page</button><button id=\'cclr_admin_multicache_hide\' style=\' z-index: 99; height: 30px; width: 80px; font-size: 1.2em; border-radius: 4px; cursor: pointer; background: none repeat scroll 0% 0% rgb(68, 121, 186); color: rgb(255, 255, 255); border: 1px solid rgb(32, 83, 141); text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4); box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.4) inset, 0px 1px 1px rgba(0, 0, 0, 0.2);\'  >hide</button><div id=\'cclr_admin_multicache_message\'  ></div>";



jQuery("body").append(tcclr);

    jQuery("#cclr_admin_multicache").on("click",function(e){

    e.preventDefault();

    var p_url = jQuery("button#cclr_admin_multicache").attr("p_cur");

    var p_urli = jQuery("button#cclr_admin_multicache").attr("p_instance");

    var p_sec = jQuery("button#cclr_admin_multicache").attr("p_sec");

    jQuery("#cclr_admin_multicache_message").text("Clearing Cache");

      jQuery.ajax({

  type: "POST",

  url: "' . JURI::root() . 'administrator/components/com_multicache/lib/multicache_cachecleaner.php",

  data:{ p_url: p_url,

      p_urli: p_urli,

      p_sec: p_sec,

        },

  success:function(t,status){

       jQuery("#cclr_admin_multicache_message").text(t);

    },

  dataType: "html"

});



    });



      jQuery("#cclr_admin_multicache_hide").on("click",function(e){

      e.preventDefault();

      var p_sec = jQuery("button#cclr_admin_multicache").attr("p_sec");

      jQuery.ajax({

      type: "POST",

      url: "' . JURI::root() . 'administrator/components/com_multicache/lib/multicache_cachecleaner.php",

          data:{ task: "hidecclr",

            p_sec: p_sec,

        },

  success:function(t,status){

       jQuery("#cclr_admin_multicache_container").fadeOut(1200);

    },

  dataType: "html"

      });



    });

});    ';

        

        $doc->addScriptDeclaration($script_content, 'text/javascript');

    

    }

    */



}