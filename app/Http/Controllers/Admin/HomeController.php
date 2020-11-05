<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Suporte;
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
        $count = Suporte::where('status', 0)->count();
        return view('admin.home')->with('count', $count);
    }

}
