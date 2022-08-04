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



if(file_exists(plugin_dir_path(__FILE__).'libs/multicache_loadinstruction.php'))

{

require_once plugin_dir_path(__FILE__).'libs/multicache_loadinstruction.php';

}

/*

JLoader::register('Loadinstruction', JPATH_COMPONENT . '/lib/loadinstruction.php');

JLoader::register('JsStrategySimControl', JPATH_ROOT . '/administrator/components/com_multicache/lib/jscachestrategy_simcontrol.php');

JLog::addLogger(array(

		'text_file' => 'errors.php'

), JLog::ALL, array(

		'error'

));

*/

class MulticacheHelperSimcontrol

{

	

	public static function writeLoadInstructions($preset, $loadinstruction, $working_instruction, $original_instruction, $pagescripts)

	{

	

		if (! isset($pagescripts['working_script_array']))

		{

			Return false;

		}

		if (empty($preset))

		{

			if (! class_exists('MulticacheLoadinstruction'))

			{

				Return false;

			}

			if (property_exists('MulticacheLoadinstruction', 'preset'))

			{

				$preset = MulticacheLoadinstruction::$preset;

			}

		}

	

		if (empty($loadinstruction))

		{

			if (! class_exists('MulticacheLoadinstruction'))

			{

				Return false;

			}

			if (property_exists('MulticacheLoadinstruction', 'loadinstruction'))

			{

				$loadinstruction = MulticacheLoadinstruction::$loadinstruction;

			}

		}

	

		if (empty($working_instruction))

		{

			if (! class_exists('MulticacheLoadinstruction'))

			{

				Return false;

			}

			if (property_exists('MulticacheLoadinstruction', 'working_instruction'))

			{

				$working_instruction = MulticacheLoadinstruction::$working_instruction;

			}

		}

	

		if (empty($original_instruction))

		{

			if (! class_exists('MulticacheLoadinstruction'))

			{

				Return false;

			}

			if (property_exists('MulticacheLoadinstruction', 'original_instruction'))

			{

				$original_instruction = MulticacheLoadinstruction::$original_instruction;

			}

		}

	

		$preset = var_export($preset, true);

		$loadinstruction = var_export($loadinstruction, true);

		$working_instruction = var_export($working_instruction, true);

		$original_instruction = var_export($original_instruction, true);

		$working_script_array = var_export($pagescripts['working_script_array'], true);

		$social = ! empty($pagescripts['social']) ? var_export($pagescripts['social'], true) : null;

		$advertisements = ! empty($pagescripts['advertisements']) ? var_export($pagescripts['advertisements'], true) : null;

		$async = ! empty($pagescripts['async']) ? var_export($pagescripts['async'], true) : null;

		$delayed = ! empty($pagescripts['delayed']) ? var_export($pagescripts['delayed'], true) : null;

	

		ob_start();

		echo "<?php



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

	

	



class MulticacheLoadinstruction{

	

";

		$cl_buf = ob_get_clean();

		if (! empty($preset))

		{

			ob_start();

			echo "

	

public static \$preset  = " . trim($preset) . ";

	

";

			$cl_buf .= ob_get_clean();

		}

	

		if (! empty($loadinstruction))

		{

	

			ob_start();

			echo "

	

	

public static \$loadinstruction  = " . trim($loadinstruction) . ";

	

";

			$cl_buf .= ob_get_clean();

		}

	

		if (! empty($working_instruction))

		{

	

			ob_start();

			echo "

	

	

public static \$working_instruction  = " . trim($working_instruction) . ";

	

";

			$cl_buf .= ob_get_clean();

		}

	

		if (! empty($original_instruction))

		{

	

			ob_start();

			echo "

	

	

public static \$original_instruction  = " . trim($original_instruction) . ";

	

";

			$cl_buf .= ob_get_clean();

		}

	

		// start

		if (! empty($working_script_array))

		{

	

			ob_start();

			echo "

	

	

public static \$working_script_array  = " . $working_script_array . ";

	

";

			$cl_buf .= ob_get_clean();

		}

	

		if (! empty($social))

		{

	

			ob_start();

			echo "

	

	

public static \$social  = " . $social . ";

	

";

			$cl_buf .= ob_get_clean();

		}

	

		if (! empty($advertisements))

		{

	

			ob_start();

			echo "

	

	

public static \$advertisements  = " . $advertisements . ";

	

";

			$cl_buf .= ob_get_clean();

		}

	

		if (! empty($async))

		{

	

			ob_start();

			echo "

	

	

public static \$async  = " . $async . ";

	

";

			$cl_buf .= ob_get_clean();

		}

	

		if (! empty($delayed))

		{

	

			ob_start();

			echo "

	

	

public static \$delayed  = " . $delayed . ";

	

";

			$cl_buf .= ob_get_clean();

		}

		// end

	

		ob_start();

		echo "

        }

        ";

		$cl_buf .= ob_get_clean();

	

		$cl_buf = serialize($cl_buf);

	

		//$dir = JPATH_ROOT . '/components/com_multicache/lib';

		$dir = plugin_dir_path(__FILE__).'libs/';

		$filename = 'multicache_loadinstruction.php';

		$success = self::writefileTolocation($dir, $filename, $cl_buf);

		Return $success;

		// $success = self::writeLoadinstructionset(serialize($cl_buf));

	}

	

