<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{


    protected $table = 'package_types';

    protected $primaryKey = 'id';

    protected $fillable = [
                  'name',
                  'price'
              ];

    protected $dates = [];

    protected $casts = [];




}
