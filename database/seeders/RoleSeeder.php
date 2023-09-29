<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolesArr =  array('admin','writer','user');
        foreach($rolesArr as $val){
            Role::create(['name' => $val,'guard_name' => 'web']);
        }
    }
}