	public static function setJsSimulation($sim = 1, $advanced = 'normal', $load_state = null)

	{

	

		$advanced = ($advanced == 'advanced') ? 1 : NULL;

		$options_system_params = get_option('multicache_system_params');

		$options_system_params['js_simulation'] = $sim;

		$options_system_params['js_advanced'] = $advanced;

		if (isset($load_state))

		{

			if ($load_state == 0)

			{

				//$params->set('js_loadinstruction', null);

				$options_system_params['js_loadinstruction'] = null;

			}

			else

			{

				//$params->set('js_loadinstruction', $load_state);

				$options_system_params['js_loadinstruction'] = $load_state;

			}

		}

		$result  = update_option('multicache_system_params', $options_system_params);

		

		Return $result;

	

		/*$app = JFactory::getApplication();

		$plugin = JPluginHelper::getPlugin('system', 'multicache');

		$extensionTable = JTable::getInstance('extension');

		$pluginId = $extensionTable->find(array(

				'element' => 'multicache',

				'folder' => 'system'

		));

		$pluginRow = $extensionTable->load($pluginId);

		$params = new JRegistry($plugin->params);

		$params->set('js_simulation', $sim);

		$params->set('js_advanced', $advanced);

		if (isset($load_state))

		{

			if ($load_state == 0)

			{

				$params->set('js_loadinstruction', null);

			}

			else

			{

				$params->set('js_loadinstruction', $load_state);

			}

		}

		$extensionTable->bind(array(

				'params' => $params->toString()

		));

		if (! $extensionTable->check())

		{

			$app->setError('lastcreatedate: check: ' . $extensionTable->getError());

			return false;

		}

		if (! $extensionTable->store())

		{

			$app->setError('lastcreatedate: store: ' . $extensionTable->getError());

			return false;

		}

		*/

	

	}

	public static function lockSimControl($lock = 0)

	{

		$options_system_params = get_option('multicache_system_params');

		

		if (! empty($lock))

		{

			$options_system_params['lock_sim_control'] = true;

			//$params->set('lock_sim_control', TRUE);

		}

		else

		{

			//$params->set('lock_sim_control', false);

			$options_system_params['lock_sim_control'] = false;

		}

		$result = update_option('multicache_system_params', $options_system_params);

	/*

		$app = JFactory::getApplication();

		$plugin = JPluginHelper::getPlugin('system', 'multicache');

		$extensionTable = JTable::getInstance('extension');

		$pluginId = $extensionTable->find(array(

				'element' => 'multicache',

				'folder' => 'system'

		));

		$pluginRow = $extensionTable->load($pluginId);

		$params = new JRegistry($plugin->params);

		if (! empty($lock))

		{

			$params->set('lock_sim_control', TRUE);

		}

		else

		{

			$params->set('lock_sim_control', false);

		}

		$extensionTable->bind(array(

				'params' => $params->toString()

		));

		if (! $extensionTable->check())

		{

			$app->setError('lastcreatedate: check: ' . $extensionTable->getError());

			return false;

		}

		if (! $extensionTable->store())

		{

			$app->setError('lastcreatedate: store: ' . $extensionTable->getError());

			return false;

		}

		*/

		Return $result;

	

	}

	

