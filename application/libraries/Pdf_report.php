<?php
require_once dirname(__FILE__).'/tcpdf/tcpdf.php';

class Pdf_report extends TCPDF
{
    protected $ci;

    /**
     * Pdf_report constructor.
     */
    public function __construct()
    {
       $this -> ci =& get_instance();
    }



}