@extends('admin.admin_dashboard')
@section('title')
    Add Type
@endsection
@section('admin')
    <div class="page-content">
        <div class="row">
            <div class="row profile-body">
                <div class="col-md-9 col-xl-9 middle-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title text-center text-danger"> Property Add Type</h6>
                                    <form action="{{route('store_type')}}" method="POST" class="forms-sample">
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
            </div>
        </div>
    </div>
@endsection