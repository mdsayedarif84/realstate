@extends('admin.admin_dashboard')
@section('title')
    Add Amenitie
@endsection
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb float-right">
                <a href="{{route('all_amenitie')}}" class="btn btn-outline-danger">All Amenitie</a>
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
                                    <h6 class="card-title text-center text-danger"> Amenitie Add </h6>
                                    <form id="myForm" action="{{route('store_amenitie')}}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class="form-group row mb-3">
                                            <label for="amenitie_name" class="col-sm-3 col-form-label text-md-right">Amenitie Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="amenities_name"  class="form-control"  >
                                            </div>
                                        </div>
                                        <div class=" form-group row mb-3">
                                            <label for="type_icon" class="col-sm-3 col-form-label text-md-right">Status</label>
                                            <div class="col-sm-9">
                                                <select name="status" class="form-select form-control" >
                                                    <option  disabled selected >Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                    
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
                    amenities_name: {
                        required : true,
                    }, 
                    status: {
                        required : true,
                    }, 
                },
                messages :{
                    amenities_name: {
                        required : 'Please Enter Amenities Name',
                    }, 
                    status: {
                        required : 'Please Select Status',
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