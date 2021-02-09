<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Disabling cache
    |--------------------------------------------------------------------------
    |
    | By setting this value to false, the cache will be disabled completely.
    | This may be useful for debugging purposes.
    |
    */
    'active' => env('LADA_CACHE_ACTIVE', true),

    /*
    |--------------------------------------------------------------------------
    | Redis prefix
    |--------------------------------------------------------------------------
    |
    | This prefix will be prepended to all items in Redis store.
    | Do not change this value in production, it will cause unexpected behavior.
    |
    */
    'prefix' => 'lada:',

    /*
    |--------------------------------------------------------------------------
    | Expiration time
    |--------------------------------------------------------------------------
    |
    | By default, if this value is set to null, cached items will never expire.
    | If you are afraid of dead data or if you care about disk space, it may
    | be a good idea to set this value to something like 604800 (7 days).
    |
    */
    'expiration-time' => null,

    /*
    |--------------------------------------------------------------------------
    | Cache granularity
    |--------------------------------------------------------------------------
    |
    | If you experience any issues while using the cache, try to set this value
    | to false. This will tell the cache to use a lower granularity and not
    | consider the row primary keys when creating the tags for a database query.
    | Since this will dramatically reduce the efficiency of the cache, it is
    | not recommended to do so in production environment.
    |
    */
    'consider-rows' => true,


    /*
    |--------------------------------------------------------------------------
    | Include tables
    |--------------------------------------------------------------------------
    |
    | If you want to cache only specific tables, put the table names into this
    | array. Then as soon as a query contains a table which is not specified in
    | here, it will not be cached. If you have this feature enabled, the value
    | of "exclude-tables" will be ignored and has no effect.
    |
    | Instead of hard coding table names in the configuration, it is a good
    | practice to initialize a new model instance and get the table name from
    | there like in the following example:
    |
    | 'include-tables' => [
    |     (new \App\Models\User())->getTable(),
    |     (new \App\Models\Post())->getTable(),
    | ],
    |
    */
    'include-tables' => [
                    (new \App\Views\ActivityList)->getTable(),
                    (new \App\Views\ActivityOutputFunction)->getTable(),
                    (new \App\Views\AnnualBudget)->getTable(),
                    (new \App\Views\BudgetAllocationAllYearPerProgram)->getTable(),
                    (new \App\Views\BudgetAllocationUtilization)->getTable(),
                    (new \App\Views\BudgetExpenseClass)->getTable(),
                    (new \App\Views\BudgetLineItem)->getTable(),
                    (new \App\Views\PRList)->getTable(),
                    (new \App\Views\ProcurementMedSupplies)->getTable(),
                    (new \App\Views\ProgramsWfpStatus)->getTable(),
                    (new \App\Views\ReportAppCategory)->getTable(),
                    (new \App\Views\ReportAppDetails)->getTable(),
                    (new \App\Views\ReportWFPBLI)->getTable(),
                    (new \App\Views\UnitProgram)->getTable(),
                    (new \App\Views\UserInfo)->getTable(),
                    (new \App\Views\WfpActivityInfo)->getTable(),
                    (new \App\Views\WfpListByProgram)->getTable(),
                    (new \App\Views\WfpPpmpTotalCountByYear)->getTable(),
                    (new \App\ApiSMS)->getTable(),
                    (new \App\GlobalSystemSettings)->getTable(),
                    (new \App\OutputFunction)->getTable(),
                    (new \App\PpmpComments)->getTable(),
                    (new \App\PpmpItems)->getTable(),
                    (new \App\ProgramAop)->getTable(),
                    (new \App\ProgramConap)->getTable(),
                    (new \App\ProgramPurchaseRequest)->getTable(),
                    (new \App\ProgramPurchaseRequestDetails)->getTable(),
                    (new \App\ProgramPurchaseRequestStatus)->getTable(),
                    (new \App\RefActivityCategory)->getTable(),
                    (new \App\RefActivityOutputFunctions)->getTable(),
                    (new \App\RefBudgetItem)->getTable(),
                    (new \App\RefClassification)->getTable(),
                    (new \App\RefDmCategory)->getTable(),
                    (new \App\RefFunctionDeliverables)->getTable(),
                    (new \App\RefItemUnit)->getTable(),
                    (new \App\RefLocation)->getTable(),
                    (new \App\RefPrice)->getTable(),
                    (new \App\RefProgram)->getTable(),
                    (new \App\RefSourceOfFund)->getTable(),
                    (new \App\RefUacs)->getTable(),
                    (new \App\RefYear)->getTable(),
                    (new \App\TableAnnualBudget)->getTable(),
                    (new \App\TablePiCateringBatches)->getTable(),
                    (new \App\TableProcurementMedicine)->getTable(),
                    (new \App\TableProcurementSupplies)->getTable(),
                    (new \App\TableSystemEvents)->getTable(),
                    (new \App\TableUnitBudgetAllocation)->getTable(),
                    (new \App\TableUnitProgram)->getTable(),
                    (new \App\UserChat)->getTable(),
                    (new \App\Wfp)->getTable(),
                    (new \App\WfpActivity)->getTable(),
                    (new \App\WfpComments)->getTable(),
                    (new \App\WfpPerformanceIndicator)->getTable(),
                    (new \App\ZWfpLogs)->getTable(),
    ],

    /*
    |--------------------------------------------------------------------------
    | Exclude tables
    |--------------------------------------------------------------------------
    |
    | If you want to cache all tables but some specific ones, put them into this
    | array. As soon as a query contains at least one table specified in here, it
    | will not be cached.
    |
    */
    'exclude-tables' => [],

];
