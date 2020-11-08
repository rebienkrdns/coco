<?php

namespace App\Http\Controllers;

use App\Models\CustomerPlan;
use App\Models\TimeLapse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AppController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('home');
  }

  /**
   * Register customer account
   */
  public function customerRegister(Request $request)
  {
    $customer = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    $customer->assignRole("Cliente");

    CustomerPlan::create([
      'id_user' => $customer->id,
      'id_time_lapse' => TimeLapse::where('title', 'básico')->first()->id
    ]);

    Auth::login($customer);

    return Redirect::to('home');
  }
}
