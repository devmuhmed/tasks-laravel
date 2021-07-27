<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $someStatement = 'this is test varqweqwewqew';

        // dd($this); to debug the code
        return view('test', ['testVar' => $someStatement, 'testing' => 'some value of testing']);
    }

}
