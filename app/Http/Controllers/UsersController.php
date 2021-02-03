<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Auth;
class UsersController extends Controller
{
    public function index(){
        $users = [];
        $users = User::with(['rolename'])->paginate(10); 
        
        return view('users.list')->with('users',$users);
    }
    public function add(Request $request){

    	if ($request->isMethod('post')) {
    	
	    	$data = $request->input();
	    	$validator = Validator::make($data, [
	    	    'username' => ['required', 'string', 'max:255','unique:users', 'alpha_dash'],
	            'name' => ['required', 'string', 'max:255'],
	            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	            'password' => ['required', 'min:8'],
	            'role' => ['required'],
                'gender' => ['required'],
                'dob' => ['required'],
                'family' => ['required'],
	            
	        ]);
	        if ($validator->fails()){
	        	return Redirect::back()->withErrors($validator)->withInput();
			}
			$user = new User;
			$user->username = $data['username'];
			$user->name = $data['name'];
			$user->password = Hash::make($data['password']);
			$user->email = $data['email'];
			$user->dob = $data['dob'];
            $user->gender = $data['gender'];  
            $user->family = $data['family']; 
            $user->role = $data['role'];            
			$user->save();
			return Redirect::to('/admin/users')->withSuccess('Account has created successfully');
		}else{
			 return view('users.add');
		}
    }
    public function delete($id){
     	$id = base64_decode($id); 
        $users = User::where(['id'=>$id])->delete();	
        return Redirect::to('/admin/users')->withSuccess('Account has deleted successfully');
    }
    public function edit($id){
     	$id = base64_decode($id); 
        $user = User::where(['id'=>$id])->first();	
        return view('users.edit')->with('user',$user);
    }
    public function update(Request $request){
    	$data = $request->input();
    	$validator = Validator::make($data, [
            'gender' => ['required'],
            'role' => ['required'],
            'dob' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'username' => [
			        'required','string', 'max:255', 'alpha_dash',
			        Rule::unique('users')->ignore($data['id']),
			    ],
            'password' => ['nullable','min:8'],
        ]);
        if ($validator->fails()){

        	return Redirect::back()->withErrors($validator);
		}
		$user = User::find($data['id']);
		$user->username = $data['username'];
		$user->name = $data['name'];
		  $user->dob = $data['dob'];
          $user->family = $data['family']; 
            $user->gender = $data['gender'];            
            $user->role = $data['role'];
        if($data['password'] && $data['password']!=''){
            $user->password = Hash::make($data['password']);
        }
		$user->save();
		return Redirect::to('/admin/users')->withSuccess('Account has updated successfully');
    }
}
