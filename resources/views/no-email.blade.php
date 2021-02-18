@extends('Layouts/app-layout')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h5>O email não existe ou já foi lido</strong></h5>
        <p>Não fique triste, envie um email você mesmo clicando no botão abaixo.</p>
        <div class="my-5">
          <a href="{{route('home')}}" class="btn btn-primary">Enviar mensagem</a>
        </div>
      </div>
    </div>
  </div>

@endsection