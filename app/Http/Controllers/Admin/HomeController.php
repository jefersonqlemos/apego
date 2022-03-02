<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Suporte;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idadmin = Auth::user()->id;
        $count = Suporte::where('status', 0)->count();
        return view('admin.home')->with(compact('count', 'idadmin'));
    }

}
