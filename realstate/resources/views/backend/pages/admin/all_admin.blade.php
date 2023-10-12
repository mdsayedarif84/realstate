@extends('admin.admin_dashboard')
@section('title')
   All Admin
@endsection
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <div class="page-content"> 
                <a href="{{route('add_admin')}}" class="btn btn-outline-success">Add Admin</a>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> All Admin</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th> Photo</th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Phone</th>
                                        <th> Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allAmdins as $key=> $value)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td class="overflow-hidden mb-0 d-flex justify-content-center">
                                                <img  " src="{{(!empty($value->photo)) ? url($value->photo) : url('upload/no_image.jpg')}}" class="wd-50 rounded-circle" alt="profile cover">
                                            </td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>
                                                @foreach( $value->roles as $role)
                                                    <span class="badge badge-pill bg-danger"> {{$role->name}}</span>
                                               @endforeach
                                            </td>
                                            <td>{{ $value->status}}</td>
                                            <td>
                                                <a href="{{route('edit_admin',['id'=>$value->id])}}" class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="edit" data-feather="edit"></i>
                                                </a>
                                                <a href="{{route('delete_admin',$value->id)}}" id="delete" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="trash-2" data-feather="trash-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>z
                </div>
            </div>
        </div>
    </div>
@endsection