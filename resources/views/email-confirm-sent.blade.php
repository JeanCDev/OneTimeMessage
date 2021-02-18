@extends('Layouts/app-layout')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h5>O email de confirmação foi enviado para <strong>{{$email_address}}</strong></h5>
        <p>Verifique sua caixa de entrada ou sua caixa de SPAM</p>
        <div class="my-5">
          <a href="{{route('home')}}" class="btn btn-primary">Voltar para o inicio</a>
        </div>
      </div>
    </div>
  </div>

@endsection