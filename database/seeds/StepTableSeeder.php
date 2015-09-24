<?php

use Illuminate\Database\Seeder;

class StepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('steps')->delete();
        \DB::table('steps')->insert(
            [
                ['name'=>'Init','step'=>1],
                ['name'=>'IPS','step'=>2],
                ['name'=>'PO','step'=>4],
                ['name'=>'Installation','step'=>5],
                ['name'=>'Accepted','step'=>10],
                ['name'=>'Reject','step'=>100],
            ]
        );
    }
}
