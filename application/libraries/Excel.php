<?php if( ! defined('BASEPATH')) exit ('No direct access allowed');

require_once APPPATH."/third_party/PHPExcel.php";

Class Excel extends PHPExcel{
    public function __construct()
    {       parent::__construct();
    }
}