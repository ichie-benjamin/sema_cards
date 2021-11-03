<?php

namespace App\Imports;

use App\Models\Card;
use App\Models\Hospital;
use App\Models\Service;
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
                if(isset($row['name'])){
                    Hospital::create([
                        'provider_name' => $row['name'],
                        'ar_provider_name' => isset($row['ar_name']) ? $row['ar_name'] : '',
                        'cpr_no' => $row['cr'],
                        'user_id' => auth()->id(),
                        'contact' => isset($row['contact1']) ? $row['contact1'] : '',
                        'imported' => 1,
                        'contact2' => isset($row['contact2']) ? $row['contact2'] : '',
                        'email' => isset($row['email']) ? $row['email'] : '',
                        'expiry_date' =>  $this->validateDate($row['expiry_date']) ? $this->converDate($row['expiry_date']) : Carbon::now(),
                        'address' => isset($row['address']) ? $row['address'] : '',
                        'place' => isset($row['place']) ? $row['place'] : '',
                        'website' => isset($row['website']) ? $row['website'] : '',
                        'image' => isset($row['image']) ? $row['image'] : '',
                        'description' => isset($row['description']) ? $row['description'] : '',
                        'ar_place' => isset($row['ar_place']) ? $row['ar_place'] : '',
                        'ar_description' => isset($row['ar_description']) ? $row['ar_description'] : '',
                        'ar_address' => isset($row['ar_address']) ? $row['ar_address'] : '',
                        'comment' => isset($row['comment']) ? $row['comment'] : '',
                        'logo' => isset($row['logo']) ? $row['logo'] : '',
                        'contract_file' => isset($row['contract_file']) ? $row['contract_file'] : '',
                        'category' => isset($row['category']) ? $row['category'] : '',
                        'specialist' => isset($row['specialist']) ? $row['specialist'] : '',
                    ]);
                }

                if(isset($row['service_en'])){
                    $service = new Service();
                    $service->name = $row['service_en'];
                    $service->ar_name = isset($row['service_ar']) ? $row['service_ar'] : '';
                    $service->price = isset($row['service_price']) ? $row['service_price'] : '';
                    $service->hospital_cr = $row['cr'];
                    $service->save();
                }
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

