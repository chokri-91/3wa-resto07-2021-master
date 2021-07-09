<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Meal;

class AppController extends Controller
{
    public function welcome()
    {
        //$meals = DB::table('meals')->get();

        $message = "Meals List";
        return view('welcome', [
            'msg' => $message,
            'meals' => Meal::paginate(10)
        ]);
    }

    public function about()
    {
        return view('about', [
            'todos' => Todo::all()
        ]);
    }
    
}
