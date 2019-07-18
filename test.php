<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;

require 'vendor/autoload.php';

$reader = new Xlsx();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load("test.xlsx");
$activeSheet = $spreadsheet->getActiveSheet();

foreach (['A1', 'A2', 'A3'] as $pCoordinate) {
    $pCell =$activeSheet->getCell($pCoordinate);
    $isDateTime = Date::isDateTime($pCell);
    printf(
        '%s isDateTime: %s, value: %s'.PHP_EOL,
        $pCoordinate,
        $isDateTime ? 'Yes' : 'No',
        $pCell->getValue()
    );
}