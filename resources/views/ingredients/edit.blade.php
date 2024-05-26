<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>

    {{-- css link --}}
    <link rel="stylesheet" href="css/Styles.css">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Edit a ingredient</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

        @endif
    </div>
    <form method="post" action="{{ route('ingredient.update', ['ingredient' => $ingredient]) }}">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="name" value="{{$ingredient->name}}" />
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" placeholder="description" value="{{$ingredient->description}}" />
        </div>
        <div>
            <label for="category">Category</label>
            <input type="text" name="category" placeholder="category" value="{{$ingredient->category}}" />
        </div>
        <div>
            <label for="type_of_unit">Type of unit</label>
            <input type="text" name="type_of_unit" placeholder="type of unit" value="{{$ingredient->type_of_unit}}" />
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" placeholder="quantity" value="{{$ingredient->quantity}}" />
        </div>
        <div>
            <label for="unit_case">Unit case</label>
            <input type="text" name="unit_case" placeholder="unit case" value="{{$ingredient->unit_case}}" />
        </div>
        <div>
            <label for="cost">Cost</label>
            <input type="text" name="cost" placeholder="cost" value="{{$ingredient->cost}}" />
        </div>
        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
</body>
</html>