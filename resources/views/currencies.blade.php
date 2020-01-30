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
<section class="section">
    <div class="container">
        <h1 class="title">Currencies</h1>
        <h2 class="subtitle">
            Choose currency and date and get official currency at the exchange rate of the National Bank of the Republic of Belarus.
        </h2>
        <form class="box columns">
            <div class="control is-one-fifth">
                <div class="select">
                    <select name="currency">
                        @foreach($currencies as $currency)
                        <option value="{{$currency->Cur_ID}}">{{$currency->Cur_Name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control is-one-fifth">
                <div class="select">
                    <select name="date">

                        <option value="{{$day->format('Y-m-d')}}">{{$day->format('Y-m-d')}}</option>
                        @for ($i = 0; $i < 6; $i++)
                            <option value="{{$day->subDay()->format('Y-m-d')}}">{{$day->format('Y-m-d')}}</option>
                        @endfor

                    </select>
                </div>
            </div>

            <div class="control is-one-fifth">
                <button class="button is-primary">Submit</button>
            </div>
            <div class="is-one-fifth" style="padding-top:8px;padding-left:10px;">
                <h2 class="subtitle has-text-danger center">
                    @if($result!=='')
{{$result[0]->Cur_OfficialRate}}
                        @endif
                </h2>
            </div>
        </form>
    </div>
</section>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>
</html>
