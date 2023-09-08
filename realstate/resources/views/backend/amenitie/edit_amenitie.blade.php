@extends('admin.admin_dashboard')
@section('title')
    Edit Aminitie
@endsection
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb float-right">
                <a href="{{route('add_amenitie')}}" class="btn btn-outline-danger">Add Amenitie</a>
                <a href="{{route('all_amenitie')}}" class="btn btn-outline-success">All Amenitie</a>
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
                                    <h6 class="card-title text-center text-danger"> Amenitie Edit</h6>
                                    <form  id="editData" action="{{route('update_amenitie')}}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="amenities_name" class="col-sm-3 col-form-label text-md-right">Amenitie Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="amenities_name" value="{{$ameniti->amenities_name}}"   class="form-control" id="amenities_name" >
                                                <input type="hidden" name="ameId" value="{{$ameniti->id}}"   class="form-control ">
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
    <script>
        document.forms['editData'].elements['status'].value = '{!! $ameniti->status !!}';
    </script>
@endsection