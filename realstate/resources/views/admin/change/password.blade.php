@extends('admin.admin_dashboard')
@section('title')
    Change Password
@endsection
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                <div class="position-relative">
                    <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                    <img style="width:100%; height:300px; " src="{{(!empty($profileData->photo)) ? url($profileData->photo) : url('upload/no_image.jpg')}}"class="rounded-top" alt="profile cover">
                    </figure>
                    <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                    <div>
                        <img class="wd-70 rounded-circle" src="https://via.placeholder.com/100x100" alt="profile">
                        <span class="h4 ms-3 text-dark">{{$profileData->name}}</span>
                    </div>
                    <div class="d-none d-md-block">
                        <button class="btn btn-primary btn-icon-text">
                        <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                        </button>
                    </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center p-3 rounded-bottom">
                    <ul class="d-flex align-items-center m-0 p-0">
                    <li class="d-flex align-items-center active">
                        <i class="me-1 icon-md text-primary" data-feather="columns"></i>
                        <a class="pt-1px d-none d-md-block text-primary" href="#">Timeline</a>
                    </li>
                    <li class="ms-3 ps-3 border-start d-flex align-items-center">
                        <i class="me-1 icon-md" data-feather="user"></i>
                        <a class="pt-1px d-none d-md-block text-body" href="#">About</a>
                    </li>
                    <li class="ms-3 ps-3 border-start d-flex align-items-center">
                        <i class="me-1 icon-md" data-feather="users"></i>
                        <a class="pt-1px d-none d-md-block text-body" href="#">Friends <span class="text-muted tx-12">3,765</span></a>
                    </li>
                    <li class="ms-3 ps-3 border-start d-flex align-items-center">
                        <i class="me-1 icon-md" data-feather="image"></i>
                        <a class="pt-1px d-none d-md-block text-body" href="#">Photos</a>
                    </li>
                    <li class="ms-3 ps-3 border-start d-flex align-items-center">
                        <i class="me-1 icon-md" data-feather="video"></i>
                        <a class="pt-1px d-none d-md-block text-body" href="#">Videos</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
            <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-3 col-xl-3 left-wrapper">
                <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="d-flex align-items-center">
                            <img class="wd-100 rounded-circle" src="{{(!empty($profileData->photo)) ? url($profileData->photo) : url('upload/no_image.jpg')}}" alt="">													
                            <div class="ms-2">
                            <p class="text-danger">{{$profileData->name}}</p>
                            <p class="tx-11 text-muted">1 min ago</p>
                            </div>
                    </div>	
                    </div>
                    <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                    <p class="text-muted">{{$profileData->phone}}</p>
                    </div>
                    <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                    <p class="text-muted">{{$profileData->address}}</p>
                    </div>
                    <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                    <p class="text-muted">{{$profileData->email}}</p>
                    </div>
                    <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
                    <p class="text-muted">www.nobleui.com</p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                        <i data-feather="github"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                        <i data-feather="twitter"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                        <i data-feather="instagram"></i>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-9 col-xl-9 middle-wrapper">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title text-center text-danger"> Admin Change Password</h6>
                            <form action="{{route('admin_update_password')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                @csrf
                                <div class="row mb-3">
                                    <label for="old_password" class="col-sm-3 col-form-label text-md-right">Old Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="old_password"  class="form-control @error('old_password') is-invalid @enderror" id="old_password" >
                                    </div>
                                    @error('old_password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="new_password" class="col-sm-3 col-form-label text-md-right">New Password</label>
									<div class="col-sm-9">
										<input type="password" name="new_password"  class="form-control @error('new_password') is-invalid @enderror" id="new_password " >
									</div>
                                    @error('new_password')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror    
                                </div>
                                <div class="row mb-3">
                                    <label for="new_password" class="col-sm-3 col-form-label text-md-right">Confirmed Password</label>
									<div class="col-sm-9">
										<input type="password" name="password_confirmation"  class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="current-password" >
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
    </div>
@endsection