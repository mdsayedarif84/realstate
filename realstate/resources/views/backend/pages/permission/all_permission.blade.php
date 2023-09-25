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
                                        <th>Group ID</th>
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
                                            @if($item->group_id ==1)
                                                <td>Property type</td>
                                            @elseif($item->group_id==2)
                                                <td>State</td>
                                            @elseif($item->group_id==3)
                                                <td>Amenities</td>
                                            @elseif($item->group_id==4)
                                                <td>Property</td>
                                            @elseif($item->group_id==5)
                                                <td>Pakace History</td>
                                            @elseif($item->group_id==6)
                                                <td>Property Message</td>
                                            @elseif($item->group_id==7)
                                                <td>Testimonials</td>
                                            @elseif($item->group_id==8)
                                                <td>Blog Category</td>
                                            @elseif($item->group_id==9)
                                                <td>Blog Post</td>
                                            @elseif($item->group_id==10)
                                                <td>Blog Comment</td>
                                            @elseif($item->group_id==11)
                                                <td>SMTP Setting</td>
                                            @elseif($item->group_id==12)
                                                <td>Site Setting</td>
                                            @elseif($item->group_id==13)
                                                <td>Role & Permission</td>
                                            @elseif($item->group_id==14)
                                                <td>Delete</td>
                                            @else($item->group_id==15)
                                                <td>Agent</td>
                                            @endif
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