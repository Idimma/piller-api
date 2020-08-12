<?php

namespace App\Http\Controllers;

use App\Task;
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
        $users = Task::get();
        $type = 'Tasks';
        return view('users', compact('users', 'type'));
    }

    public function settings()
    {
        return view('settings');
    }
}
