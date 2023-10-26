@extends('admin.admin_dashboard')
@section('title')
    Add Admin
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
                                    <h6 class="card-title text-center text-danger">Add Admin </h6>
                                    <form id="myForm" action="{{route('store_admin')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label text-right">Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"" id="name" >
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('name') ? $errors->first('name') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                            <label for="username" class="col-sm-2 col-form-label text-right">Username</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" id="username" >
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('username') ? $errors->first('username') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="email" class="col-sm-2 col-form-label text-md-right">Email</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('email') ? $errors->first('email') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                            <label for="password" class="col-sm-2 col-form-label text-md-right">Password</label>
                                            <div class="col-sm-4">
                                                <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('password') ? $errors->first('password') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="phone" class="col-sm-2 col-form-label text-md-right">Phone</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('phone') ? $errors->first('phone') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                            
                                            <label for="address" class="col-sm-2 col-form-label text-md-right">Address</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" id="address">
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
                                                        <option value="{{$role->id}}">{{$role->name}}</option>   
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
                                                <img class="wd-80" id="showImage" src="{{(!empty($profileData->photo)) ? url($profileData->photo) : url('upload/no_image.jpg')}}" >													
                                            </div>
									    </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-5 col-form-label text-md-right"></label>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
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
    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {required : true}, 
                    username: {required : true}, 
                    email: {required : true}, 
                    password: {required : true}, 
                    phone: {required : true}, 
                    role: {required : true}, 
                    photo: {required : true}, 
                    address: {required : true}, 
                    status: {required : true}, 
                },
                messages :{
                    name: {required : 'Please Enter  Name'}, 
                    username: {required : 'Please Enter User Name'}, 
                    email: {required : 'Please Enter Email Name'}, 
                    password: {required : 'Please Enter Password Name'}, 
                    phone: {required : 'Please Enter Phone Name'}, 
                    role: {required : 'Please Enter Role Name'}, 
                    photo: {required : 'Please Enter Photo Name'}, 
                    address: {required : 'Please Enter Address Name'}, 
                    status: {required : 'Please Select Status'}, 
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection