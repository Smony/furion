<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __construct()
    {
        try {
            DB::connection()->getPdo;
        } catch (\Exception $e){
            return redirect('install')->send();
        }
    }

    public function index()
    {
        return view('frontend.index');
    }

}
