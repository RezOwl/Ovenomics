<div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Cari Resep" wire:model.live="searchTerm" />
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" wire:click="filterByCategory('all')">All</button>
        <button class="btn btn-primary" wire:click="filterByCategory('sweet')">Sweet</button>
        <button class="btn btn-primary" wire:click="filterByCategory('savory')">Savory</button>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" wire:click="sortBy('id')" style="cursor:pointer;">
                    ID
                    @if($sortField === 'id')
                        @if($sortDirection === 'asc')
                            &uarr;
                        @else
                            &darr;
                        @endif
                    @endif
                </th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Yield</th>
                <th scope="col">Selling Price</th>
                <th scope="col">Cost Price</th>
                <th scope="col">Gross Margin</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->id }}</td>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ $recipe->description }}</td>
                    <td>{{ $recipe->category }}</td>
                    <td>{{ $recipe->yield }}</td>
                    <td>{{ $recipe->selling_price }}</td>
                    <td>{{ $recipe->cost_price }}</td>
                    <td>{{ $recipe->gross_margin }}</td>
                    <td>
                        <a href="{{ route('recipe.edit', ['recipe' => $recipe]) }}" class="btn btn-outline-primary">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('recipe.hapus', ['recipe' => $recipe]) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $recipes->links() }} <!-- Pagination links -->
    </div>
</div>
