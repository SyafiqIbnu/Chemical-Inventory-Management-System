<?php

namespace App\Http\Controllers\Portal;

use App;
use App\Http\Controllers\Controller as BaseController;
use DB;

class PortalController extends BaseController
{
    public function __construct()
    {

    }

    public function index()
    {

        return view('portal.portal');
    }
}
