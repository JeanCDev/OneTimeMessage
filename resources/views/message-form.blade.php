@extends('Layouts/app-layout')

@section('content')

  <div class="row">
    <div class="col-sm-4 offset-sm-4">
      <form action="{{route('init')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="">De:</label>
          <input type="email" class="form-control" value="{{old('from')}}" name="from" id="from">
        </div>

        <div class="form-group">
          <label for="">Para:</label>
          <input type="email" class="form-control" name="to" id="to" value="{{old('to')}}">
        </div>

        <div class="form-group">
          <label for="">Mensagem:</label>
          <textarea name="message" id="message" class="form-control">
            {{old('message')}}
          </textarea>
        </div>

        <div class="text-center mt-3">
          <button type="submit" class="btn btn-primary">Enviar mensagem</button>
        </div>
      </form>

      <div class="mt-5">
        @if($errors->any())
          @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
          @endforeach
        @endif
      </div>

    </div>
  </div>

@endsection