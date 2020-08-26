<?php

namespace App\Http\Controllers;

use App\Material;
use App\Plan;
use App\Supplier;
use App\Transactions;
use App\User;
use Hash;
use Validator;

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
        $users = User::take(5)->get();
        $userCount = User::count();
//        $amount = Transactions::sum('amount');
        $materials = Material::take(5)->get();
        $suppliers = Supplier::take(5)->get();

        return view('pages.admin.dashboard', compact('users', 'userCount',
            'materials', 'suppliers'
        ));
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

    public function viewCustomer($uuid)
    {
        $customer = User::whereUuid($uuid)->firstOrFail();
        $total = $customer->transactions->where('type', 'credit')->sum('amount');
        $w = $customer->transactions->where('type', 'credit');
        $withdrawn = ['block' => number_format($w->sum('block'), 2),
            'cement' => number_format($w->sum('cement'), 2)];

        $credits = $customer->transactions->where('type', 'credit');
        $debits = $customer->transactions->where('type', 'debit');
        return view('pages.admin.view-customer',
            compact('customer', 'withdrawn', 'total', 'credits', 'debits'));
    }

    public function history()
    {
        $credits = Transactions::where('type', 'credit')->get();
        $debits = Transactions::where('type', 'debit')->get();
        $all = Transactions::get();

        if (request()->method() === 'post' && request()->search) {
            $credits = Transactions::where('reference', 'LIKE', "%" . request()->search . "%")->where('type', 'credit')->get();
            $debits = Transactions::where('reference', 'LIKE', "%" . request()->search . "%")->where('type', 'debit')->get();
            $all = Transactions::where('reference', 'LIKE', "%" . request()->search . "%")->get();
        }


        return view('pages.admin.history', compact('all', 'debits', 'credits'));
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

    public function settingsPassword()
    {
        return view('pages.change-password');
    }

    public function updatePassword()
    {
        Validator::validate(request()->all(), [
            'password' => 'required|string|confirmed',
            'old_password' => 'required|string',
        ]);
        $user = auth()->user();
        if (!password_verify(request()->old_password, $user->password)) {
            return back()->with('error', 'Password doesnt match old password');
        }
        $user->update(['password' => Hash::make(request()->password)]);
        return back()->with('success', 'Password Changed Successfully');

    }

    public function editPlan()
    {
        return view('pages.editPlans');
    }

    public function updateProfile()
    {
        Validator::validate(request()->all(), [
            'phone' => 'sometimes|min:11|numeric',
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255',
            'bank_name' => 'sometimes|string',
            'account_name' => 'sometimes|string',
            'account_number' => 'sometimes|numeric',
            'driving_license' => 'sometimes',
            'country' => 'sometimes',
            'avatar' => 'sometimes'
        ]);

        $user = auth()->user();
        if (isset(request()->avatar)) {
            $uploadedFile = request()->avatar;
            $filename = $user->first_name . '-' . time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move(storage_path('app/public/avatar'), $filename);
            $user->update(['image_url' => $filename]);
        }
        $user->update(request()->except(['password', 'image_url', 'uuid']));
        return back()->with('success', 'Profile Updated Successfully');
    }
}
