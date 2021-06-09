<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script id="functions" user-id="{{ $user_id }}" src="{{ asset('js/functions.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <input type="number" name="num1" class="num1"> <br><br>
    <input type="number" name="num2" class="num2"> <br><br>
    <button class="boton" type="submit">Enviar</button>

</body>
</html>