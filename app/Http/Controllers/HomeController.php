<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(){
        $ruletype = DB::table('rule_types')->where('status',1)->pluck('id','rule_name');
        echo "<pre>";
        print_r($ruletype);
        echo "</pre>";
    }
}
