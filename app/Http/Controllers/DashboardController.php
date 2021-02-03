<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use \Carbon\Carbon;
class DashboardController extends Controller
{
   public function index(){
        $users = User::count();
        return view('dashboard')->with(['users'=>$users]);
    }
    public function logout(){
    	Auth::logout();
    	return Redirect::to('login');
    }
    public function report(Request $request){
        $data = $request->input();

        $query = User::with(['rolename','timereads','linereads'])
                    ->withCount([
                    'transactions' => function ($query) use ($data) {
                                
                              if(isset($data['reward_amount_from']) && $data['reward_amount_from']!=''){
                                $query = $query->where('created_at','>=',$data['reward_amount_from']);
                               }
                               if(isset($data['reward_amount_to']) && $data['reward_amount_to']!=''){
                                $query = $query->where('created_at','<=',$data['reward_amount_to']);
                               }
                              if(isset($data['txtype']) && $data['txtype']!=''){
                                $query = $query->where('type',$data['txtype']);
                               }
                               $query->select(DB::raw("SUM(amount) as paidsum"));
                            }
                        ,
                    'timereads' => function ($query)  use ($data) {
                                
                                if(isset($data['times_from']) && $data['times_from']!=''){
                                    $query = $query->where('created_at','>=',$data['times_from']);
                                }
                                if(isset($data['times_to']) && $data['times_to']!=''){
                                    $query = $query->where('created_at','<=',$data['times_to']);
                                }
                               
                                $query->select(DB::raw("SUM(amount) as paidsum"));
                            },

                    'linereads' => function ($query)  use ($data) {

                        
                           if(isset($data['lines_from']) && $data['lines_from']!=''){
                            $query = $query->where('created_at','>=',$data['lines_from']);
                           }
                           if(isset($data['lines_to']) && $data['lines_to']!=''){
                            $query = $query->where('created_at','<=',$data['lines_to']);
                           }
                           $query->select(DB::raw("count(*) as nooflinereads"));
                    }
                    ]);

        if(isset($data['gender']) && $data['gender']!=''){
            $query = $query->where('gender',$data['gender']);
        }
       
        if(isset($data['role']) && $data['role']!=''){
            $query = $query->whereIn('role', function ($query) use ($data) {
                $query->select('id')
                    ->from('roles')
                    ->where('role', $data['role']);
            });
        }

        if(isset($data['no_of_lines']) && $data['no_of_lines']!=''){


            $linesRead = DB::table('lines_read')
                     ->select( 'user_id',DB::raw('COUNT(*) as lines_read_count'))
                    ->groupBy('user_id')
                    ->having('lines_read_count', '>' , $data['no_of_lines']);
                    

           $query = $query->joinSub($linesRead, 'lines_read', function ($join) {
                        $join->on('users.id', '=', 'lines_read.user_id');
                    });
        }

        

        if(isset($data['no_of_times']) && $data['no_of_times']!=''){


            $timesRead = DB::table('times_read')
                     ->select( 'user_id',DB::raw('sum(amount) as times_read_count'))
                    ->groupBy('user_id')
                    ->having('times_read_count', '>=' , $data['no_of_times']);
                    

           $query = $query->joinSub($timesRead, 'times_read', function ($join) {
                        $join->on('users.id', '=', 'times_read.user_id');
                    });
        }

         if(isset($data['reward_of_txs']) && $data['reward_of_txs']!=''){


          $rewards = DB::table('transactions')
                     ->select( 'user_id',DB::raw('sum(amount) as reward_count'))
                    ->groupBy('user_id')
                    ->having('reward_count', '>=' , $data['reward_of_txs']);
                    

           $query = $query->joinSub($rewards, 'transactions', function ($join) {
                        $join->on('users.id', '=', 'transactions.user_id');
                    });
        }

        if( (isset($data['reward_amount_from']) && $data['reward_amount_from']!='') || (isset($data['reward_amount_to']) && $data['reward_amount_to']!='') || (isset($data['txtype']) && $data['txtype']!='') ){
            $query = $query->wherehas('transactions',function($query) use ($data){
                        if(isset($data['reward_amount_from']) && $data['reward_amount_from']!=''){
                                $query = $query->where('created_at','>=',$data['reward_amount_from']);
                               }
                               if(isset($data['reward_amount_to']) && $data['reward_amount_to']!=''){
                                $query = $query->where('created_at','<=',$data['reward_amount_to']);
                               }
                               if(isset($data['txtype']) && $data['txtype']!=''){
                                $query = $query->where('type',$data['txtype']);
                               }
                    });

        }

        if((isset($data['lines_from']) && $data['lines_from']!='')|| (isset($data['lines_to']) && $data['lines_to']!='') ){
            $query = $query->wherehas('linereads',function($query) use ($data){
                        if(isset($data['lines_from']) && $data['lines_from']!=''){
                                $query = $query->where('created_at','>=',$data['lines_from']);
                               }
                               if(isset($data['lines_to']) && $data['lines_to']!=''){
                                $query = $query->where('created_at','<=',$data['lines_to']);
                               }
                    });

        }

       /* if((isset($data['times_from']) && $data['times_from']!='')|| (isset($data['times_to']) && $data['times_to']!='') ){
            $query = $query->wherehas('timereads',function($query) use ($data){
                        if(isset($data['times_from']) && $data['times_from']!=''){
                                $query = $query->where('created_at','>=',$data['times_from']);
                               }
                               if(isset($data['times_to']) && $data['times_to']!=''){
                                $query = $query->where('created_at','<=',$data['times_to']);
                               }
                    });
        }*/

        if(isset($data['age']) && $data['age']!=''){
            $min_year = Carbon::now()->subYear($data['age']);
            $query = $query->whereDate('dob','<',$min_year); 
        }

        

        if(isset($data['order_by']) && $data['order_by']!=''){
            $ordertype = 'asc';
            if(isset($data['ordertype']) && $data['ordertype']!=''){
                $ordertype = $data['ordertype'];
            }
            if($data['order_by']=='id'){
                $query->orderby('id',$ordertype);    
            }
             if($data['order_by']=='name'){
                $query->orderby('name',$ordertype);
            }
            if($data['order_by']=='username'){
                $query->orderby('username',$ordertype);
            }
            if($data['order_by']=='created_at'){
                $query->orderby('created_at',$ordertype);
            }
            if($data['order_by']=='linesread'){
                $query->orderby('linereads_count',$ordertype);
            }
            if($data['order_by']=='timesread'){
                $query->orderby('timereads_count',$ordertype);
            }
        }

       
        $users = $query->paginate(10); 
       
        return view('report.list')->with('users',$users);
    }
}
