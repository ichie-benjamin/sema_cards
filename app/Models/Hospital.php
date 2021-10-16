<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hospital extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [ ];

    protected $appends = ['edit_url'];

//    public $translatable = [
//        'provider_name',
//        'cpr_no',
//        'contact',
//        'contact2',
//        'email',
//        'address',
//        'website',
//        'category',
//        'specialist',
//        'contract_file',
//        'contract_date',
//        'logo',
//        'image',
//        'description'
//    ];


    protected $fillable = [
        'provider_name',
        'cpr_no',
        'contact',
        'contact2',
        'email',
        'expiry_date',
        'address',
        'website',
        'category',
        'status',
        'specialist',
        'contract_file',
        'logo',
        'image',
        'description'
    ];

    public function getEditUrlAttribute(){
        return route('hospital.edit', $this->id);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }


    public function getImageAttribute($value){
        if(!$value){
            return asset('/images/def.jpeg');
        }
        return  $value;
    }
}
