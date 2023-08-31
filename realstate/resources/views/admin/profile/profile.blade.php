@extends('admin.admin_dashboard')
@section('title')
    Profile
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
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
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
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
              <div class="col-md-12">
              <div class="card">
							<div class="card-body">
								<h6 class="card-title text-center text-danger">Update Admin Profile</h6>
								<form action="{{route('admin.profile.store')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                  @csrf
									<div class="row mb-3">
										<label for="name" class="col-sm-2 col-form-label text-right">Name</label>
										<div class="col-sm-4">
											<input type="text" name="name" value="{{$profileData->name}}" class="form-control" id="name" >
										</div>
                    <label for="username" class="col-sm-2 col-form-label text-right">Username</label>
										<div class="col-sm-4">
											<input type="text" name="username" value="{{$profileData->username}}" class="form-control" id="username" >
										</div>
									</div>										
									<div class="row mb-3">
										<label for="email" class="col-sm-3 col-form-label">Email</label>
										<div class="col-sm-9">
                      <input type="email" name="email" value="{{$profileData->email}}" class="form-control" id="email" >
										</div>
									</div>
                  <div class="row mb-3">
										<label for="address" class="col-sm-3 col-form-label">Address</label>
										<div class="col-sm-9">
                      <input type="address" name="address" value="{{$profileData->address}}" class="form-control" id="address" >
										</div>
									</div>
									<div class="row mb-3">
										<label for="phone" class="col-sm-3 col-form-label">Mobile</label>
										<div class="col-sm-9">
                      <input type="number" name="phone" value="{{$profileData->phone}}" class="form-control" id="phone" >
										</div>
									</div>
									<div class="row mb-3">
										<label for="photo" class="col-sm-2 col-form-label">Photo</label>
										<div class="col-sm-4">
											<input type="file" name="photo" class="form-control" id="photo" autocomplete="off">
										</div>
                    <label for="showImage" class="col-sm-2 col-form-label">Image Show</label>
										<div class="col-sm-4">
                      <img class="wd-100" id="showImage" src="{{(!empty($profileData->photo)) ? url($profileData->photo) : url('upload/no_image.jpg')}}" >													
										</div>
									</div>
									<button type="submit" class="btn btn-primary me-2">Save Changes</button>
									<button class="btn btn-secondary">Cancel</button>
								</form>
							</div>
						</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $('#photo').change(function(e){
        var reader  = new FileReader();
        reader.onload   = function(e){
          $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0'])
      });
    });
  </script>
@endsection