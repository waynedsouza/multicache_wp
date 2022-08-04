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





class MulticacheStorageHelper


{





    public $group = '';





    public $size = 0;





    public $count = 0;





    public function __construct($group)


    {





        $this->group = $group;


    


    }





    public function updateSize($size)


    {





        $this->size = number_format($this->size + $size, 2, __('DECIMALS_SEPARATOR'), __('THOUSANDS_SEPARATOR'));


        $this->count ++;


    


    }





}