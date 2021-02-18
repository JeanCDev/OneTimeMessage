<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}">
  <title>{{config('app.name')}}</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="text-center my-5">{{config('app.name')}}</h1>

        @yield('content')

        <div class="text-center my-5">
          <small>
            Created by Jean Carlos Gomes &copy; 
            {{date('Y')}}
          </small>
        </div>

      </div>
    </div>
  </div>

  <script src="{{asset('assets/bootstrap.bundle.min.js')}}"></script>
</body>
</html>