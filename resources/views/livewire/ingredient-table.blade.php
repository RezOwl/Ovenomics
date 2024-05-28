<div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Cari Ingredient" wire:model.live="searchTerm" />
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" wire:click="filterByCategory('all')">All</button>
        <button class="btn btn-primary" wire:click="filterByCategory('vegetable')">Vegetable</button>
        <button class="btn btn-primary" wire:click="filterByCategory('fruit')">Fruit</button>
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
                <th scope="col">Type of unit</th>
                <th scope="col">Quantity</th>
                <th scope="col">Unit case</th>
                <th scope="col">Cost</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->id }}</td>
                    <td>{{ $ingredient->name }}</td>
                    <td>{{ $ingredient->description }}</td>
                    <td>{{ $ingredient->category }}</td>
                    <td>{{ $ingredient->type_of_unit }}</td>
                    <td>{{ $ingredient->quantity }}</td>
                    <td>{{ $ingredient->unit_case }}</td>
                    <td>{{ $ingredient->cost }}</td>
                    <td>
                        <a href="{{ route('ingredient.edit', ['ingredient' => $ingredient]) }}" class="btn btn-outline-primary">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('ingredient.hapus', ['ingredient' => $ingredient]) }}">
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
        {{ $ingredients->links() }} <!-- Pagination links -->
    </div>
</div>
