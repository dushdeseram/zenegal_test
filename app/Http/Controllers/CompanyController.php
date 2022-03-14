<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function manage(){

        $data['page_title'] = 'Manage Company';
        return view('company_manage',$data);
    }
}
