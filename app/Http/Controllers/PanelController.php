<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendConfirmationEmail;
use App\User;

class PanelController extends Controller
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
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $user = $request->user();
    $job = (new SendConfirmationEmail($user))->delay(60);
    $this->dispatch($job);

    return view('home');
  }
}
