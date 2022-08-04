<?php

/**
 * MulticacheWP
 * http://www.multicache.org
 * High Performance fastcache Controller
 * Version: 1.0.0.7
 * Author: Wayne DSouza
 * Author URI: http://onlinemarketingconsultants.in
 * License: GNU GENERAL PUBLIC LICENSE see license.txt
 * Please make changes in the control panel. This class may be overwritten
 */


defined('_MULTICACHEWP_EXEC') or die;
class MulticachePageScripts{

public static $original_script_array  = array (
  0 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
			window._wpemojiSettings = {"baseUrl":"https:\\/\\/s.w.org\\/images\\/core\\/emoji\\/72x72\\/","ext":".png","source":{"concatemoji":"http:\\/\\/getchic.com\\/wp-includes\\/js\\/wp-emoji-release.min.js?ver=4.4.3"}};
			!function(a,b,c){function d(a){var c,d,e,f=b.createElement("canvas"),g=f.getContext&&f.getContext("2d"),h=String.fromCharCode;return g&&g.fillText?(g.textBaseline="top",g.font="600 32px Arial","flag"===a?(g.fillText(h(55356,56806,55356,56826),0,0),f.toDataURL().length>3e3):"diversity"===a?(g.fillText(h(55356,57221),0,0),c=g.getImageData(16,16,1,1).data,g.fillText(h(55356,57221,55356,57343),0,0),c=g.getImageData(16,16,1,1).data,e=c[0]+","+c[1]+","+c[2]+","+c[3],d!==e):("simple"===a?g.fillText(h(55357,56835),0,0):g.fillText(h(55356,57135),0,0),0!==g.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		',
    'async' => 0,
    'serialized' => 's:1599:"<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\\/\\/s.w.org\\/images\\/core\\/emoji\\/72x72\\/","ext":".png","source":{"concatemoji":"http:\\/\\/getchic.com\\/wp-includes\\/js\\/wp-emoji-release.min.js?ver=4.4.3"}};
			!function(a,b,c){function d(a){var c,d,e,f=b.createElement("canvas"),g=f.getContext&&f.getContext("2d"),h=String.fromCharCode;return g&&g.fillText?(g.textBaseline="top",g.font="600 32px Arial","flag"===a?(g.fillText(h(55356,56806,55356,56826),0,0),f.toDataURL().length>3e3):"diversity"===a?(g.fillText(h(55356,57221),0,0),c=g.getImageData(16,16,1,1).data,g.fillText(h(55356,57221,55356,57343),0,0),c=g.getImageData(16,16,1,1).data,e=c[0]+","+c[1]+","+c[2]+","+c[3],d!==e):("simple"===a?g.fillText(h(55357,56835),0,0):g.fillText(h(55356,57135),0,0),0!==g.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>";',
    'signature' => 'b49284e5559c58436a0a7cd62cc96316',
    'alt_signature' => NULL,
    'rank' => 0,
    'quoted' => '\\<script type\\="text/javascript"\\>
			window\\._wpemojiSettings \\= \\{"baseUrl"\\:"https\\:\\\\/\\\\/s\\.w\\.org\\\\/images\\\\/core\\\\/emoji\\\\/72x72\\\\/","ext"\\:"\\.png","source"\\:\\{"concatemoji"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-includes\\\\/js\\\\/wp\\-emoji\\-release\\.min\\.js\\?ver\\=4\\.4\\.3"\\}\\};
			\\!function\\(a,b,c\\)\\{function d\\(a\\)\\{var c,d,e,f\\=b\\.createElement\\("canvas"\\),g\\=f\\.getContext&&f\\.getContext\\("2d"\\),h\\=String\\.fromCharCode;return g&&g\\.fillText\\?\\(g\\.textBaseline\\="top",g\\.font\\="600 32px Arial","flag"\\=\\=\\=a\\?\\(g\\.fillText\\(h\\(55356,56806,55356,56826\\),0,0\\),f\\.toDataURL\\(\\)\\.length\\>3e3\\)\\:"diversity"\\=\\=\\=a\\?\\(g\\.fillText\\(h\\(55356,57221\\),0,0\\),c\\=g\\.getImageData\\(16,16,1,1\\)\\.data,g\\.fillText\\(h\\(55356,57221,55356,57343\\),0,0\\),c\\=g\\.getImageData\\(16,16,1,1\\)\\.data,e\\=c\\[0\\]\\+","\\+c\\[1\\]\\+","\\+c\\[2\\]\\+","\\+c\\[3\\],d\\!\\=\\=e\\)\\:\\("simple"\\=\\=\\=a\\?g\\.fillText\\(h\\(55357,56835\\),0,0\\)\\:g\\.fillText\\(h\\(55356,57135\\),0,0\\),0\\!\\=\\=g\\.getImageData\\(16,16,1,1\\)\\.data\\[0\\]\\)\\)\\:\\!1\\}function e\\(a\\)\\{var c\\=b\\.createElement\\("script"\\);c\\.src\\=a,c\\.type\\="text/javascript",b\\.getElementsByTagName\\("head"\\)\\[0\\]\\.appendChild\\(c\\)\\}var f,g;c\\.supports\\=\\{simple\\:d\\("simple"\\),flag\\:d\\("flag"\\),unicode8\\:d\\("unicode8"\\),diversity\\:d\\("diversity"\\)\\},c\\.DOMReady\\=\\!1,c\\.readyCallback\\=function\\(\\)\\{c\\.DOMReady\\=\\!0\\},c\\.supports\\.simple&&c\\.supports\\.flag&&c\\.supports\\.unicode8&&c\\.supports\\.diversity\\|\\|\\(g\\=function\\(\\)\\{c\\.readyCallback\\(\\)\\},b\\.addEventListener\\?\\(b\\.addEventListener\\("DOMContentLoaded",g,\\!1\\),a\\.addEventListener\\("load",g,\\!1\\)\\)\\:\\(a\\.attachEvent\\("onload",g\\),b\\.attachEvent\\("onreadystatechange",function\\(\\)\\{"complete"\\=\\=\\=b\\.readyState&&c\\.readyCallback\\(\\)\\}\\)\\),f\\=c\\.source\\|\\|\\{\\},f\\.concatemoji\\?e\\(f\\.concatemoji\\)\\:f\\.wpemoji&&f\\.twemoji&&\\(e\\(f\\.twemoji\\),e\\(f\\.wpemoji\\)\\)\\)\\}\\(window,document,window\\._wpemojiSettings\\);
		\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:1559:"
			window._wpemojiSettings = {"baseUrl":"https:\\/\\/s.w.org\\/images\\/core\\/emoji\\/72x72\\/","ext":".png","source":{"concatemoji":"http:\\/\\/getchic.com\\/wp-includes\\/js\\/wp-emoji-release.min.js?ver=4.4.3"}};
			!function(a,b,c){function d(a){var c,d,e,f=b.createElement("canvas"),g=f.getContext&&f.getContext("2d"),h=String.fromCharCode;return g&&g.fillText?(g.textBaseline="top",g.font="600 32px Arial","flag"===a?(g.fillText(h(55356,56806,55356,56826),0,0),f.toDataURL().length>3e3):"diversity"===a?(g.fillText(h(55356,57221),0,0),c=g.getImageData(16,16,1,1).data,g.fillText(h(55356,57221,55356,57343),0,0),c=g.getImageData(16,16,1,1).data,e=c[0]+","+c[1]+","+c[2]+","+c[3],d!==e):("simple"===a?g.fillText(h(55357,56835),0,0):g.fillText(h(55356,57135),0,0),0!==g.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  1 => 
  array (
    'src' => 'http://getchic.com/wp-includes/js/jquery/jquery.js?ver=1.11.3',
    'src_clean' => 'http://getchic.com/wp-includes/js/jquery/jquery.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:108:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-includes/js/jquery/jquery.js?ver=1.11.3\'></script>";',
    'signature' => 'b0446bf6ab5f5d24cc9651089c45b05a',
    'alt_signature' => NULL,
    'rank' => 1,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-includes/js/jquery/jquery\\.js\\?ver\\=1\\.11\\.3\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-includes/js/jquery/jquery.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  2 => 
  array (
    'src' => 'http://getchic.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1',
    'src_clean' => 'http://getchic.com/wp-includes/js/jquery/jquery-migrate.min.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:119:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1\'></script>";',
    'signature' => '359223032d667ed556c98c1fe9393bbe',
    'alt_signature' => NULL,
    'rank' => 2,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-includes/js/jquery/jquery\\-migrate\\.min\\.js\\?ver\\=1\\.2\\.1\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-includes/js/jquery/jquery-migrate.min.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  3 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/tubepress/src/main/web/js/tubepress.js?ver=4.4.3',
    'src_clean' => 'http://getchic.com/wp-content/plugins/tubepress/src/main/web/js/tubepress.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:133:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/tubepress/src/main/web/js/tubepress.js?ver=4.4.3\'></script>";',
    'signature' => '0ae239871c96a761d11138d8a6f07d41',
    'alt_signature' => NULL,
    'rank' => 3,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/tubepress/src/main/web/js/tubepress\\.js\\?ver\\=4\\.4\\.3\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/tubepress/src/main/web/js/tubepress.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  4 => 
  array (
    'src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/scripts.js?ver=4.4.3',
    'src_clean' => 'http://getchic.com/wp-content/themes/gazette/includes/js/scripts.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:124:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/themes/gazette/includes/js/scripts.js?ver=4.4.3\'></script>";',
    'signature' => '9e390946e467fde81cd2fe769b357881',
    'alt_signature' => NULL,
    'rank' => 4,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/themes/gazette/includes/js/scripts\\.js\\?ver\\=4\\.4\\.3\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/scripts.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  5 => 
  array (
    'src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/wooslider.js?ver=4.4.3',
    'src_clean' => 'http://getchic.com/wp-content/themes/gazette/includes/js/wooslider.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:126:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/themes/gazette/includes/js/wooslider.js?ver=4.4.3\'></script>";',
    'signature' => 'b1c014fe510257ae2303b3f00dbf44f9',
    'alt_signature' => NULL,
    'rank' => 5,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/themes/gazette/includes/js/wooslider\\.js\\?ver\\=4\\.4\\.3\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/wooslider.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  6 => 
  array (
    'src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/superfish.js?ver=4.4.3',
    'src_clean' => 'http://getchic.com/wp-content/themes/gazette/includes/js/superfish.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:126:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/themes/gazette/includes/js/superfish.js?ver=4.4.3\'></script>";',
    'signature' => '6c580e8943a3a9eca6f6efbd14475e38',
    'alt_signature' => NULL,
    'rank' => 6,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/themes/gazette/includes/js/superfish\\.js\\?ver\\=4\\.4\\.3\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/superfish.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  7 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
var _gaq = _gaq || [];
_gaq.push([\'_setAccount\', \'UA-42367960-1\']);
_gaq.push([\'_trackPageview\']);
(function() {
var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
})();
',
    'async' => 0,
    'serialized' => 's:449:"<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push([\'_setAccount\', \'UA-42367960-1\']);
_gaq.push([\'_trackPageview\']);
(function() {
var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>";',
    'signature' => 'afdc5748586a76153f63324c9257bc37',
    'alt_signature' => NULL,
    'rank' => 7,
    'quoted' => '\\<script type\\="text/javascript"\\>
var _gaq \\= _gaq \\|\\| \\[\\];
_gaq\\.push\\(\\[\'_setAccount\', \'UA\\-42367960\\-1\'\\]\\);
_gaq\\.push\\(\\[\'_trackPageview\'\\]\\);
\\(function\\(\\) \\{
var ga \\= document\\.createElement\\(\'script\'\\); ga\\.type \\= \'text/javascript\'; ga\\.async \\= true;
ga\\.src \\= \\(\'https\\:\' \\=\\= document\\.location\\.protocol \\? \'https\\://ssl\' \\: \'http\\://www\'\\) \\+ \'\\.google\\-analytics\\.com/ga\\.js\';
var s \\= document\\.getElementsByTagName\\(\'script\'\\)\\[0\\]; s\\.parentNode\\.insertBefore\\(ga, s\\);
\\}\\)\\(\\);
\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:409:"
var _gaq = _gaq || [];
_gaq.push([\'_setAccount\', \'UA-42367960-1\']);
_gaq.push([\'_trackPageview\']);
(function() {
var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
})();
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  8 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => 'var TubePressJsConfig = {"urls":{"base":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/tubepress","usr":"http:\\/\\/getchic.com\\/wp-content\\/tubepress-content"}};',
    'async' => 0,
    'serialized' => 's:197:"<script type="text/javascript">var TubePressJsConfig = {"urls":{"base":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/tubepress","usr":"http:\\/\\/getchic.com\\/wp-content\\/tubepress-content"}};</script>";',
    'signature' => '106112f3e86853d232880c21e3051431',
    'alt_signature' => NULL,
    'rank' => 8,
    'quoted' => '\\<script type\\="text/javascript"\\>var TubePressJsConfig \\= \\{"urls"\\:\\{"base"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-content\\\\/plugins\\\\/tubepress","usr"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-content\\\\/tubepress\\-content"\\}\\};\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:157:"var TubePressJsConfig = {"urls":{"base":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/tubepress","usr":"http:\\/\\/getchic.com\\/wp-content\\/tubepress-content"}};";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  9 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
		jQuery(document).ready(function(){
	    	jQuery(\'#wooslider\').wooslider(
	    		    	{
	   		sfade : false, // Slide Fade
			cfade : false, // content Fade
			offset : 20, // Padding offset
			speed: 700,
			timeout: 6000,
			content_speed: 1000			}
						);
		});
	',
    'async' => 0,
    'serialized' => 's:321:"<script type="text/javascript">
		jQuery(document).ready(function(){
	    	jQuery(\'#wooslider\').wooslider(
	    		    	{
	   		sfade : false, // Slide Fade
			cfade : false, // content Fade
			offset : 20, // Padding offset
			speed: 700,
			timeout: 6000,
			content_speed: 1000			}
						);
		});
	</script>";',
    'signature' => 'd7109fd6520d38ac9ac4f12a3a89fb47',
    'alt_signature' => NULL,
    'rank' => 9,
    'quoted' => '\\<script type\\="text/javascript"\\>
		jQuery\\(document\\)\\.ready\\(function\\(\\)\\{
	    	jQuery\\(\'#wooslider\'\\)\\.wooslider\\(
	    		    	\\{
	   		sfade \\: false, // Slide Fade
			cfade \\: false, // content Fade
			offset \\: 20, // Padding offset
			speed\\: 700,
			timeout\\: 6000,
			content_speed\\: 1000			\\}
						\\);
		\\}\\);
	\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:281:"
		jQuery(document).ready(function(){
	    	jQuery(\'#wooslider\').wooslider(
	    		    	{
	   		sfade : false, // Slide Fade
			cfade : false, // content Fade
			offset : 20, // Padding offset
			speed: 700,
			timeout: 6000,
			content_speed: 1000			}
						);
		});
	";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  10 => 
  array (
    'src' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
    'src_clean' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
    'code' => '',
    'async' => 1,
    'serialized' => 's:86:"<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>";',
    'signature' => 'c116846213901825b89e2e66c65472f5',
    'alt_signature' => NULL,
    'rank' => 10,
    'quoted' => '\\<script async src\\="//pagead2\\.googlesyndication\\.com/pagead/js/adsbygoogle\\.js"\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => false,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  11 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
(adsbygoogle = window.adsbygoogle || []).push({});
',
    'async' => 0,
    'serialized' => 's:71:"<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>";',
    'signature' => '017521f0a82e88d253482dd54c8f9370',
    'alt_signature' => NULL,
    'rank' => 11,
    'quoted' => '\\<script\\>
\\(adsbygoogle \\= window\\.adsbygoogle \\|\\| \\[\\]\\)\\.push\\(\\{\\}\\);
\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:54:"
(adsbygoogle = window.adsbygoogle || []).push({});
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  12 => 
  array (
    'src' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
    'src_clean' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
    'code' => '',
    'async' => 1,
    'serialized' => 's:86:"<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>";',
    'signature' => 'c116846213901825b89e2e66c65472f5',
    'alt_signature' => NULL,
    'rank' => 12,
    'quoted' => '\\<script async src\\="//pagead2\\.googlesyndication\\.com/pagead/js/adsbygoogle\\.js"\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => false,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  13 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
(adsbygoogle = window.adsbygoogle || []).push({});
',
    'async' => 0,
    'serialized' => 's:71:"<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>";',
    'signature' => '017521f0a82e88d253482dd54c8f9370',
    'alt_signature' => NULL,
    'rank' => 13,
    'quoted' => '\\<script\\>
\\(adsbygoogle \\= window\\.adsbygoogle \\|\\| \\[\\]\\)\\.push\\(\\{\\}\\);
\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:54:"
(adsbygoogle = window.adsbygoogle || []).push({});
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  14 => 
  array (
    'src' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
    'src_clean' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
    'code' => '',
    'async' => 1,
    'serialized' => 's:86:"<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>";',
    'signature' => 'c116846213901825b89e2e66c65472f5',
    'alt_signature' => NULL,
    'rank' => 14,
    'quoted' => '\\<script async src\\="//pagead2\\.googlesyndication\\.com/pagead/js/adsbygoogle\\.js"\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => false,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  15 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
(adsbygoogle = window.adsbygoogle || []).push({});
',
    'async' => 0,
    'serialized' => 's:71:"<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>";',
    'signature' => '017521f0a82e88d253482dd54c8f9370',
    'alt_signature' => NULL,
    'rank' => 15,
    'quoted' => '\\<script\\>
\\(adsbygoogle \\= window\\.adsbygoogle \\|\\| \\[\\]\\)\\.push\\(\\{\\}\\);
\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:54:"
(adsbygoogle = window.adsbygoogle || []).push({});
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  16 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=161465360652229";
fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));',
    'async' => 0,
    'serialized' => 's:317:"<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=161465360652229";
fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>";',
    'signature' => '8b514003e467d363b90858845efcfb1c',
    'alt_signature' => NULL,
    'rank' => 16,
    'quoted' => '\\<script\\>\\(function\\(d, s, id\\) \\{
var js, fjs \\= d\\.getElementsByTagName\\(s\\)\\[0\\];
if \\(d\\.getElementById\\(id\\)\\) return;
js \\= d\\.createElement\\(s\\); js\\.id \\= id;
js\\.src \\= "//connect\\.facebook\\.net/en_US/all\\.js#xfbml\\=1&appId\\=161465360652229";
fjs\\.parentNode\\.insertBefore\\(js, fjs\\);
\\}\\(document, \'script\', \'facebook\\-jssdk\'\\)\\);\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:300:"(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=161465360652229";
fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  17 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId  : \'\',
	      status : true,
	      cookie : true,
	      xfbml  : true
	    });
	  };

	  (function() {
	    var e = document.createElement(\'script\');
	    e.src = document.location.protocol + \'//connect.facebook.net/en_US/all.js\';
	    e.async = true;
	    document.getElementById(\'fb-root\').appendChild(e);
	  }());
	',
    'async' => 0,
    'serialized' => 's:403:"<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId  : \'\',
	      status : true,
	      cookie : true,
	      xfbml  : true
	    });
	  };

	  (function() {
	    var e = document.createElement(\'script\');
	    e.src = document.location.protocol + \'//connect.facebook.net/en_US/all.js\';
	    e.async = true;
	    document.getElementById(\'fb-root\').appendChild(e);
	  }());
	</script>";',
    'signature' => '06455011705f76618661a8280cbfeb08',
    'alt_signature' => NULL,
    'rank' => 17,
    'quoted' => '\\<script\\>
	  window\\.fbAsyncInit \\= function\\(\\) \\{
	    FB\\.init\\(\\{
	      appId  \\: \'\',
	      status \\: true,
	      cookie \\: true,
	      xfbml  \\: true
	    \\}\\);
	  \\};

	  \\(function\\(\\) \\{
	    var e \\= document\\.createElement\\(\'script\'\\);
	    e\\.src \\= document\\.location\\.protocol \\+ \'//connect\\.facebook\\.net/en_US/all\\.js\';
	    e\\.async \\= true;
	    document\\.getElementById\\(\'fb\\-root\'\\)\\.appendChild\\(e\\);
	  \\}\\(\\)\\);
	\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:386:"
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId  : \'\',
	      status : true,
	      cookie : true,
	      xfbml  : true
	    });
	  };

	  (function() {
	    var e = document.createElement(\'script\');
	    e.src = document.location.protocol + \'//connect.facebook.net/en_US/all.js\';
	    e.async = true;
	    document.getElementById(\'fb-root\').appendChild(e);
	  }());
	";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  18 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
jQuery(document).ready(function(){
	// UL = .wooTabs
	// Tab contents = .inside
	
	var tag_cloud_class = \'#tagcloud\'; 
	
	//Fix for tag clouds - unexpected height before .hide() 
	var tag_cloud_height = jQuery(\'#tagcloud\').height();
	
	jQuery(\'.inside ul li:last-child\').css(\'border-bottom\',\'0px\'); // remove last border-bottom from list in tab content
	jQuery(\'.wooTabs\').each(function(){
		jQuery(this).children(\'li\').children(\'a:first\').addClass(\'selected\'); // Add .selected class to first tab on load
	});
	jQuery(\'.inside > *\').hide();
	jQuery(\'.inside > *:first-child\').show();
	
	jQuery(\'.wooTabs li a\').click(function(evt){ // Init Click funtion on Tabs
	
		var clicked_tab_ref = jQuery(this).attr(\'href\'); // Strore Href value
		
		jQuery(this).parent().parent().children(\'li\').children(\'a\').removeClass(\'selected\'); //Remove selected from all tabs
		jQuery(this).addClass(\'selected\');
		jQuery(this).parent().parent().parent().children(\'.inside\').children(\'*\').hide();
		
		jQuery(\'.inside \' + clicked_tab_ref).fadeIn(500);
		 
		 evt.preventDefault();
	
	})
})
',
    'async' => 0,
    'serialized' => 's:1114:"<script type="text/javascript">
jQuery(document).ready(function(){
	// UL = .wooTabs
	// Tab contents = .inside
	
	var tag_cloud_class = \'#tagcloud\'; 
	
	//Fix for tag clouds - unexpected height before .hide() 
	var tag_cloud_height = jQuery(\'#tagcloud\').height();
	
	jQuery(\'.inside ul li:last-child\').css(\'border-bottom\',\'0px\'); // remove last border-bottom from list in tab content
	jQuery(\'.wooTabs\').each(function(){
		jQuery(this).children(\'li\').children(\'a:first\').addClass(\'selected\'); // Add .selected class to first tab on load
	});
	jQuery(\'.inside > *\').hide();
	jQuery(\'.inside > *:first-child\').show();
	
	jQuery(\'.wooTabs li a\').click(function(evt){ // Init Click funtion on Tabs
	
		var clicked_tab_ref = jQuery(this).attr(\'href\'); // Strore Href value
		
		jQuery(this).parent().parent().children(\'li\').children(\'a\').removeClass(\'selected\'); //Remove selected from all tabs
		jQuery(this).addClass(\'selected\');
		jQuery(this).parent().parent().parent().children(\'.inside\').children(\'*\').hide();
		
		jQuery(\'.inside \' + clicked_tab_ref).fadeIn(500);
		 
		 evt.preventDefault();
	
	})
})
</script>";',
    'signature' => '775a1505a14b8c4a8d1b16c001c3449d',
    'alt_signature' => NULL,
    'rank' => 18,
    'quoted' => '\\<script type\\="text/javascript"\\>
jQuery\\(document\\)\\.ready\\(function\\(\\)\\{
	// UL \\= \\.wooTabs
	// Tab contents \\= \\.inside
	
	var tag_cloud_class \\= \'#tagcloud\'; 
	
	//Fix for tag clouds \\- unexpected height before \\.hide\\(\\) 
	var tag_cloud_height \\= jQuery\\(\'#tagcloud\'\\)\\.height\\(\\);
	
	jQuery\\(\'\\.inside ul li\\:last\\-child\'\\)\\.css\\(\'border\\-bottom\',\'0px\'\\); // remove last border\\-bottom from list in tab content
	jQuery\\(\'\\.wooTabs\'\\)\\.each\\(function\\(\\)\\{
		jQuery\\(this\\)\\.children\\(\'li\'\\)\\.children\\(\'a\\:first\'\\)\\.addClass\\(\'selected\'\\); // Add \\.selected class to first tab on load
	\\}\\);
	jQuery\\(\'\\.inside \\> \\*\'\\)\\.hide\\(\\);
	jQuery\\(\'\\.inside \\> \\*\\:first\\-child\'\\)\\.show\\(\\);
	
	jQuery\\(\'\\.wooTabs li a\'\\)\\.click\\(function\\(evt\\)\\{ // Init Click funtion on Tabs
	
		var clicked_tab_ref \\= jQuery\\(this\\)\\.attr\\(\'href\'\\); // Strore Href value
		
		jQuery\\(this\\)\\.parent\\(\\)\\.parent\\(\\)\\.children\\(\'li\'\\)\\.children\\(\'a\'\\)\\.removeClass\\(\'selected\'\\); //Remove selected from all tabs
		jQuery\\(this\\)\\.addClass\\(\'selected\'\\);
		jQuery\\(this\\)\\.parent\\(\\)\\.parent\\(\\)\\.parent\\(\\)\\.children\\(\'\\.inside\'\\)\\.children\\(\'\\*\'\\)\\.hide\\(\\);
		
		jQuery\\(\'\\.inside \' \\+ clicked_tab_ref\\)\\.fadeIn\\(500\\);
		 
		 evt\\.preventDefault\\(\\);
	
	\\}\\)
\\}\\)
\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:1074:"
jQuery(document).ready(function(){
	// UL = .wooTabs
	// Tab contents = .inside
	
	var tag_cloud_class = \'#tagcloud\'; 
	
	//Fix for tag clouds - unexpected height before .hide() 
	var tag_cloud_height = jQuery(\'#tagcloud\').height();
	
	jQuery(\'.inside ul li:last-child\').css(\'border-bottom\',\'0px\'); // remove last border-bottom from list in tab content
	jQuery(\'.wooTabs\').each(function(){
		jQuery(this).children(\'li\').children(\'a:first\').addClass(\'selected\'); // Add .selected class to first tab on load
	});
	jQuery(\'.inside > *\').hide();
	jQuery(\'.inside > *:first-child\').show();
	
	jQuery(\'.wooTabs li a\').click(function(evt){ // Init Click funtion on Tabs
	
		var clicked_tab_ref = jQuery(this).attr(\'href\'); // Strore Href value
		
		jQuery(this).parent().parent().children(\'li\').children(\'a\').removeClass(\'selected\'); //Remove selected from all tabs
		jQuery(this).addClass(\'selected\');
		jQuery(this).parent().parent().parent().children(\'.inside\').children(\'*\').hide();
		
		jQuery(\'.inside \' + clicked_tab_ref).fadeIn(500);
		 
		 evt.preventDefault();
	
	})
})
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  19 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20',
    'src_clean' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:152:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20\'></script>";',
    'signature' => '3288a1fdc5a65b7ab59ff4a93a762de1',
    'alt_signature' => NULL,
    'rank' => 19,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/contact\\-form\\-7/includes/js/jquery\\.form\\.min\\.js\\?ver\\=3\\.51\\.0\\-2014\\.06\\.20\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  20 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/contact-form-7\\/images\\/ajax-loader.gif","recaptchaEmpty":"Please verify that you are not a robot.","sending":"Sending ...","cached":"1"};
/* ]]> */
',
    'async' => 0,
    'serialized' => 's:276:"<script type=\'text/javascript\'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/contact-form-7\\/images\\/ajax-loader.gif","recaptchaEmpty":"Please verify that you are not a robot.","sending":"Sending ...","cached":"1"};
/* ]]> */
</script>";',
    'signature' => '327e87dbc10ea8d17d70c269622f79aa',
    'alt_signature' => NULL,
    'rank' => 20,
    'quoted' => '\\<script type\\=\'text/javascript\'\\>
/\\* \\<\\!\\[CDATA\\[ \\*/
var _wpcf7 \\= \\{"loaderUrl"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-content\\\\/plugins\\\\/contact\\-form\\-7\\\\/images\\\\/ajax\\-loader\\.gif","recaptchaEmpty"\\:"Please verify that you are not a robot\\.","sending"\\:"Sending \\.\\.\\.","cached"\\:"1"\\};
/\\* \\]\\]\\> \\*/
\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:236:"
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/contact-form-7\\/images\\/ajax-loader.gif","recaptchaEmpty":"Please verify that you are not a robot.","sending":"Sending ...","cached":"1"};
/* ]]> */
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  21 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.4.2',
    'src_clean' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/scripts.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:132:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.4.2\'></script>";',
    'signature' => '5077c03adffe7e0533c81501a945b560',
    'alt_signature' => NULL,
    'rank' => 21,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/contact\\-form\\-7/includes/js/scripts\\.js\\?ver\\=4\\.4\\.2\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/scripts.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  22 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
/* <![CDATA[ */
var ajax_object = {"ajax_url":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php"};
var pwLogWi_messages = {"ajax_request_fails":"Ajax request fails","ajax_unknown_error":"An unknown error occurred while trying to connect to the server.<br>Please refresh the page and try again."};
/* ]]> */
',
    'async' => 0,
    'serialized' => 's:346:"<script type=\'text/javascript\'>
/* <![CDATA[ */
var ajax_object = {"ajax_url":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php"};
var pwLogWi_messages = {"ajax_request_fails":"Ajax request fails","ajax_unknown_error":"An unknown error occurred while trying to connect to the server.<br>Please refresh the page and try again."};
/* ]]> */
</script>";',
    'signature' => '1faf91a7ea0c4f403b121cc5703ea827',
    'alt_signature' => NULL,
    'rank' => 22,
    'quoted' => '\\<script type\\=\'text/javascript\'\\>
/\\* \\<\\!\\[CDATA\\[ \\*/
var ajax_object \\= \\{"ajax_url"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-admin\\\\/admin\\-ajax\\.php"\\};
var pwLogWi_messages \\= \\{"ajax_request_fails"\\:"Ajax request fails","ajax_unknown_error"\\:"An unknown error occurred while trying to connect to the server\\.\\<br\\>Please refresh the page and try again\\."\\};
/\\* \\]\\]\\> \\*/
\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:306:"
/* <![CDATA[ */
var ajax_object = {"ajax_url":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php"};
var pwLogWi_messages = {"ajax_request_fails":"Ajax request fails","ajax_unknown_error":"An unknown error occurred while trying to connect to the server.<br>Please refresh the page and try again."};
/* ]]> */
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  23 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/pw-login-widget.js?ver=1.3.10',
    'src_clean' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/pw-login-widget.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:144:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/pw-login-widget.js?ver=1.3.10\'></script>";',
    'signature' => 'c9647dc15d3d1a1866013f375cd9e78b',
    'alt_signature' => NULL,
    'rank' => 23,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/nice\\-login\\-register\\-widget/js/pw\\-login\\-widget\\.js\\?ver\\=1\\.3\\.10\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/pw-login-widget.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  24 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/ajax-authentication.js?ver=1.3.10',
    'src_clean' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/ajax-authentication.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:148:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/ajax-authentication.js?ver=1.3.10\'></script>";',
    'signature' => 'edf0f187dd56dec2448c9cecda1fad0d',
    'alt_signature' => NULL,
    'rank' => 24,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/nice\\-login\\-register\\-widget/js/ajax\\-authentication\\.js\\?ver\\=1\\.3\\.10\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/ajax-authentication.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  25 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
/* <![CDATA[ */
var SlimStatParams = {"ajaxurl":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php","async_tracker":"false","extensions_to_track":"pdf,doc,xls,zip","outbound_classes_rel_href_to_not_track":"noslimstat,ab-item","ci":"YToxOntzOjEyOiJjb250ZW50X3R5cGUiO3M6NDoiaG9tZSI7fQ==.8ac48be035b2058f0c9e62039b49c003"};
/* ]]> */
',
    'async' => 0,
    'serialized' => 's:369:"<script type=\'text/javascript\'>
/* <![CDATA[ */
var SlimStatParams = {"ajaxurl":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php","async_tracker":"false","extensions_to_track":"pdf,doc,xls,zip","outbound_classes_rel_href_to_not_track":"noslimstat,ab-item","ci":"YToxOntzOjEyOiJjb250ZW50X3R5cGUiO3M6NDoiaG9tZSI7fQ==.8ac48be035b2058f0c9e62039b49c003"};
/* ]]> */
</script>";',
    'signature' => '316a3edbd4d48a4f38f594731ef74179',
    'alt_signature' => NULL,
    'rank' => 25,
    'quoted' => '\\<script type\\=\'text/javascript\'\\>
/\\* \\<\\!\\[CDATA\\[ \\*/
var SlimStatParams \\= \\{"ajaxurl"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-admin\\\\/admin\\-ajax\\.php","async_tracker"\\:"false","extensions_to_track"\\:"pdf,doc,xls,zip","outbound_classes_rel_href_to_not_track"\\:"noslimstat,ab\\-item","ci"\\:"YToxOntzOjEyOiJjb250ZW50X3R5cGUiO3M6NDoiaG9tZSI7fQ\\=\\=\\.8ac48be035b2058f0c9e62039b49c003"\\};
/\\* \\]\\]\\> \\*/
\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:329:"
/* <![CDATA[ */
var SlimStatParams = {"ajaxurl":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php","async_tracker":"false","extensions_to_track":"pdf,doc,xls,zip","outbound_classes_rel_href_to_not_track":"noslimstat,ab-item","ci":"YToxOntzOjEyOiJjb250ZW50X3R5cGUiO3M6NDoiaG9tZSI7fQ==.8ac48be035b2058f0c9e62039b49c003"};
/* ]]> */
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  26 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/wp-slimstat/wp-slimstat.min.js',
    'src_clean' => 'http://getchic.com/wp-content/plugins/wp-slimstat/wp-slimstat.min.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:115:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/wp-slimstat/wp-slimstat.min.js\'></script>";',
    'signature' => 'a3f2b0ed06cb666b9530be16c319575d',
    'alt_signature' => NULL,
    'rank' => 26,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/wp\\-slimstat/wp\\-slimstat\\.min\\.js\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/wp-slimstat/wp-slimstat.min.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
  27 => 
  array (
    'src' => 'http://getchic.com/wp-includes/js/wp-embed.min.js?ver=4.4.3',
    'src_clean' => 'http://getchic.com/wp-includes/js/wp-embed.min.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:106:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-includes/js/wp-embed.min.js?ver=4.4.3\'></script>";',
    'signature' => 'a1549fbed5feeefaa5bfc7c4cbb21f15',
    'alt_signature' => NULL,
    'rank' => 27,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-includes/js/wp\\-embed\\.min\\.js\\?ver\\=4\\.4\\.3\'\\>\\</script\\>',
    'library' => NULL,
    'social' => NULL,
    'advertisement' => NULL,
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-includes/js/wp-embed.min.js',
    'delay' => NULL,
    'delay_type' => NULL,
  ),
);




public static $working_script_array  = array (
  0 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
			window._wpemojiSettings = {"baseUrl":"https:\\/\\/s.w.org\\/images\\/core\\/emoji\\/72x72\\/","ext":".png","source":{"concatemoji":"http:\\/\\/getchic.com\\/wp-includes\\/js\\/wp-emoji-release.min.js?ver=4.4.3"}};
			!function(a,b,c){function d(a){var c,d,e,f=b.createElement("canvas"),g=f.getContext&&f.getContext("2d"),h=String.fromCharCode;return g&&g.fillText?(g.textBaseline="top",g.font="600 32px Arial","flag"===a?(g.fillText(h(55356,56806,55356,56826),0,0),f.toDataURL().length>3e3):"diversity"===a?(g.fillText(h(55356,57221),0,0),c=g.getImageData(16,16,1,1).data,g.fillText(h(55356,57221,55356,57343),0,0),c=g.getImageData(16,16,1,1).data,e=c[0]+","+c[1]+","+c[2]+","+c[3],d!==e):("simple"===a?g.fillText(h(55357,56835),0,0):g.fillText(h(55356,57135),0,0),0!==g.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		',
    'async' => 0,
    'serialized' => 's:1599:"<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\\/\\/s.w.org\\/images\\/core\\/emoji\\/72x72\\/","ext":".png","source":{"concatemoji":"http:\\/\\/getchic.com\\/wp-includes\\/js\\/wp-emoji-release.min.js?ver=4.4.3"}};
			!function(a,b,c){function d(a){var c,d,e,f=b.createElement("canvas"),g=f.getContext&&f.getContext("2d"),h=String.fromCharCode;return g&&g.fillText?(g.textBaseline="top",g.font="600 32px Arial","flag"===a?(g.fillText(h(55356,56806,55356,56826),0,0),f.toDataURL().length>3e3):"diversity"===a?(g.fillText(h(55356,57221),0,0),c=g.getImageData(16,16,1,1).data,g.fillText(h(55356,57221,55356,57343),0,0),c=g.getImageData(16,16,1,1).data,e=c[0]+","+c[1]+","+c[2]+","+c[3],d!==e):("simple"===a?g.fillText(h(55357,56835),0,0):g.fillText(h(55356,57135),0,0),0!==g.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>";',
    'signature' => 'b49284e5559c58436a0a7cd62cc96316',
    'alt_signature' => NULL,
    'rank' => 0,
    'quoted' => '\\<script type\\="text/javascript"\\>
			window\\._wpemojiSettings \\= \\{"baseUrl"\\:"https\\:\\\\/\\\\/s\\.w\\.org\\\\/images\\\\/core\\\\/emoji\\\\/72x72\\\\/","ext"\\:"\\.png","source"\\:\\{"concatemoji"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-includes\\\\/js\\\\/wp\\-emoji\\-release\\.min\\.js\\?ver\\=4\\.4\\.3"\\}\\};
			\\!function\\(a,b,c\\)\\{function d\\(a\\)\\{var c,d,e,f\\=b\\.createElement\\("canvas"\\),g\\=f\\.getContext&&f\\.getContext\\("2d"\\),h\\=String\\.fromCharCode;return g&&g\\.fillText\\?\\(g\\.textBaseline\\="top",g\\.font\\="600 32px Arial","flag"\\=\\=\\=a\\?\\(g\\.fillText\\(h\\(55356,56806,55356,56826\\),0,0\\),f\\.toDataURL\\(\\)\\.length\\>3e3\\)\\:"diversity"\\=\\=\\=a\\?\\(g\\.fillText\\(h\\(55356,57221\\),0,0\\),c\\=g\\.getImageData\\(16,16,1,1\\)\\.data,g\\.fillText\\(h\\(55356,57221,55356,57343\\),0,0\\),c\\=g\\.getImageData\\(16,16,1,1\\)\\.data,e\\=c\\[0\\]\\+","\\+c\\[1\\]\\+","\\+c\\[2\\]\\+","\\+c\\[3\\],d\\!\\=\\=e\\)\\:\\("simple"\\=\\=\\=a\\?g\\.fillText\\(h\\(55357,56835\\),0,0\\)\\:g\\.fillText\\(h\\(55356,57135\\),0,0\\),0\\!\\=\\=g\\.getImageData\\(16,16,1,1\\)\\.data\\[0\\]\\)\\)\\:\\!1\\}function e\\(a\\)\\{var c\\=b\\.createElement\\("script"\\);c\\.src\\=a,c\\.type\\="text/javascript",b\\.getElementsByTagName\\("head"\\)\\[0\\]\\.appendChild\\(c\\)\\}var f,g;c\\.supports\\=\\{simple\\:d\\("simple"\\),flag\\:d\\("flag"\\),unicode8\\:d\\("unicode8"\\),diversity\\:d\\("diversity"\\)\\},c\\.DOMReady\\=\\!1,c\\.readyCallback\\=function\\(\\)\\{c\\.DOMReady\\=\\!0\\},c\\.supports\\.simple&&c\\.supports\\.flag&&c\\.supports\\.unicode8&&c\\.supports\\.diversity\\|\\|\\(g\\=function\\(\\)\\{c\\.readyCallback\\(\\)\\},b\\.addEventListener\\?\\(b\\.addEventListener\\("DOMContentLoaded",g,\\!1\\),a\\.addEventListener\\("load",g,\\!1\\)\\)\\:\\(a\\.attachEvent\\("onload",g\\),b\\.attachEvent\\("onreadystatechange",function\\(\\)\\{"complete"\\=\\=\\=b\\.readyState&&c\\.readyCallback\\(\\)\\}\\)\\),f\\=c\\.source\\|\\|\\{\\},f\\.concatemoji\\?e\\(f\\.concatemoji\\)\\:f\\.wpemoji&&f\\.twemoji&&\\(e\\(f\\.twemoji\\),e\\(f\\.wpemoji\\)\\)\\)\\}\\(window,document,window\\._wpemojiSettings\\);
		\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:1559:"
			window._wpemojiSettings = {"baseUrl":"https:\\/\\/s.w.org\\/images\\/core\\/emoji\\/72x72\\/","ext":".png","source":{"concatemoji":"http:\\/\\/getchic.com\\/wp-includes\\/js\\/wp-emoji-release.min.js?ver=4.4.3"}};
			!function(a,b,c){function d(a){var c,d,e,f=b.createElement("canvas"),g=f.getContext&&f.getContext("2d"),h=String.fromCharCode;return g&&g.fillText?(g.textBaseline="top",g.font="600 32px Arial","flag"===a?(g.fillText(h(55356,56806,55356,56826),0,0),f.toDataURL().length>3e3):"diversity"===a?(g.fillText(h(55356,57221),0,0),c=g.getImageData(16,16,1,1).data,g.fillText(h(55356,57221,55356,57343),0,0),c=g.getImageData(16,16,1,1).data,e=c[0]+","+c[1]+","+c[2]+","+c[3],d!==e):("simple"===a?g.fillText(h(55357,56835),0,0):g.fillText(h(55356,57135),0,0),0!==g.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  1 => 
  array (
    'src' => 'http://getchic.com/wp-includes/js/jquery/jquery.js?ver=1.11.3',
    'src_clean' => 'http://getchic.com/wp-includes/js/jquery/jquery.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:108:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-includes/js/jquery/jquery.js?ver=1.11.3\'></script>";',
    'signature' => 'b0446bf6ab5f5d24cc9651089c45b05a',
    'alt_signature' => NULL,
    'rank' => 1,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-includes/js/jquery/jquery\\.js\\?ver\\=1\\.11\\.3\'\\>\\</script\\>',
    'library' => '1',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-includes/js/jquery/jquery.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  2 => 
  array (
    'src' => 'http://getchic.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1',
    'src_clean' => 'http://getchic.com/wp-includes/js/jquery/jquery-migrate.min.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:119:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1\'></script>";',
    'signature' => '359223032d667ed556c98c1fe9393bbe',
    'alt_signature' => NULL,
    'rank' => 2,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-includes/js/jquery/jquery\\-migrate\\.min\\.js\\?ver\\=1\\.2\\.1\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-includes/js/jquery/jquery-migrate.min.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  3 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/tubepress/src/main/web/js/tubepress.js?ver=4.4.3',
    'src_clean' => 'http://getchic.com/wp-content/plugins/tubepress/src/main/web/js/tubepress.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:133:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/tubepress/src/main/web/js/tubepress.js?ver=4.4.3\'></script>";',
    'signature' => '0ae239871c96a761d11138d8a6f07d41',
    'alt_signature' => NULL,
    'rank' => 3,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/tubepress/src/main/web/js/tubepress\\.js\\?ver\\=4\\.4\\.3\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/tubepress/src/main/web/js/tubepress.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  4 => 
  array (
    'src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/scripts.js?ver=4.4.3',
    'src_clean' => 'http://getchic.com/wp-content/themes/gazette/includes/js/scripts.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:124:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/themes/gazette/includes/js/scripts.js?ver=4.4.3\'></script>";',
    'signature' => '9e390946e467fde81cd2fe769b357881',
    'alt_signature' => NULL,
    'rank' => 4,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/themes/gazette/includes/js/scripts\\.js\\?ver\\=4\\.4\\.3\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/scripts.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  5 => 
  array (
    'src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/wooslider.js?ver=4.4.3',
    'src_clean' => 'http://getchic.com/wp-content/themes/gazette/includes/js/wooslider.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:126:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/themes/gazette/includes/js/wooslider.js?ver=4.4.3\'></script>";',
    'signature' => 'b1c014fe510257ae2303b3f00dbf44f9',
    'alt_signature' => NULL,
    'rank' => 5,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/themes/gazette/includes/js/wooslider\\.js\\?ver\\=4\\.4\\.3\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/wooslider.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  6 => 
  array (
    'src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/superfish.js?ver=4.4.3',
    'src_clean' => 'http://getchic.com/wp-content/themes/gazette/includes/js/superfish.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:126:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/themes/gazette/includes/js/superfish.js?ver=4.4.3\'></script>";',
    'signature' => '6c580e8943a3a9eca6f6efbd14475e38',
    'alt_signature' => NULL,
    'rank' => 6,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/themes/gazette/includes/js/superfish\\.js\\?ver\\=4\\.4\\.3\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/themes/gazette/includes/js/superfish.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  8 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => 'var TubePressJsConfig = {"urls":{"base":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/tubepress","usr":"http:\\/\\/getchic.com\\/wp-content\\/tubepress-content"}};',
    'async' => 0,
    'serialized' => 's:197:"<script type="text/javascript">var TubePressJsConfig = {"urls":{"base":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/tubepress","usr":"http:\\/\\/getchic.com\\/wp-content\\/tubepress-content"}};</script>";',
    'signature' => '106112f3e86853d232880c21e3051431',
    'alt_signature' => NULL,
    'rank' => 8,
    'quoted' => '\\<script type\\="text/javascript"\\>var TubePressJsConfig \\= \\{"urls"\\:\\{"base"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-content\\\\/plugins\\\\/tubepress","usr"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-content\\\\/tubepress\\-content"\\}\\};\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:157:"var TubePressJsConfig = {"urls":{"base":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/tubepress","usr":"http:\\/\\/getchic.com\\/wp-content\\/tubepress-content"}};";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  9 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
		jQuery(document).ready(function(){
	    	jQuery(\'#wooslider\').wooslider(
	    		    	{
	   		sfade : false, // Slide Fade
			cfade : false, // content Fade
			offset : 20, // Padding offset
			speed: 700,
			timeout: 6000,
			content_speed: 1000			}
						);
		});
	',
    'async' => 0,
    'serialized' => 's:321:"<script type="text/javascript">
		jQuery(document).ready(function(){
	    	jQuery(\'#wooslider\').wooslider(
	    		    	{
	   		sfade : false, // Slide Fade
			cfade : false, // content Fade
			offset : 20, // Padding offset
			speed: 700,
			timeout: 6000,
			content_speed: 1000			}
						);
		});
	</script>";',
    'signature' => 'd7109fd6520d38ac9ac4f12a3a89fb47',
    'alt_signature' => NULL,
    'rank' => 9,
    'quoted' => '\\<script type\\="text/javascript"\\>
		jQuery\\(document\\)\\.ready\\(function\\(\\)\\{
	    	jQuery\\(\'#wooslider\'\\)\\.wooslider\\(
	    		    	\\{
	   		sfade \\: false, // Slide Fade
			cfade \\: false, // content Fade
			offset \\: 20, // Padding offset
			speed\\: 700,
			timeout\\: 6000,
			content_speed\\: 1000			\\}
						\\);
		\\}\\);
	\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:281:"
		jQuery(document).ready(function(){
	    	jQuery(\'#wooslider\').wooslider(
	    		    	{
	   		sfade : false, // Slide Fade
			cfade : false, // content Fade
			offset : 20, // Padding offset
			speed: 700,
			timeout: 6000,
			content_speed: 1000			}
						);
		});
	";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  18 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
jQuery(document).ready(function(){
	// UL = .wooTabs
	// Tab contents = .inside
	
	var tag_cloud_class = \'#tagcloud\'; 
	
	//Fix for tag clouds - unexpected height before .hide() 
	var tag_cloud_height = jQuery(\'#tagcloud\').height();
	
	jQuery(\'.inside ul li:last-child\').css(\'border-bottom\',\'0px\'); // remove last border-bottom from list in tab content
	jQuery(\'.wooTabs\').each(function(){
		jQuery(this).children(\'li\').children(\'a:first\').addClass(\'selected\'); // Add .selected class to first tab on load
	});
	jQuery(\'.inside > *\').hide();
	jQuery(\'.inside > *:first-child\').show();
	
	jQuery(\'.wooTabs li a\').click(function(evt){ // Init Click funtion on Tabs
	
		var clicked_tab_ref = jQuery(this).attr(\'href\'); // Strore Href value
		
		jQuery(this).parent().parent().children(\'li\').children(\'a\').removeClass(\'selected\'); //Remove selected from all tabs
		jQuery(this).addClass(\'selected\');
		jQuery(this).parent().parent().parent().children(\'.inside\').children(\'*\').hide();
		
		jQuery(\'.inside \' + clicked_tab_ref).fadeIn(500);
		 
		 evt.preventDefault();
	
	})
})
',
    'async' => 0,
    'serialized' => 's:1114:"<script type="text/javascript">
jQuery(document).ready(function(){
	// UL = .wooTabs
	// Tab contents = .inside
	
	var tag_cloud_class = \'#tagcloud\'; 
	
	//Fix for tag clouds - unexpected height before .hide() 
	var tag_cloud_height = jQuery(\'#tagcloud\').height();
	
	jQuery(\'.inside ul li:last-child\').css(\'border-bottom\',\'0px\'); // remove last border-bottom from list in tab content
	jQuery(\'.wooTabs\').each(function(){
		jQuery(this).children(\'li\').children(\'a:first\').addClass(\'selected\'); // Add .selected class to first tab on load
	});
	jQuery(\'.inside > *\').hide();
	jQuery(\'.inside > *:first-child\').show();
	
	jQuery(\'.wooTabs li a\').click(function(evt){ // Init Click funtion on Tabs
	
		var clicked_tab_ref = jQuery(this).attr(\'href\'); // Strore Href value
		
		jQuery(this).parent().parent().children(\'li\').children(\'a\').removeClass(\'selected\'); //Remove selected from all tabs
		jQuery(this).addClass(\'selected\');
		jQuery(this).parent().parent().parent().children(\'.inside\').children(\'*\').hide();
		
		jQuery(\'.inside \' + clicked_tab_ref).fadeIn(500);
		 
		 evt.preventDefault();
	
	})
})
</script>";',
    'signature' => '775a1505a14b8c4a8d1b16c001c3449d',
    'alt_signature' => NULL,
    'rank' => 18,
    'quoted' => '\\<script type\\="text/javascript"\\>
jQuery\\(document\\)\\.ready\\(function\\(\\)\\{
	// UL \\= \\.wooTabs
	// Tab contents \\= \\.inside
	
	var tag_cloud_class \\= \'#tagcloud\'; 
	
	//Fix for tag clouds \\- unexpected height before \\.hide\\(\\) 
	var tag_cloud_height \\= jQuery\\(\'#tagcloud\'\\)\\.height\\(\\);
	
	jQuery\\(\'\\.inside ul li\\:last\\-child\'\\)\\.css\\(\'border\\-bottom\',\'0px\'\\); // remove last border\\-bottom from list in tab content
	jQuery\\(\'\\.wooTabs\'\\)\\.each\\(function\\(\\)\\{
		jQuery\\(this\\)\\.children\\(\'li\'\\)\\.children\\(\'a\\:first\'\\)\\.addClass\\(\'selected\'\\); // Add \\.selected class to first tab on load
	\\}\\);
	jQuery\\(\'\\.inside \\> \\*\'\\)\\.hide\\(\\);
	jQuery\\(\'\\.inside \\> \\*\\:first\\-child\'\\)\\.show\\(\\);
	
	jQuery\\(\'\\.wooTabs li a\'\\)\\.click\\(function\\(evt\\)\\{ // Init Click funtion on Tabs
	
		var clicked_tab_ref \\= jQuery\\(this\\)\\.attr\\(\'href\'\\); // Strore Href value
		
		jQuery\\(this\\)\\.parent\\(\\)\\.parent\\(\\)\\.children\\(\'li\'\\)\\.children\\(\'a\'\\)\\.removeClass\\(\'selected\'\\); //Remove selected from all tabs
		jQuery\\(this\\)\\.addClass\\(\'selected\'\\);
		jQuery\\(this\\)\\.parent\\(\\)\\.parent\\(\\)\\.parent\\(\\)\\.children\\(\'\\.inside\'\\)\\.children\\(\'\\*\'\\)\\.hide\\(\\);
		
		jQuery\\(\'\\.inside \' \\+ clicked_tab_ref\\)\\.fadeIn\\(500\\);
		 
		 evt\\.preventDefault\\(\\);
	
	\\}\\)
\\}\\)
\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:1074:"
jQuery(document).ready(function(){
	// UL = .wooTabs
	// Tab contents = .inside
	
	var tag_cloud_class = \'#tagcloud\'; 
	
	//Fix for tag clouds - unexpected height before .hide() 
	var tag_cloud_height = jQuery(\'#tagcloud\').height();
	
	jQuery(\'.inside ul li:last-child\').css(\'border-bottom\',\'0px\'); // remove last border-bottom from list in tab content
	jQuery(\'.wooTabs\').each(function(){
		jQuery(this).children(\'li\').children(\'a:first\').addClass(\'selected\'); // Add .selected class to first tab on load
	});
	jQuery(\'.inside > *\').hide();
	jQuery(\'.inside > *:first-child\').show();
	
	jQuery(\'.wooTabs li a\').click(function(evt){ // Init Click funtion on Tabs
	
		var clicked_tab_ref = jQuery(this).attr(\'href\'); // Strore Href value
		
		jQuery(this).parent().parent().children(\'li\').children(\'a\').removeClass(\'selected\'); //Remove selected from all tabs
		jQuery(this).addClass(\'selected\');
		jQuery(this).parent().parent().parent().children(\'.inside\').children(\'*\').hide();
		
		jQuery(\'.inside \' + clicked_tab_ref).fadeIn(500);
		 
		 evt.preventDefault();
	
	})
})
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  19 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20',
    'src_clean' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:152:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20\'></script>";',
    'signature' => '3288a1fdc5a65b7ab59ff4a93a762de1',
    'alt_signature' => NULL,
    'rank' => 19,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/contact\\-form\\-7/includes/js/jquery\\.form\\.min\\.js\\?ver\\=3\\.51\\.0\\-2014\\.06\\.20\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  20 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/contact-form-7\\/images\\/ajax-loader.gif","recaptchaEmpty":"Please verify that you are not a robot.","sending":"Sending ...","cached":"1"};
/* ]]> */
',
    'async' => 0,
    'serialized' => 's:276:"<script type=\'text/javascript\'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/contact-form-7\\/images\\/ajax-loader.gif","recaptchaEmpty":"Please verify that you are not a robot.","sending":"Sending ...","cached":"1"};
/* ]]> */
</script>";',
    'signature' => '327e87dbc10ea8d17d70c269622f79aa',
    'alt_signature' => NULL,
    'rank' => 20,
    'quoted' => '\\<script type\\=\'text/javascript\'\\>
/\\* \\<\\!\\[CDATA\\[ \\*/
var _wpcf7 \\= \\{"loaderUrl"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-content\\\\/plugins\\\\/contact\\-form\\-7\\\\/images\\\\/ajax\\-loader\\.gif","recaptchaEmpty"\\:"Please verify that you are not a robot\\.","sending"\\:"Sending \\.\\.\\.","cached"\\:"1"\\};
/\\* \\]\\]\\> \\*/
\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:236:"
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\\/\\/getchic.com\\/wp-content\\/plugins\\/contact-form-7\\/images\\/ajax-loader.gif","recaptchaEmpty":"Please verify that you are not a robot.","sending":"Sending ...","cached":"1"};
/* ]]> */
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  21 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.4.2',
    'src_clean' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/scripts.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:132:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.4.2\'></script>";',
    'signature' => '5077c03adffe7e0533c81501a945b560',
    'alt_signature' => NULL,
    'rank' => 21,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/contact\\-form\\-7/includes/js/scripts\\.js\\?ver\\=4\\.4\\.2\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/contact-form-7/includes/js/scripts.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  22 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
/* <![CDATA[ */
var ajax_object = {"ajax_url":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php"};
var pwLogWi_messages = {"ajax_request_fails":"Ajax request fails","ajax_unknown_error":"An unknown error occurred while trying to connect to the server.<br>Please refresh the page and try again."};
/* ]]> */
',
    'async' => 0,
    'serialized' => 's:346:"<script type=\'text/javascript\'>
/* <![CDATA[ */
var ajax_object = {"ajax_url":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php"};
var pwLogWi_messages = {"ajax_request_fails":"Ajax request fails","ajax_unknown_error":"An unknown error occurred while trying to connect to the server.<br>Please refresh the page and try again."};
/* ]]> */
</script>";',
    'signature' => '1faf91a7ea0c4f403b121cc5703ea827',
    'alt_signature' => NULL,
    'rank' => 22,
    'quoted' => '\\<script type\\=\'text/javascript\'\\>
/\\* \\<\\!\\[CDATA\\[ \\*/
var ajax_object \\= \\{"ajax_url"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-admin\\\\/admin\\-ajax\\.php"\\};
var pwLogWi_messages \\= \\{"ajax_request_fails"\\:"Ajax request fails","ajax_unknown_error"\\:"An unknown error occurred while trying to connect to the server\\.\\<br\\>Please refresh the page and try again\\."\\};
/\\* \\]\\]\\> \\*/
\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:306:"
/* <![CDATA[ */
var ajax_object = {"ajax_url":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php"};
var pwLogWi_messages = {"ajax_request_fails":"Ajax request fails","ajax_unknown_error":"An unknown error occurred while trying to connect to the server.<br>Please refresh the page and try again."};
/* ]]> */
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  23 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/pw-login-widget.js?ver=1.3.10',
    'src_clean' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/pw-login-widget.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:144:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/pw-login-widget.js?ver=1.3.10\'></script>";',
    'signature' => 'c9647dc15d3d1a1866013f375cd9e78b',
    'alt_signature' => NULL,
    'rank' => 23,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/nice\\-login\\-register\\-widget/js/pw\\-login\\-widget\\.js\\?ver\\=1\\.3\\.10\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/pw-login-widget.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  24 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/ajax-authentication.js?ver=1.3.10',
    'src_clean' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/ajax-authentication.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:148:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/ajax-authentication.js?ver=1.3.10\'></script>";',
    'signature' => 'edf0f187dd56dec2448c9cecda1fad0d',
    'alt_signature' => NULL,
    'rank' => 24,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/nice\\-login\\-register\\-widget/js/ajax\\-authentication\\.js\\?ver\\=1\\.3\\.10\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/nice-login-register-widget/js/ajax-authentication.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  25 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
/* <![CDATA[ */
var SlimStatParams = {"ajaxurl":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php","async_tracker":"false","extensions_to_track":"pdf,doc,xls,zip","outbound_classes_rel_href_to_not_track":"noslimstat,ab-item","ci":"YToxOntzOjEyOiJjb250ZW50X3R5cGUiO3M6NDoiaG9tZSI7fQ==.8ac48be035b2058f0c9e62039b49c003"};
/* ]]> */
',
    'async' => 0,
    'serialized' => 's:369:"<script type=\'text/javascript\'>
/* <![CDATA[ */
var SlimStatParams = {"ajaxurl":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php","async_tracker":"false","extensions_to_track":"pdf,doc,xls,zip","outbound_classes_rel_href_to_not_track":"noslimstat,ab-item","ci":"YToxOntzOjEyOiJjb250ZW50X3R5cGUiO3M6NDoiaG9tZSI7fQ==.8ac48be035b2058f0c9e62039b49c003"};
/* ]]> */
</script>";',
    'signature' => '316a3edbd4d48a4f38f594731ef74179',
    'alt_signature' => NULL,
    'rank' => 25,
    'quoted' => '\\<script type\\=\'text/javascript\'\\>
/\\* \\<\\!\\[CDATA\\[ \\*/
var SlimStatParams \\= \\{"ajaxurl"\\:"http\\:\\\\/\\\\/getchic\\.com\\\\/wp\\-admin\\\\/admin\\-ajax\\.php","async_tracker"\\:"false","extensions_to_track"\\:"pdf,doc,xls,zip","outbound_classes_rel_href_to_not_track"\\:"noslimstat,ab\\-item","ci"\\:"YToxOntzOjEyOiJjb250ZW50X3R5cGUiO3M6NDoiaG9tZSI7fQ\\=\\=\\.8ac48be035b2058f0c9e62039b49c003"\\};
/\\* \\]\\]\\> \\*/
\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:329:"
/* <![CDATA[ */
var SlimStatParams = {"ajaxurl":"http:\\/\\/getchic.com\\/wp-admin\\/admin-ajax.php","async_tracker":"false","extensions_to_track":"pdf,doc,xls,zip","outbound_classes_rel_href_to_not_track":"noslimstat,ab-item","ci":"YToxOntzOjEyOiJjb250ZW50X3R5cGUiO3M6NDoiaG9tZSI7fQ==.8ac48be035b2058f0c9e62039b49c003"};
/* ]]> */
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  26 => 
  array (
    'src' => 'http://getchic.com/wp-content/plugins/wp-slimstat/wp-slimstat.min.js',
    'src_clean' => 'http://getchic.com/wp-content/plugins/wp-slimstat/wp-slimstat.min.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:115:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-content/plugins/wp-slimstat/wp-slimstat.min.js\'></script>";',
    'signature' => 'a3f2b0ed06cb666b9530be16c319575d',
    'alt_signature' => NULL,
    'rank' => 26,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-content/plugins/wp\\-slimstat/wp\\-slimstat\\.min\\.js\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-content/plugins/wp-slimstat/wp-slimstat.min.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
  27 => 
  array (
    'src' => 'http://getchic.com/wp-includes/js/wp-embed.min.js?ver=4.4.3',
    'src_clean' => 'http://getchic.com/wp-includes/js/wp-embed.min.js',
    'code' => '',
    'async' => 0,
    'serialized' => 's:106:"<script type=\'text/javascript\' src=\'http://getchic.com/wp-includes/js/wp-embed.min.js?ver=4.4.3\'></script>";',
    'signature' => 'a1549fbed5feeefaa5bfc7c4cbb21f15',
    'alt_signature' => NULL,
    'rank' => 27,
    'quoted' => '\\<script type\\=\'text/javascript\' src\\=\'http\\://getchic\\.com/wp\\-includes/js/wp\\-embed\\.min\\.js\\?ver\\=4\\.4\\.3\'\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => true,
    'absolute_src' => 'http://getchic.com/wp-includes/js/wp-embed.min.js',
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
  ),
);




public static $duplicates  = array (
  12 => 
  array (
    'src' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
    'src_clean' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
    'code' => '',
    'async' => 1,
    'serialized' => 's:86:"<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>";',
    'signature' => 'c116846213901825b89e2e66c65472f5',
    'alt_signature' => NULL,
    'rank' => 12,
    'quoted' => '\\<script async src\\="//pagead2\\.googlesyndication\\.com/pagead/js/adsbygoogle\\.js"\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => false,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
    'duplicate' => true,
  ),
  13 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
(adsbygoogle = window.adsbygoogle || []).push({});
',
    'async' => 0,
    'serialized' => 's:71:"<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>";',
    'signature' => '017521f0a82e88d253482dd54c8f9370',
    'alt_signature' => NULL,
    'rank' => 13,
    'quoted' => '\\<script\\>
\\(adsbygoogle \\= window\\.adsbygoogle \\|\\| \\[\\]\\)\\.push\\(\\{\\}\\);
\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:54:"
(adsbygoogle = window.adsbygoogle || []).push({});
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
    'duplicate' => true,
  ),
  14 => 
  array (
    'src' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
    'src_clean' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
    'code' => '',
    'async' => 1,
    'serialized' => 's:86:"<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>";',
    'signature' => 'c116846213901825b89e2e66c65472f5',
    'alt_signature' => NULL,
    'rank' => 14,
    'quoted' => '\\<script async src\\="//pagead2\\.googlesyndication\\.com/pagead/js/adsbygoogle\\.js"\\>\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => NULL,
    'internal' => false,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
    'duplicate' => true,
  ),
  15 => 
  array (
    'src' => '',
    'src_clean' => NULL,
    'code' => '
(adsbygoogle = window.adsbygoogle || []).push({});
',
    'async' => 0,
    'serialized' => 's:71:"<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>";',
    'signature' => '017521f0a82e88d253482dd54c8f9370',
    'alt_signature' => NULL,
    'rank' => 15,
    'quoted' => '\\<script\\>
\\(adsbygoogle \\= window\\.adsbygoogle \\|\\| \\[\\]\\)\\.push\\(\\{\\}\\);
\\</script\\>',
    'library' => '0',
    'social' => '0',
    'advertisement' => '0',
    'loadsection' => 0,
    'preceedence' => true,
    'serialized_code' => 's:54:"
(adsbygoogle = window.adsbygoogle || []).push({});
";',
    'internal' => NULL,
    'absolute_src' => NULL,
    'delay' => '0',
    'delay_type' => 'mousemove',
    'promises' => '0',
    'mau' => '0',
    'cdnalias' => '0',
    'ignore' => '0',
    'cdn_url' => NULL,
    'duplicate' => true,
  ),
);




public static $delayed  = array (
  'onload' => 
  array (
    'items' => 
    array (
      7 => 
      array (
        'src' => '',
        'src_clean' => NULL,
        'code' => '
var _gaq = _gaq || [];
_gaq.push([\'_setAccount\', \'UA-42367960-1\']);
_gaq.push([\'_trackPageview\']);
(function() {
var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
})();
',
        'async' => 0,
        'serialized' => 's:449:"<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push([\'_setAccount\', \'UA-42367960-1\']);
_gaq.push([\'_trackPageview\']);
(function() {
var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>";',
        'signature' => 'afdc5748586a76153f63324c9257bc37',
        'alt_signature' => NULL,
        'rank' => 7,
        'quoted' => '\\<script type\\="text/javascript"\\>
var _gaq \\= _gaq \\|\\| \\[\\];
_gaq\\.push\\(\\[\'_setAccount\', \'UA\\-42367960\\-1\'\\]\\);
_gaq\\.push\\(\\[\'_trackPageview\'\\]\\);
\\(function\\(\\) \\{
var ga \\= document\\.createElement\\(\'script\'\\); ga\\.type \\= \'text/javascript\'; ga\\.async \\= true;
ga\\.src \\= \\(\'https\\:\' \\=\\= document\\.location\\.protocol \\? \'https\\://ssl\' \\: \'http\\://www\'\\) \\+ \'\\.google\\-analytics\\.com/ga\\.js\';
var s \\= document\\.getElementsByTagName\\(\'script\'\\)\\[0\\]; s\\.parentNode\\.insertBefore\\(ga, s\\);
\\}\\)\\(\\);
\\</script\\>',
        'library' => '0',
        'social' => '0',
        'advertisement' => '0',
        'loadsection' => 0,
        'preceedence' => true,
        'serialized_code' => 's:409:"
var _gaq = _gaq || [];
_gaq.push([\'_setAccount\', \'UA-42367960-1\']);
_gaq.push([\'_trackPageview\']);
(function() {
var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
})();
";',
        'internal' => NULL,
        'absolute_src' => NULL,
        'delay' => '1',
        'delay_type' => 'onload',
        'promises' => '0',
        'mau' => '0',
        'cdnalias' => '0',
        'ignore' => '0',
        'cdn_url' => NULL,
        'ident' => '_gaq',
      ),
      10 => 
      array (
        'src' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
        'src_clean' => '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
        'code' => '',
        'async' => 1,
        'serialized' => 's:86:"<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>";',
        'signature' => 'c116846213901825b89e2e66c65472f5',
        'alt_signature' => NULL,
        'rank' => 10,
        'quoted' => '\\<script async src\\="//pagead2\\.googlesyndication\\.com/pagead/js/adsbygoogle\\.js"\\>\\</script\\>',
        'library' => '0',
        'social' => '0',
        'advertisement' => '0',
        'loadsection' => 0,
        'preceedence' => true,
        'serialized_code' => NULL,
        'internal' => false,
        'absolute_src' => NULL,
        'delay' => '1',
        'delay_type' => 'onload',
        'promises' => '0',
        'mau' => '0',
        'cdnalias' => '0',
        'ignore' => '0',
        'cdn_url' => NULL,
        'ident' => 'adsbygoogle',
      ),
    ),
  ),
  'scroll' => 
  array (
    'items' => 
    array (
      16 => 
      array (
        'src' => '',
        'src_clean' => NULL,
        'code' => '(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=161465360652229";
fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));',
        'async' => 0,
        'serialized' => 's:317:"<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=161465360652229";
fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>";',
        'signature' => '8b514003e467d363b90858845efcfb1c',
        'alt_signature' => NULL,
        'rank' => 16,
        'quoted' => '\\<script\\>\\(function\\(d, s, id\\) \\{
var js, fjs \\= d\\.getElementsByTagName\\(s\\)\\[0\\];
if \\(d\\.getElementById\\(id\\)\\) return;
js \\= d\\.createElement\\(s\\); js\\.id \\= id;
js\\.src \\= "//connect\\.facebook\\.net/en_US/all\\.js#xfbml\\=1&appId\\=161465360652229";
fjs\\.parentNode\\.insertBefore\\(js, fjs\\);
\\}\\(document, \'script\', \'facebook\\-jssdk\'\\)\\);\\</script\\>',
        'library' => '0',
        'social' => '0',
        'advertisement' => '0',
        'loadsection' => 0,
        'preceedence' => true,
        'serialized_code' => 's:300:"(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=161465360652229";
fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));";',
        'internal' => NULL,
        'absolute_src' => NULL,
        'delay' => '1',
        'delay_type' => 'scroll',
        'promises' => '0',
        'mau' => '0',
        'cdnalias' => '0',
        'ignore' => '0',
        'cdn_url' => NULL,
      ),
      17 => 
      array (
        'src' => '',
        'src_clean' => NULL,
        'code' => '
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId  : \'\',
	      status : true,
	      cookie : true,
	      xfbml  : true
	    });
	  };

	  (function() {
	    var e = document.createElement(\'script\');
	    e.src = document.location.protocol + \'//connect.facebook.net/en_US/all.js\';
	    e.async = true;
	    document.getElementById(\'fb-root\').appendChild(e);
	  }());
	',
        'async' => 0,
        'serialized' => 's:403:"<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId  : \'\',
	      status : true,
	      cookie : true,
	      xfbml  : true
	    });
	  };

	  (function() {
	    var e = document.createElement(\'script\');
	    e.src = document.location.protocol + \'//connect.facebook.net/en_US/all.js\';
	    e.async = true;
	    document.getElementById(\'fb-root\').appendChild(e);
	  }());
	</script>";',
        'signature' => '06455011705f76618661a8280cbfeb08',
        'alt_signature' => NULL,
        'rank' => 17,
        'quoted' => '\\<script\\>
	  window\\.fbAsyncInit \\= function\\(\\) \\{
	    FB\\.init\\(\\{
	      appId  \\: \'\',
	      status \\: true,
	      cookie \\: true,
	      xfbml  \\: true
	    \\}\\);
	  \\};

	  \\(function\\(\\) \\{
	    var e \\= document\\.createElement\\(\'script\'\\);
	    e\\.src \\= document\\.location\\.protocol \\+ \'//connect\\.facebook\\.net/en_US/all\\.js\';
	    e\\.async \\= true;
	    document\\.getElementById\\(\'fb\\-root\'\\)\\.appendChild\\(e\\);
	  \\}\\(\\)\\);
	\\</script\\>',
        'library' => '0',
        'social' => '0',
        'advertisement' => '0',
        'loadsection' => 0,
        'preceedence' => true,
        'serialized_code' => 's:386:"
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId  : \'\',
	      status : true,
	      cookie : true,
	      xfbml  : true
	    });
	  };

	  (function() {
	    var e = document.createElement(\'script\');
	    e.src = document.location.protocol + \'//connect.facebook.net/en_US/all.js\';
	    e.async = true;
	    document.getElementById(\'fb-root\').appendChild(e);
	  }());
	";',
        'internal' => NULL,
        'absolute_src' => NULL,
        'delay' => '1',
        'delay_type' => 'scroll',
        'promises' => '0',
        'mau' => '0',
        'cdnalias' => '0',
        'ignore' => '0',
        'cdn_url' => NULL,
      ),
    ),
  ),
);


        }