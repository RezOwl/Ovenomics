<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class RecipeTable extends Component
{
    public function render()
    {
        return view('livewire.recipe-table', ['recipes' => Recipe::paginate(10)]);
    }
}
