<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currencies Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
</head>
<body>


<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Code</th>
        <th>Rate</th>
        <th>Date</th>
    </tr>
    </thead>

    <tbody>
    @foreach($currencies as $currency)
    <tr>
        <td>{{$currency->Cur_Name}}</td>
        <td>{{$currency->Cur_Abbreviation}}</td>
        <td>{{$currency->Cur_OfficialRate}}</td>
        <td>{{$currency->Date}}</td>
    </tr>
        @endforeach

    </tbody>

    <tfoot>
    <tr>
        <th>Name</th>
        <th>Code</th>
        <th>Rate</th>
        <th>Date</th>
    </tr>
    </tfoot>
</table>



<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>
</html>
