@extends('admin.admin_dashboard')
@section('title')
    Edit Admin
@endsection
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb float-right">
                <a href="{{route('all_admin')}}" class="btn btn-outline-danger">All Admin</a>
            </ol>
        </nav>
        <div class="row">
            <div class="row profile-body">
                <div class="col-md-2 col-xl-2 middle-wrapper"></div>
                <div class="col-md-8 col-xl-8 middle-wrapper ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body ">
                                    <h6 class="card-title text-center text-danger">Edit Admin </h6>
                                    <form id="myForm" action="{{route('update_admin')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label text-right">Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror"" id="name" >
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('name') ? $errors->first('name') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                            <label for="username" class="col-sm-2 col-form-label text-right">Username</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="username" value="{{ $user->username }}" class="form-control @error('username') is-invalid @enderror" id="username" >
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('username') ? $errors->first('username') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="email" class="col-sm-3 col-form-label text-md-right">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" id="email">
                                                <input type="hidden" name="adId" value="{{ $user->id }}" class="form-control">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('email') ? $errors->first('email') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="phone" class="col-sm-2 col-form-label text-md-right">Phone</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control @error('phone') is-invalid @enderror" id="phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('phone') ? $errors->first('phone') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                            
                                            <label for="address" class="col-sm-2 col-form-label text-md-right">Address</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="address" value="{{ $user->address }}" class="form-control @error('address') is-invalid @enderror" id="address">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('address') ? $errors->first('address') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                        </div>
                                        <div class=" form-group row mb-3">
                                            <label for="roles" class="col-sm-2 col-form-label text-md-right">Role Name</label>
                                            <div class="col-sm-4">
                                                <select name="roles" class="form-select form-control" id="roles">
                                                    <option  disabled selected >Select Role Name</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}" {{$user->hasRole($role->name) ? 'selected' : '' }}>{{$role->name}}</option>   
                                                    @endforeach                                                 
                                                </select>
                                            </div>
                                            <label for="status" class="col-sm-2 col-form-label text-md-right">Status</label>
                                            <div class="col-sm-4">
                                                <select name="status" class="form-select form-control" id="status">
                                                    <option  disabled selected >Select Status</option>
                                                        <option value="active">Active</option>   
                                                        <option value="inactive">InActive</option>   
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                                            <div class="col-sm-4">
                                                <input type="file" name="photo" class="form-control" id="photo" autocomplete="off">
                                            </div>
                                            <label for="showImage" class="col-sm-3 col-form-label">Image Show</label>
                                            <div class="col-sm-3">
                                                <img class="wd-80" id="showImage" src="{{(!empty($user->photo)) ? url($user->photo) : url('upload/no_image.jpg')}}" >													
                                            </div>
									    </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-5 col-form-label text-md-right"></label>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary me-2">Update Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xl-2 middle-wrapper"></div>
            </div>
        </div>
    </div>
    <script src="{{asset('backend/assets/js/jequery.min.js')}}"></script>
    <script>
        document.forms['myForm'].elements['status'].value = '{!! $user->status !!}';
    </script>
     <script>
        $(document).ready(function(){
            $('#photo').change(function(e){
                var reader  = new FileReader();
                reader.onload   = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0'])
            });
        });
    </script>
@endsection