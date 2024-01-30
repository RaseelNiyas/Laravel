<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;

class DataImport implements ToArray
{
    public function array(array $array)
    {
        $header = $array[0];
        $columnMap = [
            'excel_column' => 'column_name',
            'other_excel_column' => 'other_column',
        ];

        $data = [];

        for ($i = 1; $i < count($array); $i++) {
            $row = array_combine($header, $array[$i]);
            $rowData = [];

            foreach ($columnMap as $excelColumn => $dbColumn) {
                $rowData[$dbColumn] = $row[$excelColumn];
            }

            $data[] = $rowData;
        }

        return $data;
    }
}
