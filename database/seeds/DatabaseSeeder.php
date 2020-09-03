<?php

use Illuminate\Database\Seeder;
use DB as DBS;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ref_function_deliverables::class);
        $this->call(ref_source_of_fund::class);
        $this->call(ref_units::class);
        $this->call(ref_year::class);
        $this->call(user::class);
        $this->call(tbl_user_roles::class);
        
    }
}
