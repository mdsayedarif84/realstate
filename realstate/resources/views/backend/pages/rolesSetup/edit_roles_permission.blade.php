@extends('admin.admin_dashboard')
@section('title')
    Edit Roles Permission
@endsection
@section('admin')
    <style type="text/css">
        .form-check-label{
            text-transform:capitalize;
        }
    </style>
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <div class="page-content"> 
                    <a href="{{route('all_roles_permission')}}" class="btn btn-outline-success">All Roles Permission</a>
                </div>
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
                                    <h6 class="card-title text-center text-danger">Edit Roles Permission </h6>
                                    <form id="myForm" action="{{route('store_roles_permission')}}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class=" form-group row mb-3">
                                            <label for="type_icon" class="col-sm-3 col-form-label text-md-right">Role Name</label>
                                            <div class="col-sm-9">
                                                <h4>{{$role->name}}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="type_icon" class="col-sm-3 col-form-label text-md-right"></label>
                                            <div class=" col-sm-9 ">
                                                <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                                <label class="form-check-label" for="checkDefaultmain">Permission All</label>
                                            </div>
										</div>
                                        <hr>
                                        @foreach($permission_groups as $group)
                                            <div class="row">
                                                <div class="col-3">
                                                    @php
                                                        $permissions= App\Models\User::getpermissionByGroupName($group->g_name_val);
                                                    @endphp
                                                    <div class=" form-check mb-2 ">
                                                        <input name="g_name_val" type="checkbox" class="form-check-input" id="checkDefault" {{ App\Models\User::roleHasPermission($role, $permissions) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="checkDefault">{{$group->g_name_val}}</label>
                                                    </div>
                                                </div>                                            
                                                <div class="col-9">
                                                    @foreach($permissions as $value)
                                                        <div class=" form-check mb-2 ">
                                                            <input name="permission[]" value="{{$value->id}}" id="checkDefault{{$value->id}}" type="checkbox" class="form-check-input" {{ $role->hasPermissionTo($value->name)? 'checked':''}} >
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="{{asset('backend/assets/js/jequery.min.js')}}"></script>
    <script type="text/javascript">
        $('#checkDefaultmain').click(function(){
            if($(this).is(':checked')){
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });
    </script>
    
@endsection