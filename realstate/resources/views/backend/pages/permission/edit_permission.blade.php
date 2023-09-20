@extends('admin.admin_dashboard')
@section('title')
    Edit Permission
@endsection
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb float-right">
                <a href="{{route('add_permission')}}" class="btn btn-outline-danger">Add Permission</a>
                &nbsp; &nbsp; &nbsp;
                <a href="{{route('all_permission')}}" class="btn btn-outline-info">All Permission</a>
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
                                    <h6 class="card-title text-center text-danger">Edit Permission </h6>
                                    <form id="myForm" action="{{route('update_permission')}}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class="form-group row mb-3">
                                            <label for="name" class="col-sm-3 col-form-label text-md-right">Permission Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="{{$permission->name}}" name="name"  class="form-control @error('name') is-invalid @enderror">
                                                <input type="hidden" value="{{$permission->id}}" name="pId"  class="form-control">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('name') ? $errors->first('name') : ' '  }}</strong>
                                                    </span>
                                                @enderror  
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="name" class="col-sm-3 col-form-label text-md-right">Group Name Value</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="g_name_val" value="{{ $permission->g_name_val }}" class="form-control @error('g_name_val') is-invalid @enderror">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->has('g_name_val') ? $errors->first('g_name_val') : ' '  }}</strong>
                                                    </span>
                                                @enderror   
                                            </div>
                                        </div>
                                        <div class=" form-group row mb-3">
                                            <label for="type_icon" class="col-sm-3 col-form-label text-md-right">Group Name</label>
                                            <div class="col-sm-9">
                                                <select name="group_id" class="form-select form-control">
                                                    <option  disabled selected >Select Group</option>
                                                    @foreach($groupNames as $key=> $value)
                                                        <option value="{{$value->id}}">{{ $value->g_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="status" class="col-sm-3 col-form-label text-md-right">Status</label>
                                            <div class="col-sm-9">
                                                <select name="status" class="form-select form-control " >
                                                    <option  disabled selected >Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
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
    <script>
        document.forms['myForm'].elements['status'].value = '{!! $permission->status !!}';
        // document.forms['myForm'].elements['group_id'].value = '{!! $value->g_name !!}';
    </script>
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
