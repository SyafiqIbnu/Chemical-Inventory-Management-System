<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class RoleHasPermission extends Model {
    
    //use Cachable;

    protected $table = 'role_has_permissions';
    protected $guarded = [];
    protected $primaryKey = 'permission_id';

    public function permissionIdPermission() {
        return $this->belongsTo('App\Permission', 'permission_id');
    }
}
