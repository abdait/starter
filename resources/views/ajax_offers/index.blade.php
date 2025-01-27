
@extends('layouts.ajax')

@section('content')

        <main>
    <div class="container">
    <main>


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
                    <th scope="col">{{__('messages.name table')}}</th>
                    <th scope="col">{{__('messages.price')}}</th>
                    <th scope="col">{{__('messages.details table')}}</th>
                    <th scope="col">{{__('messages.photo')}}</th>
                    <th scope="col">{{__('messages.actions table')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ( $offers  as $offer)
                    <tr class="row{{$offer->id}}">
                        <th scope="row" >{{$offer->id}}</th>
                        <td>{{$offer->name}}</td>
                        <td>{{$offer->price}}</td>
                        <td>{{$offer->details}}</td>
                        <td> <img src="{{asset('images/offers/'.$offer->photo) }}" alt="Photo" style="width: 50px; height: 50px;"> </td>
                        <td><a href="{{url('offers/edit/'.$offer->id) }}" class="btn btn-success">{{__('messages.edit table')}}</a>
                            <a href="" offer_id = "{{ $offer->id }}"  id="delete_btn" class="btn btn-danger">{{__('messages.delete table')}}</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@stop


@section('scripts')
  <script>
        $(document).on('click','#delete_btn',function(e){

              e.preventDefault();

              var offer_id = $('#delete_btn').attr('offer_id');

              $.ajax({

              type: "POST",
              url: "{{ route('ajax.offers.delete') }}",
              data: {
                '_token' : "{{ csrf_token() }}",
                'id' :offer_id
              },

              success: function (data) {

                $('.row'+data.id).remove();

            },
            error: function (xhr) {
                alert(xhr.responseText); // Display error message
            }
            });


        });


  </script>

@stop