	protected static function writefileTolocation($dir, $filename, $contents)

	{

	

		//$app = JFactory::getApplication();

		//jimport('joomla.filesystem.path');

		//jimport('joomla.filesystem.file');

	

		$file = $dir . '/' . $filename;

		//$ftp = JClientHelper::getCredentials('ftp', true);

	

		// Attempt to make the file writeable if using FTP.

		/*

		 if (! $ftp['enabled'] && file_exists($file) && JPath::isOwner($file) && ! JPath::setPermissions($file, '0644'))

		 {

		 $app->enqueueMessage(JText::_('COM_MULTICACHE_HELPER_ERROR_WRITEFILETOLOCATION_FILELOC_NOTWRITABLE'), 'warning');

		 $emessage = "COM_MULTICACHE_HELPER_ERROR_WRITEFILETOLOCATION_FILELOC_NOTWRITABLE";

		 JLog::add(JText::_($emessage) . '	' . $file, JLog::WARNING);

		 }

		 */

		$class_path = unserialize($contents);

		$class_path = str_ireplace("\x0D", "", $class_path);

	

		//start wp write

		require_once (ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php');

		require_once (ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php');

		$multicache_fsd = new WP_Filesystem_Direct(__FILE__);

		@set_time_limit(300);

		$check_is_writable = array();

		$a = $multicache_fsd->chmod($file, 0644);

	

		if (! $multicache_fsd->put_contents($file, $class_path, 0644))

		{

			$result = new WP_Error('failed to write '.$file, __('Multicacheconfig could prepare core classes.'), $file);

			return $result;

		}

		Return true;

		//end wp write

		/*

		 if (! JFile::write($file, $class_path))

		 {

		 throw new RuntimeException(JText::_('COM_MULTICACHE_ERROR_WRITE_FILETOLOCATION_FAILED') . '	' . $file);

		 $emessage = "COM_MULTICACHE_ERROR_WRITE_FILETOLOCATION_FAILED";

		 JLog::add(JText::_($emessage) . '	' . $file, JLog::ERROR);

		 }

	

		 // Attempt to make the file unwriteable if using FTP.

		 if (! $ftp['enabled'] && JPath::isOwner($file) && ! JPath::setPermissions($file, '0444'))

		 {

		 $app->enqueueMessage(JText::_('COM_MULTICACHE_WRITEFILETOLOCATION_ERROR_NOTUNWRITABLE') . '	' . $file, 'warning');

		 $emessage = "COM_MULTICACHE_WRITEFILETOLOCATION_ERROR_NOTUNWRITABLE";

		 JLog::add(JText::_($emessage) . '	' . $file, JLog::WARNING);

		 }

	

		 return true;

		 */

	

	}

	

	public static function transitSimulation($status , $id , $table = 'multicache_advanced_testgroups' )

	{

		if(empty($status) || empty($id))

		{

			Return false;

		}

		global $wpdb;

		$tablename = $wpdb->prefix.$table;

		$data = array('status' => $status);

		$where = array('id' => $id);

		$format = array('%s');

		$w_format = array('%d');

		$result = $wpdb->update($tablename , $data , $where , $format , $w_format);

		Return $result;

	}

	

	public static function transitSimulationMT($status  , $id , $mtime =0, $table = 'multicache_advanced_test_results' )

	{

		if(empty($status) || empty($id) )

		{

			Return false;

		}

		global $wpdb;

		$tablename = $wpdb->prefix.$table;

		$mtime = empty($mtime)? microtime(true):$mtime;				

		$data = array('mtime' => $mtime , 'status' => $status );

		$where = array('id' => $id );

		$format = array('%s' , '%s');

		$w_format = array('%d');

		$result = $wpdb->update($tablename , $data , $where ,$format, $w_format);

		Return $result;

	}

	

	public static function recordTest($data  ,$where , $format,$w_format , $table = 'multicache_advanced_test_results' )

	{

		if(empty($data) || empty($where) )

		{

			Return false;

		}

		global $wpdb;

		$tablename = $wpdb->prefix.$table;

		

		

		$result = $wpdb->update($tablename , $data , $where ,$format, $w_format);

		Return $result;

	}

	

	public static function recordResults($update , $where, $format , $w_format , $table = 'multicache_advanced_test_results')

	{

		If(empty($update))

		{

		Return false;	

		}

		$data = array();

		foreach($update As $key => $value)

		{

			$data[$key] = $value;

		}

		global $wpdb;

		$tablename = $wpdb->prefix.$table;

		$result = $wpdb->update($tablename , $data , $where , $format , $w_format);

		 

	}

	

	public static function startTest($insertObj , $table = 'multicache_advanced_test_results')

	{

		if(empty($insertObj))

		{

			Return false;

		}

		global $wpdb;

		$tablename = $wpdb->prefix.$table;

		$data = array();

		$format = array();

		foreach($insertObj As $key => $obj)

		{

			$data[$key] = $obj;

			switch($key)

			{

				case 'date_of_test':

				case 'mtime':

				case 'test_page':

				case 'status':

				case 'simulation':

				case 'test_date':

				case 'cache_compression_factor':

					$format[] = '%s';

					break;

					

				case 'max_tests':

				case 'current_test':

				case 'precache_factor':

				

				$format[] = '%d';

					break;

				default:

				MulticacheHelper::log_error('Undefined case for startTest function '.$key,'serious-error',$insertObj);

				

			}

		}

		//check matches data to format

		$result = $wpdb->insert($tablename , $data , $format);

	}

	

	public static function recordFactor($insertObj , $table = 'multicache_advanced_precache_factor')

	{

		if(empty($insertObj))

		{

			Return false;

		}

		global $wpdb;

		$tablename = $wpdb->prefix.$table;

		$data = array();

		$format = array();

		foreach($insertObj As $key => $obj)

		{

			$data[$key] = $obj;

			switch($key)

			{

				case 'date_of_test':

				case 'mtime':

				case 'test_page':

				case 'status':

				case 'simulation':

				case 'test_date':

				case 'loadinstruc_state':

				case 'cache_compression_factor':

				case 'avg_load_time':

				case 'var_load_time':

				case 'loadtime_score':

				case 'loadvar_score':

				case 'statmode':

				case 'statmode_score':

				case 'total_score':

				case 'ccomp_factor':

					

					$format[] = '%s';

					break;

						

				case 'max_tests':

				case 'current_test':

				case 'precache_factor':

				

				case 'group_id':

				

					$format[] = '%d';

					break;

				default:

					MulticacheHelper::log_error('Undefined case for startTest function '.$key,'serious-error',$insertObj);

	

			}

		}

		//check matches data to format

		$result = $wpdb->insert($tablename , $data , $format);

	}

	

	

	public static function writeJsCacheStrategyMain($signature_hash, $loadsection, $switch, $load_state, $stubs = null, $JSTexclude = null)

	{

	

		if (empty($signature_hash) || empty($loadsection) || ! isset($switch) || ! isset($load_state))

		{

			Return false;

		}

	

		$signature_hash = preg_replace('/\s/', '', var_export($signature_hash, true));

		$signature_hash = str_replace(',)', ')', $signature_hash);

		$loadsection = var_export($loadsection, true);

		$load_state = isset($load_state) ? var_export($load_state, true) : null;

		$stubs = var_export($stubs, true);

		if (! empty($JSTexclude->url))

		{

			$JSTurl = preg_replace('/\s/', '', var_export($JSTexclude->url, true));

			$JSTurl = str_replace(',)', ')', $JSTurl);

		}

		if (! empty($JSTexclude->query))

		{

			$JSTquery = preg_replace('/\s/', '', var_export($JSTexclude->query, true));

			$JSTquery = str_replace(',)', ')', $JSTquery);

		}

		if (! empty($JSTexclude->settings))

		{

			$JSTsettings = var_export($JSTexclude->settings, true);

		}

		if (! empty($JSTexclude->component))

		{

			$JSTcomponents = preg_replace('/\s/', '', var_export($JSTexclude->component, true));

			$JSTcomponents = str_replace(',)', ')', $JSTcomponents);

		}

		if (! empty($JSTexclude->url_strings))

		{

			$JSTurlstrings = preg_replace('/\s/', '', var_export($JSTexclude->url_strings, true));

			$JSTurlstrings = str_replace(',)', ')', $JSTurlstrings);

		}

	

		ob_start();

		echo "<?php

        /**

 * MulticacheWP

 * http://www.multicache.org

 * High Performance fastcache Controller

 * version 1.0.1.1

 * Author: Wayne DSouza

 * Author URI: http://onlinemarketingconsultants.in

 * License: GNU GENERAL PUBLIC LICENSE see license.txt

 */

defined('_MULTICACHEWP_EXEC') or die();

				

class JsStrategy{

public static \$js_switch = " . $switch . ";

	

public static \$simulation_id = " . $load_state . "	;

	

public static \$stubs = " . $stubs . " ;

     ";

		$cl_buf = ob_get_clean();

		if (! empty($JSTexclude->settings) && (! empty($JSTexclude->url) || ! empty($JSTexclude->query)))

		{

			ob_start();

			echo "

public static \$JSTsetting = " . $JSTsettings . ";

  ";

			$cl_buf .= ob_get_clean();

		}

		if (! empty($JSTexclude->url))

		{

			ob_start();

			echo "

public static \$JSTCludeUrl = " . $JSTurl . ";

  ";

			$cl_buf .= ob_get_clean();

		}

	

		if (! empty($JSTexclude->query))

		{

	

			ob_start();

			echo "

public static \$JSTCludeQuery = " . $JSTquery . ";

  ";

			$cl_buf .= ob_get_clean();

		}

		if (! empty($JSTexclude->component))

		{

	

			ob_start();

			echo "

public static \$JSTexcluded_components = " . $JSTcomponents . ";

  ";

			$cl_buf .= ob_get_clean();

		}

		if (! empty($JSTexclude->url_strings))

		{

	

			ob_start();

			echo "

public static \$JSTurl_strings = " . $JSTurlstrings . ";

  ";

			$cl_buf .= ob_get_clean();

		}

		ob_start();

		echo "

	

	

	

public static function getJsSignature(){

\$sigss = " . trim($signature_hash) . ";

Return \$sigss;

}

	

	

public static function getLoadSection(){

\$loadsec = " . trim($loadsection) . ";

Return \$loadsec;

}

	

	

}

?>";

		$cl_buf .= ob_get_clean();

		$cl_buf = serialize($cl_buf);

	

		//$dir = JPATH_ADMINISTRATOR . '/components/com_multicache/lib';

		$dir = plugin_dir_path(dirname(__FILE__)).'libs/';//JPATH_ADMINISTRATOR . '/components/com_multicache/lib';

		$filename = 'jscachestrategy.php';

		$success = self::writefileTolocation($dir, $filename, $cl_buf);

		Return $success;

	

	}

	

	

	public static function writeJsCacheStrategy($signature_hash, $loadsection, $switch = null, $load_state = null, $stubs = null, $JSTexclude = null)

	{

	

		if (empty($signature_hash))

		{

			if (! class_exists('JsStrategySimControl'))

			{

				Return false;

			}

			if (method_exists('JsStrategySimControl', 'getJsSignature'))

			{

				$signature_hash = JsStrategySimControl::getJsSignature();

			}

			else

			{

				$signature_hash = null;

			}

		}

		if (empty($loadsection))

		{

			if (! class_exists('JsStrategySimControl'))

			{

				Return false;

			}

			if (method_exists('JsStrategySimControl', 'getLoadSection'))

			{

				$loadsection = JsStrategySimControl::getLoadSection();

			}

			else

			{

				$loadsection = null;

			}

		}

	

		$file = JPATH_ADMINISTRATOR . '/components/com_multicache/lib/jscachestrategy_simcontrol.php';

		$signature_hash = preg_replace('/\s/', '', var_export($signature_hash, true));

		$signature_hash = str_replace(',)', ')', $signature_hash);

		$loadsection = var_export($loadsection, true);

		$load_state = isset($load_state) ? var_export($load_state, true) : null;

	

		$stubs = var_export($stubs, true);

		if (! empty($JSTexclude->url))

		{

			$JSTurl = preg_replace('/\s/', '', var_export($JSTexclude->url, true));

			$JSTurl = str_replace(',)', ')', $JSTurl);

		}

		if (! empty($JSTexclude->query))

		{

			$JSTquery = preg_replace('/\s/', '', var_export($JSTexclude->query, true));

			$JSTquery = str_replace(',)', ')', $JSTquery);

		}

		if (! empty($JSTexclude->settings))

		{

			$JSTsettings = var_export($JSTexclude->settings, true);

		}

		if (! empty($JSTexclude->component))

		{

			$JSTcomponents = preg_replace('/\s/', '', var_export($JSTexclude->component, true));

			$JSTcomponents = str_replace(',)', ')', $JSTcomponents);

		}

		if (! empty($JSTexclude->url_strings))

		{

			$JSTurlstrings = preg_replace('/\s/', '', var_export($JSTexclude->url_strings, true));

			$JSTurlstrings = str_replace(',)', ')', $JSTurlstrings);

		}

	

		ob_start();

		echo "<?php

/**

 * MulticacheWP

 * http://www.multicache.org

 * High Performance fastcache Controller

 * version 1.0.1.1

 * Author: Wayne DSouza

 * Author URI: http://onlinemarketingconsultants.in

 * License: GNU GENERAL PUBLIC LICENSE see license.txt

 */

defined('_MULTICACHEWP_EXEC') or die();

				

class JsStrategySimControl{

public static \$js_switch = " . $switch . "	;

	

public static \$simulation_id = " . $load_state . "	;

	

	

public static \$stubs = " . $stubs . " ;

    ";

		$cl_buf = ob_get_clean();

		if (! empty($JSTexclude->settings) && (! empty($JSTexclude->url) || ! empty($JSTexclude->query)))

		{

			ob_start();

			echo "

public static \$JSTsetting = " . $JSTsettings . ";

  ";

			$cl_buf .= ob_get_clean();

		}

		if (! empty($JSTexclude->url))

		{

			ob_start();

			echo "

public static \$JSTCludeUrl = " . $JSTurl . ";

  ";

			$cl_buf .= ob_get_clean();

		}

	

		if (! empty($JSTexclude->query))

		{

	

			ob_start();

			echo "

public static \$JSTCludeQuery = " . $JSTquery . ";

  ";

			$cl_buf .= ob_get_clean();

		}

		if (! empty($JSTexclude->component))

		{

	

			ob_start();

			echo "

public static \$JSTexcluded_components = " . $JSTcomponents . ";

  ";

			$cl_buf .= ob_get_clean();

		}

		if (! empty($JSTexclude->url_strings))

		{

	

			ob_start();

			echo "

public static \$JSTurl_strings = " . $JSTurlstrings . ";

  ";

			$cl_buf .= ob_get_clean();

		}

		ob_start();

		echo "

	

	

public static function getJsSignature(){

\$sigss = " . trim($signature_hash) . ";

Return \$sigss;

}

	

	

public static function getLoadSection(){

\$loadsec = " . trim($loadsection) . ";

Return \$loadsec;

}

	

	

}

?>";

		$cl_buf .= ob_get_clean();

		$cl_buf = serialize($cl_buf);

	

		//$dir = JPATH_ADMINISTRATOR . '/components/com_multicache/lib';

		$dir = plugin_dir_path(dirname(__FILE__)).'libs/';//JPATH_ADMINISTRATOR . '/components/com_multicache/lib';

		$filename = 'jscachestrategy_simcontrol.php';

		$success = self::writefileTolocation($dir, $filename, $cl_buf);

		Return $success;

	

	}

	

	public static function largeIntCompare($a , $b , $s=null ) 

	{

		// check if they're valid positive numbers, extract the whole numbers and decimals

		if(!preg_match("~^\+?(\d+)(\.\d+)?$~", $a, $match1)

		|| !preg_match("~^\+?(\d+)(\.\d+)?$~", $b, $match2))

		{

			return false;

		}

	

		// remove leading zeroes from whole numbers

		$a = ltrim($match1[1],'0');

		$b = ltrim($match2[1],'0');

	

		// first, we can just check the lengths of the numbers, this can help save processing time

		// if $a is longer than $b, return 1.. vice versa with the next step.

		if(strlen($a)>strlen($b))

		{

			return 1;

		}

		else

		 {

			if(strlen($a)<strlen($b))

			{

				return -1;

			}

	

			// if the two numbers are of equal length, we check digit-by-digit

			else {

	

				// remove ending zeroes from decimals and remove point

				$decimal1 = isset( $match1[2] ) ? rtrim( substr( $match1[2] ,1 ) ,'0' ) :'';

				$decimal2 = isset( $match2[2] ) ? rtrim( substr( $match2[2] ,1 ) ,'0' ) :'';

	

				// scaling if defined

				if($s!== null) 

				{

					$decimal1 = substr($decimal1 ,0 , $s);

					$decimal2 = substr($decimal2 ,0 , $s);

				}

	

				// calculate the longest length of decimals

				$DLen = max( strlen($decimal1) , strlen($decimal2) );

	

				// append the padded decimals onto the end of the whole numbers

				$a .=str_pad( $decimal1 ,$DLen, '0');

				$b .=str_pad( $decimal2 ,$DLen, '0');

	

				// check digit-by-digit, if they have a difference, return 1 or -1 (greater/lower than)

				for($i=0;$i<strlen($a);$i++) 

				{

					if((int)$a{$i}>(int)$b{$i})

					{

						return 1;

					}

					else

						if((int)$a{$i}<(int)$b{$i})

						{

							return -1;

						}

				}

	

				// if the two numbers have no difference (they're the same).. return 0

				return 0;

			}

		}

	}

	

	public static function getJScodeUrl($load_state, $key, $type = null, $jquery_scope = "$", $media = "default")

	{

	

		//$base_url = '//' . str_replace("http://", "", strtolower(substr(JURI::root(), 0, - 1)) . '/media/com_multicache/assets/js/jscache/');

		$base_url = plugins_url( 'delivery/assets/js/jscache/', dirname(__FILE__));

		if (isset($type) && $type == "raw_url")

		{

			Return $base_url . $key . '-' . $load_state . ".js?mediaVersion=" . $media;

		}

		// script_url

	

		if (isset($type) && $type == "script_url")

		{

			$script = '<script src="' . $base_url . $key . '-' . $load_state . '.js?mediaVersion=' . $media . '"   type="text/javascript" ></script>';

			Return serialize($script);

		}

		$url = $jquery_scope . '.getScript(' . '"' . $base_url . $key . '-' . $load_state . '.js?mediaVersion=' . $media . '"' . ');';

	

		Return serialize($url);

	

	}

	

	public static function getdelaycode($delay_type, $jquery_scope = "$", $mediaFormat)

	{

	

		//$app = JFactory::getApplication();

		// $delay_type = self::extractDelayType($delay_array);

		//$base_url = '//' . str_replace("http://", "", strtolower(substr(JURI::root(), 0, - 1)) . '/media/com_multicache/assets/js/jscache/');

		$base_url = plugin_dir_url(dirname(__FILE__)).'delivery/assets/js/jscache/';

		if ($delay_type == "scroll")

		{

			$name = "simcontrol_onscrolldelay.js";

			$url = $base_url . $name;

			$inline_code = '

                            var url_' . $delay_type . ' = "' . $url . '?mediaFormat=' . $mediaFormat . '";var script_delay_' . $delay_type . '_counter = 0;var max_trys_' . $delay_type . ' = 3;var inter_lock_' . $delay_type . '= 1;' . $jquery_scope . '(window).scroll(function(event) {/*alert("count "+script_delay_' . $delay_type . '_counter);*/console.log("count " + script_delay_' . $delay_type . '_counter);console.log("scroll detected" );if(!inter_lock_' . $delay_type . '){return;/*an equivalent to continue*/}++script_delay_' . $delay_type . '_counter;if(script_delay_' . $delay_type . '_counter <=  max_trys_' . $delay_type . ') {inter_lock_' . $delay_type . ' = 0;'                                                      . $jquery_scope . '( this).unbind( event );console.log("unbind");' . $jquery_scope . '.getScript( url_' . $delay_type . ', function() {console.log("getscrpt call on ' . $delay_type . '" );script_delay_' . $delay_type . '_counter =  max_trys_' . $delay_type . '+1;}).fail(function(jqxhr, settings, exception) {/*alert("loading failed" + url_' . $delay_type . ');*/console.log("loading failed in " + url_' . $delay_type . ' +" trial "+ script_delay_' . $delay_type . '_counter);console.log("exception -"+ exception);console.log("settings -"+ settings);console.log("jqxhr -"+ jqxhr);inter_lock_' . $delay_type . ' = 1;});}else{/* alert("giving up");*/' . $jquery_scope . '( this).unbind( "scroll" );console.log("failed scroll loading  "+ url_' . $delay_type . '+"  giving up" );}});';

			

		}

		elseif ($delay_type == "mousemove")

		{

			$name = "simcontrol_onmousemovedelay.js";

			$url = $base_url . $name;

			$inline_code = '

var url_' . $delay_type . ' = "' . $url . '?mediaFormat=' . $mediaFormat . '";var script_delay_' . $delay_type . '_counter = 0;var max_trys_' . $delay_type . ' = 3;var inter_lock_' . $delay_type . '= 1;' . $jquery_scope . '(window).on("mousemove" ,function( event ) {/*alert("count "+script_delay_counter);*/console.log("count " + script_delay_' . $delay_type . '_counter);console.log("mousemove detected" );if(!inter_lock_' . $delay_type . '){return;/*an equivalent to continue*/}++script_delay_' . $delay_type . '_counter;if(script_delay_' . $delay_type . '_counter <= max_trys_' . $delay_type . ') {inter_lock_' . $delay_type . ' = 0;' . $jquery_scope . '( this).unbind( event );console.log("unbind");' . $jquery_scope . '.getScript( url_' . $delay_type . ', function() {console.log("getscrpt call on ' . $delay_type . '" );script_delay_' . $delay_type . '_counter =  max_trys_' . $delay_type . ';}).fail(function(jqxhr, settings, exception) {/*alert("loading failed" + url_' . $delay_type . ');*/console.log("loading failed in " + url_' . $delay_type . '  +" trial "+ script_delay_' . $delay_type . '_counter);console.log("exception -"+ exception);console.log("settings -"+ settings);console.log("jqxhr -"+ jqxhr);inter_lock_' . $delay_type . ' = 1;});}else{/* alert("giving up");*/' . $jquery_scope . '( this).unbind( "mousemove" );console.log("failed loading "+ url_' . $delay_type . '+"  giving up" );}});';

			

		}

		else

		{

			self::prepareMessageEnqueue(__('Simcontrol getDelayCode JS Delay encountered an unlisted delay type while preparing delay code'), 'error');

			//$app->enqueueMessage(JText::_('COM_MULTICACHE_ERROR_JQUERY_DELAY_TYPE_UNLISTED_CONDITION'), 'notice');

		}

	

		$obj["code"] = serialize($inline_code);

		$obj["url"] = $name;

	

		Return $obj;

	

	}

}