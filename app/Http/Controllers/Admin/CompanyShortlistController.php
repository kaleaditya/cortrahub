<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyShortlistController extends Controller
{
    public function index()
    {
        $companies = Company::with('trainers')->get();
        return view('admin.company_shortlists', compact('companies'));
    }
} 