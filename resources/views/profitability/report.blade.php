<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profitability Report</title>

    {{-- css link --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="/css/Styles.css">
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
        <h2>Profitability Report</h2>
    </section>

    <section class="container -ml-3 -mr-3">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Recipe</th>
                        <th>Quantity Sold</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tableData as $row)
                        <tr>
                            <td>{{ $row['recipe'] }}</td>
                            <td>{{ $row['quantity'] }}</td>
                            <td>{{ $row['totalCost'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>