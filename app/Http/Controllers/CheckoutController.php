<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $title = 'آدرس و زمان ارسال';
        return view('checkout.index', compact('title'));
    }
}
