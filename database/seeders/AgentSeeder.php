<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agent = Role::whereName('agent')->first();
        if (\App\Models\User::whereEmail('sama@app.com')->first() == null) {
            $user = \App\Models\User::create([
                'username' => 'sama',
                'full_name' => 'Sama Card',
                'email' => 'sama@app.com',
                'phone' => mt_rand(100000000000,9999999999999),
                'password' => bcrypt('password')
            ]);
            $user->attachRole($agent);
        }
    }
}
