<?php

namespace App\Http\Controllers;

use App\Material;
use App\Plan;
use App\Supplier;
use App\Transactions;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::get();
        return view('pages.admin.dashboard', compact('users'));
    }

    public function materials()
    {
        $materials = Material::get();
        return view('pages.admin.Materials', compact('materials'));
    }

    public function suppliers()
    {
        $suppliers = Supplier::get();
        return view('pages.admin.suppliers', compact('suppliers'));
    }

    public function customers()
    {
        $users = User::get();
        return view('pages.admin.customers', compact('users'));
    }

    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function viewCustomer()
    {
        return view('pages.admin.view-customer');
    }

    public function history()
    {
        return view('pages.admin.history');
    }

    public function cards()
    {
        return view('pages.cards');
    }

    public function indexAdmin()
    {
        $users = User::count();

        $widget = ['users' => $users,];

        return view('home', compact('widget'));
    }

    public function users()
    {
        $users = User::get();
        $type = 'Users';
        return view('users', compact('users', 'type'));
    }

    public function admins()
    {
        $users = User::get();
        $type = 'Admins';
        return view('users', compact('users', 'type'));
    }

    public function taskers()
    {
        $users = User::get();
        $type = 'Taskers';
        return view('users', compact('users', 'type'));
    }

    public function transactions()
    {
        $users = Transactions::get();
        $type = 'Transactions';
        return view('users', compact('users', 'type'));
    }

    public function reports()
    {
        $users = [];
        $type = 'Reports';
        return view('users', compact('users', 'type'));
    }

    public function tasks()
    {
        $plans = Plan::get();
        $type = 'Plans';
        return view('plans', compact('plans', 'type'));
    }

    public function settings()
    {
        return view('pages.settings');
    }

    public function editPlan()
    {
        return view('pages.editPlans');
    }
}
