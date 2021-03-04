<?php

use Illuminate\Database\Seeder;

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
        $this->call(ref_activity_category::class);
        $this->call(ref_budget_item::class);
        $this->call(ref_classification::class);
        $this->call(ref_dm_category::class);
        $this->call(ref_item_unit::class);
        $this->call(ref_location::class);
        $this->call(ref_program::class);
        $this->call(ref_uacs::class);
        $this->call(user::class);
        $this->call(global_system_settings::class);
        $this->call(tbl_user_roles::class);

        // iSeed generated
        $this->call(PrebuildProcurementMedicineItems::class);
        $this->call(PrebuildProcurementSuppliesItems::class);
        $this->call(UsersTableSeeder2::class);
        $this->call(UsersProfileTableSeeder2::class);



        //training purpose
        // $this->call(PrebuildProcurementMedicineItems::class);
        // $this->call(PrebuildProcurementSuppliesItems::class);
        // $this->call(GlobalSystemSettingsTableSeeder::class);

    }
}
