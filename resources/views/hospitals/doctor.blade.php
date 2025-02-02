<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



    <!-- Bootstrap core CSS -->
<link href="{{URL::asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{URL::asset('css/form-validation.css')}}" rel="stylesheet">
  </head>
  <body class="bg-light">

<div class="container">
  <main>
    @if(Session::has("Success"))
       <div class="alert alert-success" role="alert">
          {{ Session::get("Success") }}
        </div>
    @endif

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


              @foreach(Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                     <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                    </li>
              @endforeach
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>



            </ul>

          </div>
        </div>
      </nav>


    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="{{URL::asset('assets/brand/bootstrap-logo.svg')}}" alt="" width="72" height="57">
      <h2>{{ __('messages.offers') }}</h2>

    </div>

    <div class="row g-5">

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">title</th>


              </tr>
            </thead>
            <tbody>


               @foreach ( $doctors  as $doctor)
                <tr>
                    <th scope="row">{{$doctor->id}}</th>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->title}}</td>

               @endforeach

            </tbody>
          </table>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="{{URL::asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>

      <script src="{{URL::asset('js/form-validation.js')}}"></script>
  </body>
</html>
