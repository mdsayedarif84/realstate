@extends('admin.admin_dashboard')
@section('title')
   All GroupName
@endsection
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add_group_name')}}" class="btn btn-outline-success">Add Group Name</a>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">GroupName All</h6>
                    <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>GroupName </th>
                                    <th>GroupName Value </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupNames as $key=> $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $item->g_name }}</td>
                                        <td>{{ $item->g_name_value }}</td>
                                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{route('edit_group_name',['id'=>$item->id])}}" class="btn btn-warning">Edit</a>
                                            <a href="{{route('delete_group_name',$item->id)}}" id="delete" class="btn btn-danger">Delete</a>
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