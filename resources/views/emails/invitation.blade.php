<!DOCTYPE html>
<html>
<head>
    <title>Sind on kutsutud esinemisele {{ $event->name }}</title>
</head>
<body>
    <h1>Sind on kutsutud esinemisele {{ $event->name }}</h1>
    <p>{{ $event->description }}</p>
    <p>Aeg: {{ $event->date }}</p>
    <p>Asukoht: {{ $event->location }}</p>
    <p>Kava: {{ $event->dance }}</p>

    <p>Palun vasta kutsele:</p>
    <a href="{{ route('responses.create', ["event"=>$event->id, "email"=>$email]) }}">Vasta kutsele</a>
</body>
</html>
