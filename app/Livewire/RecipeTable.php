<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class RecipeTable extends Component
{
    public $searchTerm = '';
    public $sortDirection = 'asc'; // Default sort direction
    public $sortField = 'id'; // Default sort field
    public $selectedCategory = 'all'; // Default category filter

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = ['searchTerm'];

    public function updatedSearchTerm()
    {
        // Reset pagination to the first page whenever the search term changes
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
        $this->resetPage(); // Reset pagination when category changes
    }

    public function render()
    {
        $query = Recipe::query();
        
        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
        }

        if ($this->selectedCategory !== 'all') {
            $query->where('category', $this->selectedCategory);
        }

        $recipes = $query->orderBy($this->sortField, $this->sortDirection)->paginate(5);

        return view('livewire.recipe-table', ['recipes' => $recipes]);
    }
}
