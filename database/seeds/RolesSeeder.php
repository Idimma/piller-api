<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = ['Admin', 'Driver', 'User'];
        foreach($roles as $role){
            DB::table('roles')->insert([
                'name' => $role,
            ]);
        }
    }
}
