@extends('admin.admin_dashboard')
@section('title')
   All Roles
@endsection
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                    <div class="page-content"> 
                    <a href="{{route('add_roles')}}" class="btn btn-outline-success">Add Roles</a>
                </ol>
            </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Roles All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Roles Name</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $key=> $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{route('edit_roles',['id'=>$item->id])}}" class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="edit" data-feather="edit"></i>
                                                </a>
                                                <a href="{{route('delete_roles',['id'=>$item->id])}}" id="delete" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="edit" data-feather="delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection