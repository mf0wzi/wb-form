<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $role;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->role = Auth::user()->role;

        if($this->role === 1 || $this->role === 2){
            return redirect(RouteServiceProvider::ADMIN);
        } elseif($this->role === 0) {
            return redirect(RouteServiceProvider::USER);
        }
    }
    
    public function home()
    {
        $this->role = Auth::user()->role;

        if($this->role === 1 || $this->role === 2){
            return view('admin.dashboard');
        } elseif($this->role === 0) {
            return view('dashboard');
        }
    }

}
