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



function multicache_handle_comments()

{

	wp_nonce_field('multicache-url-'.MulticacheUri::getInstance()->toString(),'multicache_comment_n');

	echo '<input type="hidden" name="multicache_comment_u" value="'.MulticacheUri::getInstance()->toString().'" />';

}



function multicache_comment_post_redirect($a)

{

	if(isset($_REQUEST['multicache_comment_n']) && isset($_REQUEST['_wp_http_referer']))

	{

		$uri = trim(MulticacheHelper::validate_host(home_url($_REQUEST['_wp_http_referer'])));

		//check_admin_referer('multicache-url-'.$uri ,'multicache_comment_n' );

		

		if(!wp_verify_nonce($_REQUEST['multicache_comment_n'] ,'multicache-url-'.$uri ))

		{

			Return $a;

		}

		$comment_id = get_comment_ID();

		

		$invalidation_mode = MulticacheFactory::getConfig()->getC('cache_comment_invalidation', 0);

		if($invalidation_mode == 1)

		{

			$cache = MulticacheFactory::getCache('page')->cache;

			$user_obj = getUserMulticache();

			$user = !empty($user_obj)? $user_obj['id']->ID : 0;

			$delete = $cache->remove($uri ,'page' , $user);

			

		}

		elseif($invalidation_mode == 2)

		{

			$cache_time = MulticacheFactory::getConfig()->getC('cachetime' ,3600);

			$invalidation_object = get_transient('multicache_invalidation_object');

			$invalidation_object = unserialize($invalidation_object);

			if(empty($invalidation_object))

			{

				$invalidation_object = array();

			}

			/*

			 * Assumption: every comment has only one url that it was posted from

			 * 

			 */

			if(!isset($invalidation_object[$comment_id]))

			{

				$invalidation_object[$comment_id] = $uri;

			}

			

			set_transient('multicache_invalidation_object',serialize($invalidation_object) , (int)$cache_time);

		}

	}

	Return $a;

}

add_filter('comment_post_redirect','multicache_comment_post_redirect');







function multicache_invalidate_comment($new_status, $old_status, $comment) {

	

	

	if($old_status != $new_status) {

		if($new_status == 'approved') {

			$comment_id = $comment->comment_ID;

			$comment_post_id = $comment->comment_post_ID;

			$perma_link = get_permalink($comment_post_id);

			$user = (int) $comment->user_id;

			$invalidation_object = get_transient('multicache_invalidation_object');

			$invalidation_object = unserialize($invalidation_object);

			

			$delete_keys = array();

			if(!empty($invalidation_object))

			{

				$u = $invalidation_object[$comment_id];

				$delete_keys[$u] = 1;	

				

			}

			unset($invalidation_object[$comment_id]);

			if(!empty($invalidation_object))

			{

				$cache_time = MulticacheFactory::getConfig()->getC('cachetime' ,3600);

				set_transient('multicache_invalidation_object',serialize($invalidation_object) , (int)$cache_time);

			}

			else

			{

				delete_transient('multicache_invalidation_object');

			}

			$delete_keys[$perma_link] = 1;

			

			if(empty($delete_keys))

			{

				Return;

			}

			

			$cache = MulticacheFactory::getCache('page')->cache;

			

			

			foreach($delete_keys As $key =>$del)

			{

				$delete = $cache->remove($key ,'page' , $user);// were only interested in public pages here

				

			}

		}

	}

}

add_action('transition_comment_status', 'multicache_invalidate_comment', 10, 3);

function multicache_clear_posts($old , $new , $post)

{

	$options = get_option('multicache_config_options');

	$post_invalidation = isset($options['post_invalidation']) && 1 === $options['post_invalidation']? 1: 0;

	if(empty($post_invalidation))

	{

		Return;

	}

	$clear_cache = false;

	switch($new)

	{

		case 'auto-draft':

			break;

		case 'draft':

			break;

		default:

			$clear_cache = true;

			/*

			$n = var_export($new , true);

			error_log($n , 3 , dirname(__FILE__).'/zzposttransitionstatuses.log');

			*/

	}

	if($clear_cache)

	{

		$permalink_structure = get_option('permalink_structure');

		$site_name = get_bloginfo('url');

		$post_date = isset($post->post_date)?$post->post_date : null;

		if(isset($post_date))

		{

			 preg_match('~^([0-9]{4})-([0-9]{2})-([0-9]{2}).*~' ,$post_date , $matches );

			 if(!empty($matches))

			 {

			 	$yy = $matches[1];

			 	$mm = $matches[2];

			 	$dd = $matches[3];

			 	$search = array('%year%','%monthnum%' , '%day%'  );

			 	$replace = array($yy , $mm , $dd );

			 	$permalink_1 = str_replace($search , $replace , $permalink_structure);

			 	$search = array( '%pagename%', '%postname%' );

			 	$replace = isset($post->post_name)? $post->post_name : '';

			 	$permalink_1 = str_replace($search , $replace , $permalink_1);

			 	$permalink_1 = $site_name . $permalink_1;

			 	$permalink_2 = rtrim($permalink_1 , '/');

			 	

			 	

			 }

		}

		$perma_link = isset($post->id) ? get_permalink($post->id): false;

		$guid_link = isset($post->guid)? $post->guid : false;

		$cache = MulticacheFactory::getCache('page')->cache;

		$status1 = $cache->remove($perma_link ,'page' , 0);

		$status2 =$cache->remove($guid_link ,'page' , 0);

		$status3 =$cache->remove($permalink_1 ,'page' , 0);

		$status4 =$cache->remove($permalink_2 ,'page' , 0);

		

		/*$n = var_export(array($status1,$status2,$status3,$permalink_2,$permalink_1,$perma_link,$guid_link ) , true);

		error_log($n , 3 , dirname(__FILE__).'/zzpostcacheclear.log');

		*/

	}

	

}

function multicache_clear_posts_confirm($id)

{

	$options = get_option('multicache_config_options');

	$post_invalidation = isset($options['post_invalidation']) && 1 === $options['post_invalidation']? 1: 0;

	if(empty($post_invalidation))

	{

		Return;

	}

	$post = get_post($id);

	if(isset($post))

	{

		$post_name = $post->post_name;

	}

	$permalink = get_permalink($id);

	$search = array( '%pagename%', '%postname%' );

	$replace = isset($post_name)? $post_name : '';

	$permalink_1 = str_replace($search , $replace , $permalink);

	$permalink_2 = rtrim($permalink_1 , '/');

	$cache = MulticacheFactory::getCache('page')->cache;

	$status1 = $cache->remove($permalink_1 ,'page' , 0);

	$status2 = $cache->remove($permalink_2 ,'page' , 0);

	/*

	$n = var_export(array($status1 , $permalink_1 , $permalink_2) , true);

	error_log($n , 3 , dirname(__FILE__).'/zzpost2cacheclear.log');

	*/

	

	

}

add_action(  'transition_post_status',  'multicache_clear_posts', 10, 3 );

add_action('wp_trash_post', 'multicache_clear_posts_confirm', 0);

add_action('publish_post', 'multicache_clear_posts_confirm', 0);

add_action('edit_post', 'multicache_clear_posts_confirm', 0); // leaving a comment called edit_post

add_action('delete_post', 'multicache_clear_posts_confirm', 0);

add_action('publish_phone', 'multicache_clear_posts_confirm', 0);

