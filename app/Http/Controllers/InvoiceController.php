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
        $customer = new Buyer([
            'name'          => $card->full_name,
            'address' => $card->address,
            'code' => '#'.$card->policy_no.'_'.$card->cpr_no,
            'custom_fields' => [
                'email' => $card->email,
                'cpr_no' => $card->cpr_no,
            ],
        ]);

        $seller = new Party([
            'name' => 'Sama Health Saver',
            'code' => '123 318 9486',
            'custom_fields' => [
                'address' => 'Sama address',
                'phone' => '123 123 2233',
            ],
        ]);

        $items = collect();
        foreach ($members as $member) {
            $item = new InvoiceItem();
            $item->title('Sama Health Saver => '. $member->policy_no)
                ->pricePerUnit($member->price);

            $items->push($item);
        }

        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($seller)
            ->currencySymbol('BD') ->currencyCode('BD')
            ->currencyFormat('{SYMBOL} {VALUE}')
            ->logo(public_path('images/s_logo.png'))
            ->sequence($card->id)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->date(now()->subWeeks(3))
            ->dateFormat('m/d/Y')
            ->payUntilDays(14)
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($card->policy_no . ' => sama_card')
            ->addItems($items->toArray());

        return $invoice->stream();
    }

}
