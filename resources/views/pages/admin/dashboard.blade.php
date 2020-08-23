@extends('layouts.app-admin')
@section('title')@stop
@section('links')
@stop
@section('content')
    <div class="content">
        <div class="cards">
            <div class="card">
                <div class="card__top">
                    <p class="card__header">
                        Materials
                        <span></span>
                    </p>
                    <button class="card__options-button">
                        ...
                    </button>
                </div>
                <ul class="card__list">
                    <li class="card__list-item">Blocks</li>
                    <li class="card__list-item">Cement</li>
                </ul>
            </div>
            <div class="card">
                <div class="card__top">
                    <p class="card__header">
                        Suppliers
                        <span></span>
                    </p>
                    <button class="card__options-button">
                        ...
                    </button>
                </div>
                <ul class="card__list">
                    <li class="card__list-item">Sammy Blocks</li>
                    <li class="card__list-item">Sammy Cements</li>
                    <li class="card__list-item">Iveco Cements</li>
                </ul>
            </div>
            <div class="card--center">
                <p class="card__header">
                    TOTAL CUSTOMERS
                </p>
                <img src="{{asset('assets/images/customers-graph.svg')}}" alt="">
                <p class="card__number">
                    3,000
                </p>
            </div>
            <div class="card--center">
                <p class="card__header">
                    TOTAL TRANSACTIONS
                </p>
                <img src="{{asset('assets/images/transactions-graph.svg')}}" alt="">
                <p class="card__number">
                    34,982
                </p>
            </div>
        </div>
        <div class="customer-table">
            <p class="customer-table__header">
                CUSTOMERS
                <span></span>
            </p>
            <div class="customer-table__row customer-table__row--header">
                <span>Customer Name</span>
                <span>Email</span>
                <span>Phone</span>
                <span>Location</span>
            </div>

            @forelse ($users as $user)
                <div class="customer-table__row">
                    <span class="customer-table__name">
                        <span class="label">Name:</span> {{$user->last_name .' '. $user->first_name }}</span>
                    <span><span class="label">Email:</span> {{$user->email}}</span>
                    <span><span class="label">Phone:</span> {{$user->phone}}</span>
                    <span><span class="label">Location:</span> {{$user->country}}</span>
                    <a href="{{url('customer', $user->uuid)}}" class="customer-table__link">
                        <img src="{{asset('assets/images/eye.svg')}}" alt="password-icon">
                        <span>View Details</span>
                    </a>
                </div>
            @empty
                <div>
                    <h3>Empty </h3>
                </div>
            @endforelse


        </div>
    </div>
@stop
@section('script')

@stop
