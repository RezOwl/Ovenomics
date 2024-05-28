<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>

    {{-- css link --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="css/Styles.css">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <div>
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

    <div class="container -ml-3 -mr-3">
        <h1>Edit a recipe</h1>
        <div>
            @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

            @endif
        </div>
        <form method="post" action="{{ route('recipe.update', ['recipe' => $recipe]) }}">
            @csrf
            @method('put')
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="name" value="{{$recipe->name}}" class="form-control" />
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" placeholder="description" value="{{$recipe->description}}" class="form-control" />
            </div>
            <div>
                <label for="category">Category</label>
                <input type="text" name="category" placeholder="category" value="{{$recipe->category}}" class="form-control" />
            </div>
            <div>
                <label for="yield">Yield</label>
                <input type="text" name="yield" placeholder="yield" value="{{$recipe->yield}}" class="form-control" />
            </div>
            <div>
                <label for="selling_price">Selling Price</label>
                <input type="text" name="selling_price" placeholder="selling_price" value="{{$recipe->selling_price}}" class="form-control" />
            </div>
            <div>
                <label for="cost_price">Cost Price</label>
                <input type="text" name="cost_price" placeholder="cost_price" value="{{$recipe->cost_price}}" class="form-control" />
            </div>
            <div>
                <label for="gross_margin">Gross Margin</label>
                <input type="text" name="gross_margin" placeholder="gross_margin" value="{{$recipe->gross_margin}}" class="form-control" />
            </div>
            <div>
                <button onclick="window.location='{{ route('recipe.index') }}'" class="btn btn-outline-primary">Back</button>
                <input type="submit" value="Update" class="btn btn-primary" />
            </div>
        </form>
    </div>
</body>
</html>