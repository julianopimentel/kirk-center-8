<!DOCTYPE html>
<html>
<head>
    <title>Contato do Site</title>
</head>
<body>
    <h1>Name: {{ $details['name'] }}</h1>
    <p>Retornar para: {{ $details['email'] }}</p>
    <p>Contato: {{ $details['phone'] }}</p>
    <p>Mensagem: {{ $details['comments'] }}</p>   
    <p>Thank you</p>
</body>
</html>