<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{

    use SoftDeletes;


    protected $table = 'cards';

    protected $primaryKey = 'id';

    protected $fillable = [
                  'full_name',
                  'gender',
                  'cpr_no',
                  'mobile',
                  'mobile2',
                  'phone',
                  'address',
                  'card_type',
                  'payment_method',
                  'contact_method',
                  'package_type',
                  'comment',
                  'period',
                  'agent_id',
                  'status',
                  'issue_date',
                  'expiry_date',
                  'first_issue_date','paid','photo',
                  'email',
                  'card_id',
                  'is_parent',
                  'policy_no'
              ];

    protected $dates = [
               'deleted_at'
           ];

    protected $casts = [];


    public function agent()
    {
        return $this->belongsTo(User::class,'agent_id');
    }

    public function package()
    {
        return $this->belongsTo(PackageType::class,'package_type');
    }

    public function getPhotoAttribute($value)
    {
        if(!$value){
            return '/images/avatar.jpeg';
        }
        return $value;
    }

    /**
     * Get the card for this model.
     *
     * @return App\Models\Card
     */
    public function card()
    {
        return $this->belongsTo('App\Models\Card','card_id');
    }
    public function cards()
    {
        return $this->hasMany(Card::class,'card_id');
    }

    /**
     * Set the issue_date.
     *
     * @param  string  $value
     * @return void
     */
//    public function setIssueDateAttribute($value)
//    {
//        $this->attributes['issue_date'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
//    }
//
//    /**
//     * Set the expiry_date.
//     *
//     * @param  string  $value
//     * @return void
//     */
//    public function setExpiryDateAttribute($value)
//    {
//        $this->attributes['expiry_date'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
//    }
//
//    /**
//     * Set the first_issue_date.
//     *
//     * @param  string  $value
//     * @return void
//     */
//    public function setFirstIssueDateAttribute($value)
//    {
//        $this->attributes['first_issue_date'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
//    }
//
//    /**
//     * Get issue_date in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
    public function getIssueDateAttribute($value)
    {
        $date = new Carbon($value);
        return $date->format('Y-m-d');
    }
//
//    /**
//     * Get expiry_date in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
    public function getExpiryDateAttribute($value)
    {
        $date = new Carbon($value);
        return $date->format('Y-m-d');
    }
//
//    /**
//     * Get first_issue_date in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getFirstIssueDateAttribute($value)
//    {
//        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
//    }

}
