<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    {!! Html::style(source('css/app.css')) !!}

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
<div id="app">
    @include('app.layout.includes.navbar')

    @yield('content')

    <loader></loader>
</div>

{!! Html::script(source('js/app.js')) !!}
{!! Html::script('http://code.jquery.com/ui/1.12.1/jquery-ui.min.js') !!}
</body>
</html>
