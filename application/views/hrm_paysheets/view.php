<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+


// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Team Archers');
$pdf->SetTitle('Salary Report');
$pdf->SetSubject('Salary Report');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 100);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0);

$title = <<< EOD
<h1 align="center"  font-family= "Times New Roman"> Pay Sheet</h1>

<h4> Employee Name: $first $second $last  </h4>
<h4> Employee Designation : Normal Employee </h4>
<h4> Year: $year  Month: $month</h4>


<head>

<style>
table {
    font-family: "Times New Roman", sans-serif;
    border-collapse: collapse;
    width: 100%;
    background-color: #C6DEFF;
}

th {
    font-family: "Times New Roman", sans-serif;
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    font-weight: bold;
}
td{
 font-family: "Times New Roman", sans-serif;
 border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<table>
  <tr>
    <th >Earnings</th>
    <th> Amount</th>
    <th>Deductions</th>
    <th>Amount</th>
   
  </tr>
 
  <tr>
    <td>Salary for this Month</td>
    <td>Rs.  $salary /=</td>
    <th></th>
    <th></th>
   
  </tr>
  <tr>
    <td>Advances</td>
    <td>Rs $advances /=</td>
    <td></td>
    <td></td>
  
  </tr>
  
   <tr>
   <td></td>
   <td></td>
    <td>ETF</td>
    <td>Rs. $etf /=</td>
  
  </tr>
  
   <tr>
   <td></td>
   <td></td>
    <td>EPF</td>
    <td>Rs. $epf /=</td>
  
  </tr>
  
   <tr>
   <td></td>
   <td></td>
    <td>Other Cut-offs</td>
    <td>Rs. $cutoffs /=</td>
  
  </tr>
  
  <tr>
    <td></td>
    <td></td>
  
  </tr>
  
  <tr>
    <td bgcolor="#f0ffff">Total Paid</td>
    <td bgcolor="#f0ffff">Rs. $final /=</td>
  
  </tr>
  
</table>



<p align="left"> Director Signature: ............ </p>
<p> Employee Signature : ............ </p>
<p> Date : $day</p>




</body>
EOD;
$pdf->writeHTML($title,0,'','',0,-1,1,0,true,'C',true);








//$pdf->writeHTML(0,0,'','',0,0,1,0,true,'C',true);
// move pointer to last page
$pdf->lastPage();
ob_clean();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Pay sheet', 'I');

//============================================================+
// END OF FILE
//============================================================+
