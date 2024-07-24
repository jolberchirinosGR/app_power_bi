<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    public function index(Request $request)
    {
        return Company::orderBy('empresa', 'asc')->get();
    }
}