@extends('layouts.dashboard')

@section('content')

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">User Add</li>
            </ol>
           
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    User Add
                </div>

                <div class="card-body">
                    @include('flash')
                    <div class="table-responsive">
                        <form method="POST" action="{{ route('addUser') }}">
                        @csrf
                     <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                   <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                            <div class="col-md-6">

                                <select class="form-control @error('role') is-invalid @enderror" name="role" required autocomplete="role" autofocus id="role" >
                                  
                                    <option value="1" >Admin</option>
                                    <option value="2" >User</option>
                                    

                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">

                                <select class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" autofocus id="gender" >                                   
                                    <option value="1" @if( old('gender')==1) selected @endif>Male</option>
                                    <option value="0" @if( old('gender')==0) selected @endif>Female</option>   
                                    <option value="0" @if( old('gender')==0) selected @endif>Other</option>   
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                         <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="dob" class="form-control @error('dob') is-invalid @enderror" name="dob" required>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>         

                        <div class="form-group row">
                            <label for="family" class="col-md-4 col-form-label text-md-right">{{ __('How Many Family Members') }}</label>

                            <div class="col-md-6">
                                 <input id="family" type="number" class="form-control @error('family') is-invalid @enderror" name="family" value="{{ old('family') }}" required autocomplete="family">

                                @error('family')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>         

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add User
                                </button>
                              
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
  
@endsection