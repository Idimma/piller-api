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
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
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
                        <th>User Details</th>
                        <th>Plan Details</th>
                        <th>Material Details</th>
                        <th>Status</th>
                        <th>Started At</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                    <tr>
                        <td>
                            <b>User Name:</b> {{$plan->plan_name}}
                            <br />
                            <b>User Type:</b> {{$plan->plan_type}}
                        </td>
                        <td>
                            <b>Name:</b> {{$plan->plan_name}}
                            <br />
                            <b>Type:</b> {{$plan->plan_type}}
                            <br />
                            <b>Purpose:</b> <small>{{$plan->building_type}}</small>
                            <hr class="m-1" />
                            <b>Target</b>
                            <div>
                                <b>Block:</b> {{$plan->block_target}}&nbsp;<b>Cement:</b> {{$plan->cement_target}}
                            </div>
                        </td>
                        <td>
                            <b>Estimate:</b> {{$plan->material_estimation}}
                            <br />
                            <b>Type:</b> {{$plan->material_type}}
                            <hr class="m-1" />
                            <b>Target</b>
                            <div>
                                <b>Cement:</b> {{$plan->cement_percentage}}
                                <br />
                                <b>Block:</b> {{$plan->block_percentage}}
                            </div>
                        </td>
                        <td>{{$plan->plan_status}}</td>
                        <td>{{$plan->start_date}}</td>
                        <td>{{$plan->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{url('plan', $plan->uuid)}}" class="btn-primary btn-sm btn-circle text-white">
                                <i class="fa fa-eye"></i>
                            </a>


                            <a href="javascript:void(0)" onclick="function deletePlan() {
                                           if(confirm('You are about to delete are you sure')){
                                           window.location.href= '{{url('plan/delete', $plan)}}'
                                           }
                                           }
                                           deletePlan()" class="btn-danger btn-sm btn-circle text-white">
                                <i class="fa fa-plan-times"></i>
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
