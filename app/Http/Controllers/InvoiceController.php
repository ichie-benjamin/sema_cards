<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice;

class InvoiceController extends Controller
{
    public function makeInvoice($card){
        $card = Card::findOrFail($card);
        $members = Card::whereCardId($card->id)->orWhere('id',$card->id)->get();
        $paid = Card::wherePaid(1)->whereCardId($card->id)->orWhere('id',$card->id)->sum('price');
        $total_paid = Card::whereCardId($card->id)->orWhere('id',$card->id)->sum('price');
        $customer = new Buyer([
            'name'          => $card->full_name,
            'address' => $card->address,
            'phone' => $card->phone,
            'mobile' => $card->mobile,
//            'code' => '#'.$card->policy_no.'_'.$card->cpr_no,

        ]);

        $seller = new Party([
            'name' => 'Sama Bahrain Card',
//            'code' => '77690000',
            'custom_fields' => [
//                'address' => 'Sama address',
                'phone' => '77690000',
            ],
        ]);

        $items = collect();
        foreach ($members as $member) {
            $item = new InvoiceItem();
            $item->title('Sama Health Saver => '. $member->policy_no.' (' . $member->pay_status . ')')
                ->pricePerUnit($member->price);

            $items->push($item);
        }

        $notes = [
            'Total amount :'.$total_paid,
            ' Total paid : '.$paid,
            ' Balance : '. ((int)$total_paid - (int)$paid),
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($seller)
            ->currencySymbol('BD') ->currencyCode('BD')
            ->currencyFormat('{SYMBOL} {VALUE}')
            ->logo(public_path('images/s_logo.png'))
            ->sequence($card->id)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->dateFormat('d/m/Y')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint('.')
            ->notes($notes)
            ->filename($card->policy_no . ' => sama_card')
//            ->totalAmount($paid)
            ->addItems($items->toArray());



        return $invoice->stream();
    }

}
