<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Permission extends Model {
    
    //use Cachable;

    protected $table = 'permissions';
    protected $guarded = [];

}
