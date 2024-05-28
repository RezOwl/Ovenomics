<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>

    {{-- css link --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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

    <div class="container -ml-3 -mr-3">
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
                <input type="text" name="name" placeholder="name" class="form-control">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" placeholder="description" class="form-control">
            </div>
            <div>
                <label for="category">Category</label>
                <input type="text" name="category" placeholder="category" class="form-control">
            </div>
            <div>
                <label for="type_of_unit">Type of unit</label>
                <input type="text" name="type_of_unit" placeholder="type of unit" class="form-control">
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" placeholder="quantity" class="form-control">
            </div>
            <div>
                <label for="unit_case">Unit case</label>
                <input type="text" name="unit_case" placeholder="unit case" class="form-control">
            </div>
            <div>
                <label for="cost">Cost</label>
                <input type="text" name="cost" placeholder="cost" class="form-control">
            </div>
            <div>
                <button onclick="window.location='{{ route('ingredient.index') }}'" class="btn btn-outline-primary">Back</button>
                <input type="submit" value="Save a new ingredient" class="btn btn-primary" />
            </div>
        </form>
    </div>
</body>
</html>