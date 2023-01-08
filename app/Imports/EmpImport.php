<?php

namespace App\Imports;
use App\Models\employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
class EmpImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {

foreach($rows as $row){
if (isset($row[1])) {
    
    employee::create([
        'email'=>$row[1],
        'name'=>$row[0],
        'password'=>$row[2],
        'role'=>$row[3],
        'salary'=>$row[4],
        'desigination'=>$row[5],
        'dob'=>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6])->format('Y-m-d'),
        'address'=>$row[7],
    ]);

}

// date('Y-m-d',$row[6])
}

    }
}
