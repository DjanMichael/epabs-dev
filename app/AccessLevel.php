<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    //
    protected $table='tbl_access_level';

    protected $fillable = ['id', 'access_level', 'module', 'submodule', 'can_add',
                            'can_update', 'can_delete', 'can_print', 'can_export'];

}
