<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PpmpController extends Controller
{
    //
    public function index(){
        return view('pages.transaction.ppmp.ppmp');
    }
}
