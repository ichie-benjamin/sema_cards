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

    protected $appends = ['edit_url', 'short_desc','short_desc_ar'];

    protected $with = ['cat'];

    protected $fillable = [
        'provider_name',
        'cpr_no',
        'contact',
        'contact2',
        'email',
        'expiry_date',
        'address',
        'comment',
        'place',
        'website',
        'category',
        'status',
        'specialist',
        'contract_file',
        'logo',
        'image',
        'description', 'ar_provider_name', 'ar_place', 'place', 'ar_address', 'ar_description'
    ];

    public function getEditUrlAttribute(){
        return route('hospital.edit', $this->id);
    }
    public function getShortDescAttribute(){
        return str_limit($this->description, 150);
    }

    public function getShortDescArAttribute(){
        return str_limit($this->ar_description, 150);
    }

    public function services(){
        return $this->hasMany(Service::class,'hospital_cr','cpr_no');
    }


    public function contacts(){
        return $this->hasMany(Contact::class);
    }


    public function cat(){
        return $this->belongsTo(Category::class,'category','name');
    }


    public function getImageAttribute($value){
        if(!$value){
            return asset('/images/def.jpeg');
        }
        return  $value;
    }
}
