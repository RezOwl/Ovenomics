<div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Cari Resep" wire:model="searchTerm" />
    </div>
    <table class="table">
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID</th>
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
        @foreach ($recipes as $index => $recipe)
            <tr>
                <td>{{$recipes->firstItem() + $index}}</td>
                <td>{{$recipe->id}}</td>
                <td>{{$recipe->name}}</td>
                <td>{{$recipe->description}}</td>
                <td>{{$recipe->category}}</td>
                <td>{{$recipe->yield}}</td>
                <td>{{$recipe->selling_price}}</td>
                <td>{{$recipe->cost_price}}</td>
                <td>{{$recipe->gross_margin}}</td>
                <td>
                    <a href="{{route('recipe.edit', ['recipe' => $recipe])}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{ route('recipe.hapus', ['recipe' => $recipe]) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$recipes->links()}}
</div>
