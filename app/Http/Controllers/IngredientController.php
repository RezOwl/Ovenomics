<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index(){
        $ingredients = Ingredient::all();
        return view('ingredients.ingredients', ['ingredients' => $ingredients]);
    }

    public function create(){
        return view('ingredients.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'type_of_unit' => 'required',
            'quantity' => 'required',
            'unit_case' => 'required',
            'cost'  => 'required|decimal:0,2'
        ]);

        $newIngredient = Ingredient::create($data);

        return redirect(route('ingredient.index'));
    }
    
    public function edit(Ingredient $ingredient){
        return view ('ingredients.edit', ['ingredient' => $ingredient]);
    }

    public function update(Ingredient $ingredient, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'type_of_unit' => 'required',
            'quantity' => 'required',
            'unit_case' => 'required',
            'cost'  => 'required|decimal:0,2'
        ]);
        $ingredient->update($data);

        return redirect(route('ingredient.index'))->with('success', 'Ingredient Update Succesffully');
    }

    public function hapus(Ingredient $ingredient){
        $ingredient->delete();
        $maxId = Ingredient::max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        DB::statement("ALTER TABLE ingredients AUTO_INCREMENT = $nextId");

        return redirect(route('ingredient.index'))->with('success', 'Ingredient Deleted Succesffully');
    }
}
