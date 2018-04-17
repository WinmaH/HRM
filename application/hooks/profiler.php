<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 4/7/2018
 * Time: 9:38 AM
 */
function profiler_hook(){
    //if($_SERVER['REMOTE_ADDR']== '127.0.0.1'){
    $CI =& get_instance();
    $CI->output->enable_profiler(TRUE);
    //}
}
