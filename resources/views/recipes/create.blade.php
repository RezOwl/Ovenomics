<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>

    {{-- css link --}}
    <link rel="stylesheet" href="css/Styles.css">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Create a recipe</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

        @endif
    </div>
    <form method="post" action="{{route('recipe.store')}}">
        @csrf
        @method('post')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="name">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" placeholder="description">
        </div>
        <div>
            <label for="category">Category</label>
            <input type="text" name="category" placeholder="category">
        </div>
        <div>
            <label for="yield">Yield</label>
            <input type="text" name="yield" placeholder="yield">
        </div>
        <div>
            <label for="selling_price">Selling Price</label>
            <input type="text" name="selling_price" placeholder="selling_price">
        </div>
        <div>
            <label for="cost_price">Cost Price</label>
            <input type="text" name="cost_price" placeholder="cost_price">
        </div>
        <div>
            <label for="gross_margin">Gross Margin</label>
            <input type="text" name="gross_margin" placeholder="gross_margin">
        </div>
        <div>
            <input type="submit" value="Save a new recipe" />
        </div>
    </form>
</body>
</html>