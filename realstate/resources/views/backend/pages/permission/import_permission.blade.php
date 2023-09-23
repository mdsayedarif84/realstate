@extends('admin.admin_dashboard')
@section('title')
    XLsxImport
@endsection
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb float-right">
                <a href="{{route('all_permission')}}" class="btn btn-outline-danger">All Permission</a>
                &nbsp; &nbsp; &nbsp;
                <a href="{{route('export')}}" class="btn btn-outline-info">Download XLsx</a>
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
                                    <h6 class="card-title text-center text-danger">XLsx File </h6>
                                    <form id="myForm" action="{{route('import')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                        @csrf
                                        <div class="form-group row mb-3">
                                            <label for="name" class="col-sm-3 col-form-label text-md-right">XLsx File Import</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="import_file" class="form-controlr">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-5 col-form-label text-md-right"></label>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary me-2">Upload File</button>
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
@endsection