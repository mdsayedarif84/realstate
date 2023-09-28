@extends('admin.admin_dashboard')
@section('title')
    Add Roles Permission
@endsection
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb float-right">
                <a href="{{route('all_permission')}}" class="btn btn-outline-danger">All Permission</a>
            </ol>
        </nav>
        <div class="row">
            <div class="row profile-body">
                <div class="col-md-1 col-xl-1 middle-wrapper"></div>
                <div class="col-md-10 col-xl-10 middle-wrapper ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body ">
                                    <h6 class="card-title text-center text-danger">Add Roles Permission </h6>
                                    <form id="myForm" action="{{route('store_permission')}}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class=" form-group row mb-3">
                                            <label for="type_icon" class="col-sm-3 col-form-label text-md-right">Role Name</label>
                                            <div class="col-sm-9">
                                                <select name="role_id" class="form-select form-control">
                                                    <option  disabled selected >Select Role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="type_icon" class="col-sm-3 col-form-label text-md-right"></label>
                                            <div class=" col-sm-9 ">
                                                <input type="checkbox" class="form-check-input" id="checkDefault">
                                                <label class="form-check-label" for="checkDefault">Permission All</label>
                                            </div>
										</div>
                                        <hr>
                                        @foreach($permission_groups as $group)
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class=" form-check mb-2 ">
                                                        <input name="g_name_val" type="checkbox" class="form-check-input" id="checkDefault">
                                                        <label class="form-check-label" for="checkDefault">{{$group->g_name_val}}</label>
                                                    </div>
                                                </div>                                            
                                                <div class="col-9">
                                                    @php
                                                        $permissions= App\Models\User::getpermissionByGroupName($group->g_name_val);
                                                    @endphp
                                                    @foreach($permissions as $value)
                                                        <div class=" form-check mb-2 ">
                                                            <input name="permission[]" value="{{$value->id}}" id="checkDefault{{$value->id}}" type="checkbox" class="form-check-input" >
                                                            <label class="form-check-label" for="checkDefault{{$value->id}}">{{$value->name}}</label>
                                                        </div>
                                                    @endforeach
                                                    <br>
                                                </div>
                                            </div>
                                        @endforeach
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
                <div class="col-md-1 col-xl-1 middle-wrapper"></div>
            </div>
        </div>
    </div>
    <script src="{{asset('backend/assets/js/jequery.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    }, 
                    g_name_val: {
                        required : true,
                    }, 
                    group_id: {
                        required : true,
                    }, 
                    status: {
                        required : true,
                    }, 
                },
                messages :{
                    name: {
                        required : 'Please Enter Permission Name',
                    }, 
                    group_id: {
                        required : 'Please Select Group',
                    }, 
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