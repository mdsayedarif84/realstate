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
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>GroupName </th>
                                    <th>Status</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupNames as $key=> $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $item->g_name }}</td>
                                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{route('edit_group_name',['id'=>$item->id])}}" class="btn btn-warning btn-sm" title="edit">
                                                <i class="edit" data-feather="edit"></i>
                                            </a>
                                            <a href="{{route('delete_group_name',$item->id)}}" id="delete" class="btn btn-danger" title="delete">
                                                <i class="edit" data-feather="delete"></i>
                                            </a>
                                            @if($item->status == 1)
                                                <a href="{{route('inactive_group_name',['id'=>$item->id])}}" class="btn btn-success btn-sm" title="Acitve">
                                                    <i class="edit" data-feather="arrow-up"></i>
                                                </a>
                                            @else
                                                <a href="{{route('active_group_name',['id'=>$item->id])}}" class="btn btn-primary btn-sm" title="Inactive">
                                                    <i class="edit" data-feather="arrow-down"></i>
                                                </a>
                                            @endif
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