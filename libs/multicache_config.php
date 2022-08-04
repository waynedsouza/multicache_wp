<?php

/**
 * MulticacheWP
 * http://www.multicache.org
 * High Performance fastcache Controller
 * Version: 1.0.0.7
 * Author: Wayne DSouza
 * Author URI: http://onlinemarketingconsultants.in
 * License: GNU GENERAL PUBLIC LICENSE see license.txt
 */
defined('_MULTICACHEWP_EXEC') or die();

class MulticacheConfig
 {
        
public $cache_handler = 'file';
public $cachetime = '1440';
public $caching = '1';
public $cache_user_loggedin = '0';
public $optimize_user_loggedin = '0';
public $cache_query_urls = '1';
public $optimize_query_urls = '1';
public $debug = '0';
public $ccomp = '1';
public $lifetime = '15';
public $live_site = 'http://getchic.com';
public $secret = 'd26288070efe10b7b8a6d1caab36e7e8';
public $multicacheeditmode = '1';
public $multicachelock = '0';
public $multicache_persist = '1';
public $multicache_compress = '1';
public $multicache_server_host = 'localhost';
public $multicache_server_port = '11211';
public $multicachedebug = '0';
public $multicachedebuggrp = '';
public $multicachedistribution = '3';
public $ccomp_factor = '0.22';
public $precache_factor = '2';
public $multicache_server_port2 = '11233';
public $force_locking_off = '1';
public $cache_comment_invalidation = '1';
public $absolute_path = '/home/cisp4kto4ppo/public_html/getchic.com/';
public $plugin_dir_path = '/home/cisp4kto4ppo/public_html/getchic.com/wp-content/plugins/multicache_wp/';
public $storage = 'fastcache';
public $gzip = '0';
public $indexhack = '0';
public $multicacheprecacheswitch = null;
public $cache_path = '/home/cisp4kto4ppo/public_html/getchic.com/wp-content/cache/';

 }