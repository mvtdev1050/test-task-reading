@extends('layouts.dashboard')

@section('content')

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
           
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Users
                    <a href="{{url('admin/user/add')}}" class="btn btn-success" style="float:right;">Add +</a>
                </div>

                <div class="card-body">
                    @include('flash')
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>email</th>                                   
                                    <th>Role</th>   
                                    <th>DOB</th>   
                                    <th>Family (How many family members)</th>
                                    <th>Gender</th>  
                                    <th>Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                @foreach($users as $user)
                               
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{ucfirst(@$user->rolename->role)}}</td>
                                    <td>{{$user->dob}}</td>
                                    <td>{{$user->family}}</td>
                                    <td>{{ucfirst($user->gender)}}</td>
                                    <td><a href="{{url('admin/user/delete/'.base64_encode($user['id']))}}" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                        <a href="{{url('admin/user/edit/'.base64_encode($user['id']))}}"  class="btn btn-primary">Edit</a>
                                    </td>
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