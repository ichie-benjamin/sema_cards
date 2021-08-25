<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Facades\Invoice;

class InvoiceController extends Controller
{
    public function makeInvoice($card){
        $card = Card::findOrFail($card);
        $members = Card::whereCardId($card)->whereIsParent(0)->get();
        $customer = new Buyer([
            'name'          => $card->full_name,
            'address' => $card->address,
            'code' => '#'.$card->policy_no.'_'.$card->cpr_no,
            'custom_fields' => [
                'email' => $card->email,
                'cpr_no' => $card->cpr_no,
                'policy_no' => $card->policy_no,
                'issue_date' => $card->issue_date,
                'first_issue_date' => $card->first_issue_date,
                'expiry_date' => $card->expiry_date,
            ],
        ]);

        $items = [
             (new InvoiceItem())->title($card->full_name.' '.$card->p_name)->pricePerUnit($card->package->price)->quantity(1)
    ];
        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(0)
            ->taxRate(0)
            ->shipping(0)
            ->addItems($items);

        return $invoice->stream();
    }
}
