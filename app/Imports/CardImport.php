<?php

namespace App\Imports;

use App\Models\Card;
use App\Models\PackageType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CardImport implements ToCollection, WithHeadingRow
{
    public function __construct()
    {
    }
    public function collection(Collection $rows)
    {
        $card = Card::latest()->first();
        if($card){
            $policy = $card->policy + 1;
        }else{
            $policy = 222200000;
        }

        foreach ($rows as $row) {
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
            $user = User::where('username', $agent)->first();
            $e_card = Card::where('cpr_no',$row['cpr_no'])->orWhere('policy_no',$policy)->first();
            if (isset($row['cpr_no']) && !$e_card) {
                Card::create([
                    'cpr_no' => $row['cpr_no'],
                    'policy_no' => $policy++,
                    'imported' => 1,
                    'full_name' => isset($row['full_name']) ? $row['full_name'] : null,
                    'email' => isset($row['email']) ? $row['email'] : null,
                    'phone' => isset($row['phone']) ? $row['phone'] : null,
                    'status' => isset($row['status']) ? $row['status'] : 'pending',
                    'address' => isset($row['address']) ? $row['address'] : null,
                    'card_type' => isset($row['card_type']) ? $row['card_type'] : null,
                    'payment_method' => isset($row['payment_method']) ? $row['payment_method'] : null,
                    'period' => isset($row['period']) ? $row['period'] : 3,
                    'contact_method' => isset($row['contact_method']) ? $row['contact_method'] : null,
                    'paid' => isset($row['paid']) ? (int)$row['paid'] : 0,
                    'is_parent' => $is_parent,
                    'card_id' => $card_id,
                    'gender' => isset($row['gender']) ? (int)$row['gender'] : null,
                    'issue_date' => isset($row['issue_date']) ? (int)$row['issue_date'] : Carbon::now(),
                    'agent_id' => $user ? $user->id : User::whereRoleIs(['agent'])->first()->id,
                    'package_type' => $package_id,
                ]);
            }
        }
    }
}
