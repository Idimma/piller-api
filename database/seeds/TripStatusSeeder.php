<?php

use Illuminate\Database\Seeder;

class TripStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = ['Started', 'Pending', 'In Transit', 'Completed', 'Cancelled'];
        foreach($status as $role){
            DB::table('trip_status_messages')->insert([
                'status' => $role,
            ]);
        }
    }
}
