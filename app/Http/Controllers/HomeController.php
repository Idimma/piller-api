<?php

namespace App\Http\Controllers;

use App\Material;
use App\Supplier;
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
        $materials = Material::take(5)->get();
        $suppliers = Supplier::take(5)->get();

        return view('pages.home', compact('users', 'userCount',
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
        $user = getUser();
//        dd($user->plans);
        return view('pages.dashboard', compact('user'));
    }

    public function noPlan()
    {
        return view('pages.no-plan');
    }

    public function noCard()
    {
        return view('pages.no-card');
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

    public function cards()
    {
        $user = getUser();
        dd($user->cards->all());
        return view('pages.cards', compact('user'));
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
        $user = auth()->user();
        $total = $user->transactions->where('type', 'credit')->sum('amount');

        $credits = $user->transactions->where('type', 'credit');
        $debits = $user->transactions->where('type', 'debit');
        $withdrawn = ['block' => number_format($debits->sum('block'), 2),
            'cement' => number_format($debits->sum('cement'), 2)];

        return view('pages.transactions',
            compact('user', 'withdrawn', 'total', 'credits', 'debits'));
    }

    public function reports()
    {
        $users = [];
        $type = 'Reports';
        return view('users', compact('users', 'type'));
    }

    public function tasks()
    {
        $user = getUser();
        return view('pages.plans', compact('user'));
    }

    public function settings()
    {
        return view('pages.settings');
    }

    public function withdraw()
    {
        $user = getUser();
        return view('pages.withdraw', compact('user'));
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

    public function editPlan($id)
    {
        $user = getUser();
        $plan = getUser()->plans->find($id);
        if ($plan) {
            return view('pages.editPlans', compact('plan', 'user'));
        }

        return abort(404);
    }

    public function viewPlan($id)
    {
        $plan = getUser()->plans->find($id);
        if ($plan) {
            return view('pages.viewplan', compact('plan'));
        }

        return abort(404);
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
