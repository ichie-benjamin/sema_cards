<?php

namespace App\Imports;

use App\Models\Card;
use App\Models\Hospital;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HospitalImport implements ToCollection, WithHeadingRow
{


    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {

            if (isset($row['cr'])) {
                Hospital::create([
                    'provider_name' => $row['name'],
                    'cpr_no' => $row['cr'],
                    'user_id' => auth()->id(),
                    'contact' => $row['contact1'],
                    'imported' => 1,
                    'contact2' => $row['contact2'],
                    'email' => $row['email'],
                    'expiry_date' =>  $this->validateDate($row['expiry_date']) ? $this->converDate($row['expiry_date']) : Carbon::now(),
                    'address' => $row['address'],
                    'website' => $row['website'],
                    'category' => $row['category'],
                    'specialist' => $row['specialist'],
                ]);
            }
        }
    }


    function validateDate($date, $format = 'd/m/Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }


    function converDate($date){
        return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

}
