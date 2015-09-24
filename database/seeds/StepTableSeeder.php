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
                ['name'=>'Init','step'=>1,'class'=>'<i class="ace-icon fa fa-pencil align-top bigger-125"></i>'],
                ['name'=>'IPS','step'=>2,'class'=>'<i class="ace-icon fa fa-pencil align-top bigger-125"></i>'],
                ['name'=>'PO','step'=>3,'class'=>'<i class="ace-icon fa fa-pencil align-top bigger-125"></i>'],
                ['name'=>'Installation','step'=>4,'class'=>'<i class="ace-icon fa fa-pencil align-top bigger-125"></i>'],
                ['name'=>'Accepted','step'=>10,'class'=>'<i class="ace-icon fa fa-pencil align-top bigger-125"></i>'],
                ['name'=>'Reject','step'=>100,'class'=>'<i class="ace-icon fa fa-pencil align-top bigger-125"></i>'],
            ]
        );
    }
}
