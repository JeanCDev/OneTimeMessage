<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h4>{{config('app.name')}}</h4>
  <p>Clique no link abaixo para ler sua mensagem que só pode ser lida uma vez</p>
  <p><a href="{{route('read', ['purl'=>$purl])}}">Ler mensagem</a></p>
</body>
</html>