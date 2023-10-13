@extends('admin.admin_dashboard')
@section('title')
    Add Property Type
@endsection
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb float-right">
                <a href="{{route('all_type')}}" class="btn btn-outline-danger">All Property Type</a>
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
                                    <h6 class="card-title text-center text-danger"> Property Add Type</h6>
                                    <form  id="myForm" action="{{route('store_type')}}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="type_name" class="col-sm-3 col-form-label text-md-right">Type Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="type_name"  class="form-control @error('type_name') is-invalid @enderror" id="type_name" >
                                            </div>
                                            @error('type_name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label for="type_icon" class="col-sm-3 col-form-label text-md-right">Type Icon</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="type_icon"  class="form-control @error('type_icon') is-invalid @enderror" id="type_icon " >
                                            </div>
                                            @error('type_icon')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror    
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password" class="col-sm-5 col-form-label text-md-right"></label>
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
                    type_name: {required : true,}, 
                    type_icon:{required : true,}, 
                },
                messages :{
                    type_name: {required : 'Please Enter Permission Name'}, 
                    type_icon: { required : 'Please Select Group'}, 
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