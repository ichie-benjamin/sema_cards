<?php

namespace Database\Seeders;

use App\Models\PackageType;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Database\Seeder;

class PackageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['individual','family','retired for 1 year','retired for 2 years','gift','disable'];

        foreach ($items as $item){
            if(PackageType::whereName($item)->first() == null ){
                $p = new PackageType();
                $p->name = $item;
                $p->price = 1000;
                $p->save();
            }
        }
    }
}
