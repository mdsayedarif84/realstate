@extends('admin.admin_dashboard')
@section('title')
   All Property Type
@endsection
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add_type')}}" class="btn btn-outline-success">Add Property</a>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Property Type All</h6>
                    <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Type Name</th>
                                    <th>Type Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($types as $key=> $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $item->type_name }}</td>
                                        <td>{{ $item->type_icon }}</td>
                                        <td>
                                            <a href="{{route('edit_type',$item->id)}}" class="btn btn-warning">Edit</a>
                                            <a href="{{route('delete_type',$item->id)}}" id="delete" class="btn btn-danger">Delete</a>
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