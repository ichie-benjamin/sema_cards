<?php

namespace App\Imports;

use App\Models\Card;
use App\Models\PackageType;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CardImport implements ToCollection, WithHeadingRow
{
    public function __construct()
    {
    }
    public function setExpiryDate($date, $month){
        $newDate = new Carbon($date);
        return $newDate->addMonths($month);
    }
    public function getPolicy(){
        $pol =  (int) 222200000;
        $card = Card::orderBy('policy_no', 'desc')->first();
        if($card){
            $policy = $card->policy_no + 1;
        }else{
            $policy = $pol + 1;
        }
        return $policy;
    }

    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            $policy = $this->getPolicy();
            $is_parent = 1;
            $card_id = null;
            if (isset($row['parent'])) {
                $parent = Card::where('cpr_no', $row['parent'])->first();
                if ($parent) {
                    $card_id = $parent->id;
                    $is_parent = 0;
                }
            }

            $pack = isset($row['package_type']) ? $row['package_type'] : 'no_name';
            $agent = isset($row['agent']) ? $row['agent'] : 'no_name';
            $package = PackageType::whereName($pack)->first();
            if ($package) {
                $package_id = $package->id;
            } else {
                $package_id = PackageType::latest()->first()->id;
            }

            $user = User::where('username', $agent)->orWhere('email',$agent)->first();
            $e_card = Card::where('cpr_no',$row['cpr_no'])->orWhere('policy_no',$policy)->first();
            $issue_date = $this->validateDate($row['issue_date']) ? $this->converDate($row['issue_date']) : Carbon::now();
            $first_issue_date = $this->validateDate($row['first_issue_date']) ? $this->converDate($row['first_issue_date']) : $issue_date;
            $period = isset($row['period']) ? $row['period'] : 3;
            if (isset($row['cpr_no']) && !$e_card) {
                Card::create([
                    'cpr_no' => $row['cpr_no'],
                    'policy_no' => $policy,
                    'imported' => 1,
                    'full_name' => isset($row['full_name']) ? $row['full_name'] : null,
                    'email' => isset($row['email']) ? $row['email'] : null,
                    'phone' => isset($row['phone']) ? $row['phone'] : null,
                    'status' => isset($row['status']) ? $row['status'] : 'pending',
                    'address' => isset($row['address']) ? $row['address'] : null,
                    'card_type' => isset($row['card_type']) ? $row['card_type'] : null,
                    'payment_method' => isset($row['payment_method']) ? $row['payment_method'] : null,
                    'period' => $period,
                    'contact_method' => isset($row['contact_method']) ? $row['contact_method'] : null,
                    'paid' => isset($row['paid']) ? $row['paid'] : 0,
                    'price' => isset($row['paid']) ? $row['price'] : 10,
                    'is_parent' => $is_parent,
                    'card_id' => $card_id,
                    'mobile' => isset($row['mobile']) ? $row['mobile'] : null,
                    'mobile2' => isset($row['mobile2']) ? $row['mobile2'] : null,
                    'gender' => isset($row['gender']) ? $row['gender'] : null,
                    'issue_date' => $issue_date,
                    'first_issue_date' => $first_issue_date,
                    'agent_id' => $user ? $user->id : User::whereRoleIs(['agent'])->first()->id,
                    'package_type' => $package_id,
                    'expiry_date' =>$this->setExpiryDate($issue_date, $period)
                ]);
            }
        }
    }

    function converDate($date){
        return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    function validateDate($date, $format = 'd/m/Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
}
