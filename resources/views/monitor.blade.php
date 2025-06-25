<!DOCTYPE html>
<html>
    <head>
        <title>Monitor de Temperatura</title>
    </head>
    <body>
        <h1>Ultimas Temperaturas</h1>
        <ul>
            @foreach($temps as $temp)
                <li>{{ $temp->created_at }} - {{ $temp->temperature }}°C</li>
            @endforeach
        </ul>
    </body>
</html>