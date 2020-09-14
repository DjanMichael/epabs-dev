<?php

use Illuminate\Database\Seeder;
use App\RefBudgetLineItem;

class ref_budget_line_item extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefBudgetLineItem::create(["id"=>"1", "budget_item"=>"OPERATIONS OF REGIONAL OFFICES", "status"=>"ACTIVE"]);
        RefBudgetLineItem::create(["id"=>"2", "budget_item"=>"HEALTH SECTOR RESEARCH DEVELOPMENT", "status"=>"ACTIVE"]);
        RefBudgetLineItem::create(["id"=>"3", "budget_item"=>"HEALTH INFORMATION SYSTEM DEVELOPMENT", "status"=>"ACTIVE"]);
        RefBudgetLineItem::create(["id"=>"4", "budget_item"=>"LOCAL HEALTH SYSTEMS DEVELOPMENT & ASSISTANCE", "status"=>"ACTIVE"]);
        RefBudgetLineItem::create(["id"=>"5", "budget_item"=>"HUMAN RESOURCES FOR HEALTH & INSTITUTIONAL CAPACITY MANAGEMENT", "status"=>"ACTIVE"]);
        RefBudgetLineItem::create(["id"=>"6", "budget_item"=>"HEALTH PROMOTION", "status"=>"ACTIVE"]);
        RefBudgetLineItem::create(["id"=>"7", "budget_item"=>"PUBLIC HEALTH MANAGEMENT", "status"=>"ACTIVE"]);
        RefBudgetLineItem::create(["id"=>"8", "budget_item"=>"EPIDEMIOLOGY AND SURVEILLANCE", "status"=>"ACTIVE"]);
        RefBudgetLineItem::create(["id"=>"9", "budget_item"=>"HEALTH EMERGENCY PREPAREDNESS AND RESPONSE", "status"=>"ACTIVE"]);
        RefBudgetLineItem::create(["id"=>"10", "budget_item"=>"REGULATION OF REGIONAL HEALTH FACILITIES AND SERVICES", "status"=>"ACTIVE"]);
        RefBudgetLineItem::create(["id"=>"11", "budget_item"=>"NETWORK AND COLLABORATION", "status"=>"ACTIVE"]);
    }
}