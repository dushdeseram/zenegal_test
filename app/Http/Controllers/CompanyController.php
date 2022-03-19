<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CompanyModel;
use Validator,Redirect,Response;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function manage(){

        $CompanyModel = new CompanyModel;
        
        $companies= $CompanyModel::paginate(8);  
        //$companies= $CompanyModel->get_all_companies_by_asc();

        $data['page_title'] = 'Manage Company';
        $data['companies'] = $companies;

        return view('company_manage',compact('companies'),$data);
    }


    public function addcompanyajax(){

        $CompanyModel = new CompanyModel;

        $data['page_title'] = 'Add Company';

        //echo "hello";
        return Response::json(array('element' => View::make('company_add',$data)->render()));

        
    }

    public function addcompanyprocess(Request $request){

        $CompanyModel = new CompanyModel;

        $data = $request->input();
        $current_timestamp = Carbon::now();


        $validator = Validator::make($request->all(), [

            'name' => 'required|max:255',

            'email' => 'nullable|email|max:255',

            'website' => 'max:100',

            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'

        ]);


        if ($validator->passes()) {

            if($request->file('image')!=""){
                $name = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->store('public/company_logo');
            }else{
                $name = "";
                $path = "";
            }

            $CompanyModel->name = $data['name'];
            $CompanyModel->email = $data['email'];
            $CompanyModel->logo = $path;
            $CompanyModel->website = $data['website'];
            $CompanyModel->created_at = $current_timestamp->toDateTimeString();
            $added=$CompanyModel->save();
            //$company= $CompanyModel->get_all_active_pages_by_asc();

            return Response::json(array(
                'success' => true,
                'message' => 'Successfully Added New Record'

            ), 200);

        }else{
            return Response::json(array(
                'success' => false,
                'message' => $validator->getMessageBag()->toArray()
            ), 422);
        }


        
    }

    public function viewcompanyajax(Request $request){

        $CompanyModel = new CompanyModel;

        $data = $request->input();

        $company_id = $data['company_id'];

        $company = $CompanyModel->get_company_by_company_id($company_id);
            
        $data['company'] = $company;
        $data['page_title'] = 'View Company';

        //echo "hello";
        return Response::json(array('element' => View::make('company_view',$data)->render()));

        
    }

    public function updatecompanyajax(Request $request){

        $CompanyModel = new CompanyModel;

        $data = $request->input();

        $company_id = $data['company_id'];

        $company = $CompanyModel->get_company_by_company_id($company_id);
            
        $data['company'] = $company;
        $data['page_title'] = 'View Company';

        //echo "hello";
        return Response::json(array('element' => View::make('company_update',$data)->render()));

        
    }

    public function updatecompanyprocess(Request $request){

        $CompanyModel = new CompanyModel;

        $current_timestamp = Carbon::now();

        $data = $request->input();

        $company_id = $data['company_id'];
        


        $validator = Validator::make($request->all(), [

            'name' => 'required|max:255',

            'email' => 'nullable|email|max:255',

            'website' => 'max:100',

            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'

        ]);


        if ($validator->passes()) {

            if($request->file('image')!=""){
                $name = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->store('public/company_logo');

                $updated_image = $CompanyModel::where('id', $company_id)->update(
                    array(
                        'logo'   => $path,
                    )
                );
            }else{
                $name = "";
                $path = "";
            }

            

            $updated = $CompanyModel::where('id', $company_id)->update(
                array(
                    'name'   => $data['name'],
                    'email'   => $data['email'],
                    'logo'   => $path,
                    'website'   => $data['website'],
                    'updated_at'   => $current_timestamp->toDateTimeString(),
                )
            );     

            return Response::json(array(
                'success' => true,
                'message' => 'Successfully Updated New Record'

            ), 200);

        }else{
            return Response::json(array(
                'success' => false,
                'message' => $validator->getMessageBag()->toArray()
            ), 422);
        }


        
    }


    public function deletecompanyprocess(Request $request){

        $CompanyModel = new CompanyModel;

        $current_timestamp = Carbon::now();

        $data = $request->input();

        $company_id = $data['company_id'];

        //DB::table('users')->delete($id);
        $deleted = DB::table('companies')->delete($company_id);     
        
        if($deleted){
            echo "1";
        }else{
            echo "0";
        }


        
    }

    
}
