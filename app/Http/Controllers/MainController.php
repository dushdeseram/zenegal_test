<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;
use Session;
use Redirect,Response;
use View;

class MainController extends Controller
{
    public function index(){
        return view('login');
    }

    function checklogin(Request $request){

        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)){
            
            //'user_id'=> Auth::user()->id
            Session::put('user', [
                'id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'logged_in' =>true
            ]);
            return response()->json(['status'=>true,'message'=>'You have successfully logged in.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Please check your credentials.']);
        }
    }

    public function successlogin(){
        //return view('successlogin');
        return Response::json(array('element' => View::make('successlogin')->render()));
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
