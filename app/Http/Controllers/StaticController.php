<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    function test()
    {
    }

    function home()
    {
        return view('home');
    }

    function test_danh_sach_lop()
    {
        return view('test.classes.index');
    }

    function test_header1()
    {
        return view('test.header1');
    }
}
