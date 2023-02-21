<?php
//============================================================+
// File name   : example_101.php
// Begin       : 2008-12-23
// Last Update : 2013-05-14
//
// Description : Example 101 for TCPDF class
//               Test heavy PDF with reduced available memory
//
// Author: Cyril Garsaud
//
// (c) Copyright:
//               Cyril Garsaud
//               http://garsaud.com
//               https://github.com/garsaud
//               cyril.garsaud@gmail.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Test heavy PDF with reduced available memory
 * @author Cyril Garsaud
 * @since 2023-02-21
 * @group memory
 * @group image
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// Set a very low memory limit
$oldMemoryLimit = ini_set('memory_limit', '30M');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Cyril Garsaud');
$pdf->setTitle('TCPDF Example 101');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// Add a large number of pages with a long text in each of them
for ($i = 1; $i <= 500; $i++) {
    $pdf->AddPage();
    $pdf->writeHTML(
        str_repeat('<b>some</b> <i>content</i> ', 100),
        true,
        0,
        true,
        true
    );
}

// Close and retrieve PDF stream
$pdf->Output('example_101.pdf', 'I');

// Revert memory limit back the way it was
ini_set('memory_limit', $oldMemoryLimit);

//============================================================+
// END OF FILE
//============================================================+
