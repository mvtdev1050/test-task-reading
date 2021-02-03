@extends('layouts.dashboard')

@section('content')

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Report</li>
            </ol>
           
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Users
                </div>
                <form method="get" action="{{url('admin/report')}}" style="padding: 20px;">

                    <div class="row">

                        <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control" id="ordertype" name="ordertype">
                                 <option value=""> Order Type </option>  
                                  <option value="asc" @if(isset($_GET['ordertype']) && $_GET['ordertype']=='asc') selected @endif>Ascending</option>
                                  <option value="desc" @if(isset($_GET['ordertype']) && $_GET['ordertype']=='desc') selected @endif>Descending</option>
                              
                                </select>
                              </div>
                        </div>

                        <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" id="order_by" name="order_by">
                                 <option value=""> Order by any column</option>  
                                  <option value="id" @if(isset($_GET['order_by']) && $_GET['order_by']=='id') selected @endif>ID</option>
                                  <option value="username" @if(isset($_GET['order_by']) && $_GET['order_by']=='username')  selected @endif>Username</option>
                                  <option value="name" @if(isset($_GET['order_by']) && $_GET['order_by']=='name') selected @endif>Name</option>
                                  <option value="linesread" @if(isset($_GET['order_by']) && $_GET['order_by']=='linesread') selected  @endif>Linesread</option>
                                  <option value="timesread" @if(isset($_GET['order_by']) && $_GET['order_by']=='timesread') selected @endif>TimesRead</option>
                                  <option value="created_at" @if(isset($_GET['order_by']) && $_GET['order_by']=='created_at') selected  @endif>Created At</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" id="gender" name="gender">
                                 <option value=""> Filter by gender</option>  
                                  <option value="male" @if(isset($_GET['gender']) && $_GET['gender']=='male') selected @endif>Male</option>
                                  <option value="female" @if(isset($_GET['gender']) && $_GET['gender']=='female') selected @endif>Female</option>
                                  <option value="other" @if(isset($_GET['gender']) && $_GET['gender']=='othee') selected @endif>Others</option>
                              
                                </select>
                              </div>
                        </div>
                         <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" id="role" name="role">
                                 <option value=""> Filter by Role </option>  
                                  <option value="admin" @if(isset($_GET['role']) && $_GET['role']=='admin') selected @endif>Admin</option>
                                  <option value="user" @if(isset($_GET['role']) && $_GET['role']=='user') selected @endif>User</option>
                              
                                </select>
                              </div>
                        </div>

                        <div class="col-sm-2">
                              <div class="form-group">
                                 <input type="text" name="age" placeholder="Age greater by" class="form-control" value="{{@$_GET['age']}}">
                              </div>
                        </div>
                        

                    </div>
                    <!-- lines -->
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" name="no_of_lines" placeholder="Lines greater than" class="form-control" value="{{@$_GET['no_of_lines']}}">
                              </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" name="lines_from" placeholder="Lines From Date" class="form-control" id="lines_from" value="{{@$_GET['lines_from']}}">
                              </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" name="lines_to" placeholder="Lines To Date" class="form-control" id="lines_to" value="{{@$_GET['lines_to']}}">
                              </div>
                        </div>
                        <div class="col-sm-6">
                        </div>

                    </div>
                    <!-- times -->
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" name="no_of_times" placeholder="Times greater than" class="form-control" value="{{@$_GET['no_of_times']}}">
                              </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" name="times_from" placeholder="Times From Date" class="form-control" id="times_from" value="{{@$_GET['times_from']}}">
                              </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" name="times_to" placeholder="Times To Date" class="form-control" id="times_to" value="{{@$_GET['times_to']}}">
                              </div>
                        </div>
                        <div class="col-sm-6">
                        </div>

                    </div>
                    <!-- txs -->

                     <!-- times -->
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" name="reward_of_txs" placeholder="Transactions Amount greater than" class="form-control" value="{{@$_GET['reward_of_txs']}}">
                              </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" name="reward_amount_from" placeholder="Transcation Amount From Date" class="form-control"  id="reward_amount_from" value="{{@$_GET['reward_amount_from']}}">
                              </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                 <input type="text" name="reward_amount_to" placeholder="Transcation Amount To Date" class="form-control"  id="reward_amount_to" value="{{@$_GET['reward_amount_to']}}">
                              </div>
                        </div>

                         <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" id="txtype" name="txtype">
                                 <option value=""> Filter by Txs Type</option>  
                                  <option value="lines" @if(isset($_GET['txtype']) && $_GET['txtype']=='lines') selected @endif>Line</option>
                                  <option value="time" @if(isset($_GET['txtype']) && $_GET['txtype']=='time') selected @endif>Time</option>
                              
                                </select>
                              </div>
                        </div>

                        <div class="col-sm-4">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">                            
                            <a href="{{url('/admin/report')}}" class="btn btn-primary" style="float: right;margin-right: 20px;">Clear Filter</a>
                            <button type="Submit" class="btn btn-primary" style="float: right;margin-right: 20px;">Filter Users</button>
                        </div>
                    </div>
                </form>

                <div class="card-body">
                    @include('flash')
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>LinesRead</th>                                   
                                    <th>TimeRead</th>   
                                    <th>DOB</th>   
                                    <th>Membership Awards</th>   
                                    <th>Created At</th>                                    
                                </tr>
                            </thead>
                           
                            <tbody>
                                @foreach($users as $user)                               
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->linereads_count}}</td>
                                    <td>{{$user->timereads_count}} @if($user->timereads_count!='')min @endif</td>
                                    <td>{{$user->dob}} ({{$user->age}})</td>
                                    <td>{{$user['transactions_count']}}</td>
                                    <td>{{date_format(date_create($user->created_at),'j F Y')}}</td>                                    
                                </tr>
                               @endforeach                             
                               
                            </tbody>
                        </table>
                    </div>
                     <div class="pagi text-center">                            
                        {{ $users->links() }}                       
                    </div>
                </div>
            </div>
        </div>
    </main>
  
@endsection