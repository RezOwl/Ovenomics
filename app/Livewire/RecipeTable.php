<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class RecipeTable extends Component
{
    public $searchTerm = '';
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.recipe-table',['recipes' => Recipe::where('description','like','%'.$this->searchTerm.'%')->paginate(10)]);
    }

}
