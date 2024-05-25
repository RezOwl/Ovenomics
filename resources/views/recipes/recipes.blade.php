<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipes</title>

    {{-- css link --}}
    <link rel="stylesheet" href="css/Styles.css">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <section id="header">
        <nav class="navbar">
            <h4>Ovenomics</h4>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">User</a></li>
            </ul>
        </nav>
    </section>

    <section id="Title">
        <h1>Recipes</h1>
        <div>
            @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div>
            <div>
                <a href="{{ route ('recipe.create') }}"> Tambahkan Resep</a>
            </div>
            @livewire('recipe-table')
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Yield</th>
                    <th>Selling Price</th>
                    <th>Cost Price</th>
                    <th>Gross Margin</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($recipes as $recipe)
                    <tr>
                        <td>{{$recipe->id}}</td>
                        <td>{{$recipe->name}}</td>
                        <td>{{$recipe->description}}</td>
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
        </div>
    </section>
</body>
</html>