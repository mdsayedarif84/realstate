@extends('admin.admin_dashboard')
@section('title')
   All Permission
@endsection
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <div class="page-content"> 
                <a href="{{route('add_permission')}}" class="btn btn-outline-success">Add Permission</a>
                &nbsp; &nbsp; &nbsp;
                <a href="{{route('import_permission')}}" class="btn btn-outline-danger"> Imports </a>
                &nbsp; &nbsp; &nbsp;
                <a href="{{route('export')}}" class="btn btn-outline-warning">Exports </a>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Amenitie All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th> Name</th>
                                        <th>Group Name Value</th>
                                        <th>Group Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permission as $key=> $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->g_name_val }}</td>
                                            <td>{{$item->group_name}}</td>
                                            <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{route('edit_permission',['id'=>$item->id])}}" class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="edit" data-feather="edit"></i>
                                                </a>
                                                <a href="{{route('delete_permission',$item->id)}}" id="delete" class="btn btn-danger btn-sm" title="Delete">
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