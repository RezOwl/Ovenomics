<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipes</title>

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
        </div>
    </section>
</body>
</html>