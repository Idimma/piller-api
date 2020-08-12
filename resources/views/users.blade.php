@extends('layouts.admin')
@section('links')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@stop
@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{$type ?? 'Posters' }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List of {{$type ?? 'Posters'}} </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive card">
            <table class="table table-striped" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Start date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->last_name .' '. $user->first_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{url('user', $user->uuid)}}" class="btn-primary btn-sm btn-circle text-white">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{url('user/edit', $user->uuid)}}" class="btn-primary btn-sm btn-circle text-white">
                                <i class="fa fa-user-edit"></i>
                            </a>

                            <a href="javascript:void(0)" onclick="function deleteUser() {
                                           if(confirm('You are about to delete are you sure')){
                                           window.location.href= '{{url('user/delete', $user)}}'
                                           }
                                           }
                                           deleteUser()" class="btn-danger btn-sm btn-circle text-white">
                                <i class="fa fa-user-times"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection