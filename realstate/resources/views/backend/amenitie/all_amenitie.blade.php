@extends('admin.admin_dashboard')
@section('title')
   All Amenitie
@endsection
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add_amenitie')}}" class="btn btn-outline-success">Add Amenitie</a>
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
                                    <th>Amenitie Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($amenities as $key=> $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $item->amenities_name }}</td>
                                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{route('edit_amenitie',['id'=>$item->id])}}" class="btn btn-warning">Edit</a>
                                            <a href="{{route('delete_amenitie',$item->id)}}" id="delete" class="btn btn-danger">Delete</a>
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