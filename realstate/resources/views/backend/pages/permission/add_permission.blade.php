@extends('admin.admin_dashboard')
@section('title')
    Add Permission
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
                <div class="col-md-2 col-xl-2 middle-wrapper"></div>
                <div class="col-md-8 col-xl-8 middle-wrapper ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body ">
                                    <h6 class="card-title text-center text-danger">Add Permission </h6>
                                    <form id="myForm" action="{{route('store_permission')}}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class="form-group row mb-3">
                                            <label for="name" class="col-sm-3 col-form-label text-md-right">Permission Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name"  class="form-control"  >
                                            </div>
                                        </div>
                                        <div class=" form-group row mb-3">
                                            <label for="type_icon" class="col-sm-3 col-form-label text-md-right">Group Name</label>
                                            <div class="col-sm-9">
                                                <select name="group_name" class="form-select form-control">
                                                    <option  disabled selected >Select Group</option>
                                                    @foreach($groupNames as $key=> $item)
                                                        <option value="{{$item->g_name_value}}">{{$item->g_name}}</option>
                                                    @endforeach
                                                </select>
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
    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    }, 
                    group_name: {
                        required : true,
                    }, 
                },
                messages :{
                    name: {
                        required : 'Please Enter Permission Name',
                    }, 
                    group_name: {
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