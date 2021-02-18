@extends('Layouts/app-layout')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h5>Essa foi a mensagem enviada por: <strong>{{$email_from}}</strong></h5>
        <p>{{$message}}</p>
        <div class="my-5">
          <a href="{{route('home')}}" class="btn btn-primary">Voltar para o inicio</a>
        </div>
      </div>
    </div>
  </div>

@endsection