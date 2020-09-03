<?php

use Illuminate\Database\Seeder;
use App\RefFunctionDeliverables;
class ref_function_deliverables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefFunctionDeliverables::create(['class_sequence' => 'A' , 'function_class' => 'STRATEGIC FUNCTION']);
        RefFunctionDeliverables::create(['class_sequence' => 'B' , 'function_class' => 'CORE FUNCTION']);
        RefFunctionDeliverables::create(['class_sequence' => 'C' , 'function_class' => 'SUPPORT FUNCTION']);
    }
}
