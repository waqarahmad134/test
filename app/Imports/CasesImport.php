<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use App\Models\Cases;

class CasesImport implements ToModel
{
    public function model(array $row)
    {
        //
        return new Cases([
            //
          
                'file_number'  => $row[10],
                'reference'    => $row[9], 
                'case_type' => $row[8],
                'offence' => $row[7],
                'plaintiff' => $row[6],
                'defendant' => $row[5],
                'decision_date' =>  $row[4],
                'decision' => $row[3],
                'court_name' => $row[2],
                'decision_year' => $row[1],
                'rack_number' => $row[0]
        ]);
    }
}
