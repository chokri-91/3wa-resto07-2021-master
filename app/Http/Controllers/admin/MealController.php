<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.meals.index',[
            'meals' => Meal::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validationRules());
        
        $validatedData['photo'] = $request->photo->store('uploads', 'public'); 
        // photo sera enregistrée dans le dossier uploads dans public dans storage //

        $meal = Meal::create($validatedData); 
        // dans meal.php en ajoute la ligne protected $guarded = []; pour enregistrer toutes les données une seule fois//


        return redirect()->route('meals.show', $meal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        return view('admin.meals.show', compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }

    private function validationRules()
    {
        return [
            'name' => 'required|string',
            'photo' => 'image|required',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'buy_price' => 'required|integer',
            'sale_price' => 'required|integer'
        ];
    }
}
