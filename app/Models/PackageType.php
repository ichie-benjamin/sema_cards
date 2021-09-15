<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{


    protected $table = 'package_types';

    protected $primaryKey = 'id';

    protected $fillable = [
                  'name',
                  'price','show_online',
              ];

    protected $dates = [];

    protected $casts = [];




}
