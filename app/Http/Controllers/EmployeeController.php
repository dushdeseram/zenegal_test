<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyModel;
use App\Models\EmployeeModel;
use Validator,Redirect,Response;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function manage(){

        $EmployeeModel = new EmployeeModel;
        $CompanyModel = new CompanyModel;
        
        $employees= $EmployeeModel::paginate(8);  
        //$companies= $CompanyModel->get_all_companies_by_asc();

        $data['page_title'] = 'Manage Employees';
        $data['employees'] = $employees;
        $data['CompanyModel'] = $CompanyModel;

        return view('employee_manage',compact('employees'),$data);
    }

    public function addemployeeajax(){

        $EmployeeModel = new EmployeeModel;
        $CompanyModel = new CompanyModel;

        $companies= $CompanyModel->get_all_companies_by_asc();

        $data['page_title'] = 'Add Employee';
        $data['companies'] = $companies;

        //echo "hello";
        return Response::json(array('element' => View::make('employee_add',$data)->render()));

        
    }

    public function addemployeeprocess(Request $request){

        $EmployeeModel = new EmployeeModel;

        $data = $request->input();
        $current_timestamp = Carbon::now();


        $validator = Validator::make($request->all(), [

            'first_name' => 'required|max:75',

            'last_name' => 'required|max:75',

            'company_id' => 'required',

            'email' => 'nullable|email|max:255',

            'phone' => 'nullable|max:25'

        ]);


        if ($validator->passes()) {

            
            $EmployeeModel->first_name = $data['first_name'];
            $EmployeeModel->last_name = $data['last_name'];
            $EmployeeModel->company_id = $data['company_id'];
            $EmployeeModel->email = $data['email'];
            $EmployeeModel->phone = $data['phone'];
            $EmployeeModel->created_at = $current_timestamp->toDateTimeString();
            $added=$EmployeeModel->save();
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


    public function viewemployeeajax(Request $request){

        $EmployeeModel = new EmployeeModel;
        $CompanyModel = new CompanyModel;

        $data = $request->input();

        $employee_id = $data['employee_id'];

        $employee = $EmployeeModel->get_employee_by_employee_id($employee_id);
        $companies= $CompanyModel->get_all_companies_by_asc();
            
        $data['employee'] = $employee;
        $data['page_title'] = 'View Employee';
        $data['companies'] = $companies;

        //echo "hello";
        return Response::json(array('element' => View::make('employee_view',$data)->render()));

        
    }

    public function updateemployeeajax(Request $request){

        $EmployeeModel = new EmployeeModel;
        $CompanyModel = new CompanyModel;

        $data = $request->input();

        $employee_id = $data['employee_id'];

        $employee = $EmployeeModel->get_employee_by_employee_id($employee_id);
        $companies= $CompanyModel->get_all_companies_by_asc();
            
        $data['employee'] = $employee;
        $data['page_title'] = 'View Employee';
        $data['companies'] = $companies;

        //echo "hello";
        return Response::json(array('element' => View::make('employee_update',$data)->render()));

        
    }

    public function updateemployeeprocess(Request $request){

        $EmployeeModel = new EmployeeModel;

        $current_timestamp = Carbon::now();

        $data = $request->input();

        $employee_id = $data['employee_id'];
        


        $validator = Validator::make($request->all(), [

            'first_name' => 'required|max:75',

            'last_name' => 'required|max:75',

            'company_id' => 'required',

            'email' => 'nullable|email|max:255',

            'phone' => 'nullable|max:25'

        ]);


        if ($validator->passes()) {
            

            $updated = $EmployeeModel::where('id', $employee_id)->update(
                array(
                    'first_name'   => $data['first_name'],
                    'last_name'   => $data['last_name'],
                    'company_id'   => $data['company_id'],
                    'email'   => $data['email'],
                    'phone'   => $data['phone'],
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


    public function deleteemployeeprocess(Request $request){

        $EmployeeModel = new EmployeeModel;

        $current_timestamp = Carbon::now();

        $data = $request->input();

        $employee_id = $data['employee_id'];

        //DB::table('users')->delete($id);
        $deleted = DB::table('employees')->delete($employee_id);     
        
        if($deleted){
            echo "1";
        }else{
            echo "0";
        }


        
    }

}
