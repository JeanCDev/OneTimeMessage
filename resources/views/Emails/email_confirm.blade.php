<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h4>{{config('app.name')}}</h4>
  <p>Clique no link abaixo para confirmar o envia da mensagem</p>
  <p><a href="{{route('confirm', ['purl'=>$purl])}}">Confirmar mensagem</a></p>
</body>
</html>