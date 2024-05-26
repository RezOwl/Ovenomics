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
    <h1>Create a ingredient</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

        @endif
    </div>
    <form method="post" action="{{route('ingredient.store')}}">
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
            <label for="type_of_unit">Type of unit</label>
            <input type="text" name="type_of_unit" placeholder="type of unit">
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" placeholder="quantity">
        </div>
        <div>
            <label for="unit_case">Unit case</label>
            <input type="text" name="unit_case" placeholder="unit case">
        </div>
        <div>
            <label for="cost">Cost</label>
            <input type="text" name="cost" placeholder="cost">
        </div>
        <div>
            <input type="submit" value="Save a new ingredient" />
        </div>
    </form>
</body>
</html>