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
        $query = Recipe::query();
        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
        }

        $recipes = $query->paginate(2); // Paginate results, 10 per page

        return view('livewire.recipe-table', ['recipes' => $recipes]);
    }

}
