<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profitability</title>

    {{-- css link --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="css/Styles.css">
    <script src="js/profitability.js" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <li><a href="/">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="">User</a></li>
            </ul>
        </nav>
    </section>

    <section id="count" class="container -ml-3 -mr-3">
        <h2>Profitability</h2>
    </section>

    <section class="container -ml-3 -mr-3">
        <div class="table-responsive">
            <table id="profitabilityTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Recipe</th>
                        <th>Quantity Sold</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <tr>
                        <td colspan="3">No data available</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="container -ml-3 -mr-3">
        <div class="mb-3" style="position: relative;">
    <label for="recipe">Recipe:</label>
    <select id="recipe" class="form-control">
        <option value="">Select Recipe</option>
        @foreach($recipes as $recipe)
            <option value="{{ $recipe->id }}" data-cost="{{ $recipe->cost_price }}">{{ $recipe->name }}</option>
        @endforeach
    </select>
</div>
        <div class="mb-3">
            <label for="quantity">Quantity Sold:</label>
            <input type="number" id="quantity" class="form-control">
        </div>
        <button id="addButton" class="btn btn-primary">Add</button>
    </section>
    <section class="container -ml-3 -mr-3">
        <div id="doneButton" data-action-url="{{ route('report') }}" class="btn btn-success" style="float: right; margin-top: 10px;">Done</div>
    </section>
</body>