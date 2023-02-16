<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Trail extends Model {

    use Cachable;

    protected $table = 'trails';
    protected $guarded = [];

}
