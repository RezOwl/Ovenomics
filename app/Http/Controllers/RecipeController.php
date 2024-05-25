<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index(){
        $recipes = Recipe::all();
        return view('recipes.recipes', ['recipes' => $recipes]);
    }

    public function create(){
        return view('recipes.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'yield' => 'required',
            'selling_price' => 'required|decimal:0,2',
            'cost_price' => 'required|decimal:0,2',
            'gross_margin'  => 'required|decimal:0,2'
        ]);

        $newRecipe = recipe::create($data);

        return redirect(route('recipe.index'));
    }
    
    public function edit(Recipe $recipe){
        return view ('recipes.edit', ['recipe' => $recipe]);
    }

    public function update(Recipe $recipe, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'yield' => 'required',
            'selling_price' => 'required|decimal:0,2',
            'cost_price' => 'required|decimal:0,2',
            'gross_margin'  => 'required|decimal:0,2'
        ]);
        $recipe->update($data);

        return redirect(route('recipe.index'))->with('success', 'Recipe Update Succesffully');
    }

    public function hapus(Recipe $recipe){
        $recipe->delete();
        return redirect(route('recipe.index'))->with('success', 'Recipe Deleted Succesffully');
    }
}
