@extends('admin.admin_dashboard')
@section('title')
   All Permission
@endsection
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add_permission')}}" class="btn btn-outline-success">Add Permission</a>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Amenitie All</h6>
                    <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th> Name</th>
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
                                        @if($item->g_name ==1)
                                            <td>Property type</td>
                                        @elseif($item->g_name==2)
                                            <td>State</td>
                                        @elseif($item->g_name==3)
                                            <td>Amenities</td>
                                        @elseif($item->g_name==4)
                                            <td>Property</td>
                                        @elseif($item->g_name==5)
                                            <td>Pakace History</td>
                                        @elseif($item->g_name==6)
                                            <td>Property Message</td>
                                        @elseif($item->g_name==7)
                                            <td>Testimonials</td>
                                        @elseif($item->g_name==8)
                                            <td>Blog Category</td>
                                        @elseif($item->g_name==9)
                                            <td>Blog Post</td>
                                        @elseif($item->g_name==10)
                                            <td>Blog Comment</td>
                                        @elseif($item->g_name==11)
                                            <td>SMTP Setting</td>
                                        @elseif($item->g_name==12)
                                            <td>Site Setting</td>
                                        @else($item->g_name==13)
                                            <td>Role & Permission</td>
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