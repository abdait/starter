
@extends('layouts.ajax')

@section('content')
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

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">{{ __('messages.offers') }}</h4>
        <form class="needs-validation" novalidate method="POST" action="{{ route('offers.update',$offer->id) }}">
          <div class="row g-3">
            @csrf
            <div class="col-sm-12">
              <label for="firstName" class="form-label">{{ __('messages.name en') }}</label>
              <input type="text" class="form-control" name="name_en"  value="{{ $offer->name_en }}" >
              @error('name_en')
              <small class='text-danger text-center text-small'>
                    {{ $message }}
                </small>
              @enderror
            </div>
            <div class="col-sm-12">
              <label for="firstName" class="form-label">{{ __('messages.name ar') }}</label>
              <input type="text" class="form-control" name="name_ar"  value="{{ $offer->name_ar }}">
              @error('name_ar')
              <small class='text-danger text-center text-small'>
                    {{ $message }}
                </small>
              @enderror
            </div>
            <div class="col-sm-12">
              <label for="lastName" class="form-label">{{ __('messages.price') }}</label>
              <input type="text" class="form-control" name="price"  value="{{ $offer->price }}" >
              @error('price')
               <small class='text-danger text-center text-small' >
                {{ $message }}
               </small>
            @enderror

            </div>
            <div class="col-sm-12">
                <label for="lastName" class="form-label">{{ __('messages.details en') }}</label>
                <input type="text" class="form-control" name="details_en" id="lastName" value="{{ $offer->details_en }}" >
                @error('details_en')
                <small class='text-danger text-center text-small'>
                    {{ $message }}
                </small>
                @enderror

              </div>
              <div class="col-sm-12">
                <label for="lastName" class="form-label">{{ __('messages.details ar') }}</label>
                <input type="text" class="form-control" name="details_ar" id="lastName" value="{{ $offer->details_ar }}"  >
                @error('details_ar')
                <small class='text-danger text-center text-small'>
                    {{ $message }}
                </small>
                @enderror

              </div>


          <button class="w-100 btn btn-primary btn-lg" offer_id = "{{ $offer->id }}" id="edit_btn" type="submit">{{ __('messages.edit table') }}</button>
        </form>
      </div>
    </div>
  </main>
  @stop


  @section('scripts')
    <script>
          $(document).on('click','#edit_btn',function(e){

                e.preventDefault();

                var offer_id = $('#edit_btn').attr('offer_id');

                $.ajax({

                type: "POST",
                url: "{{ route('ajax.offers.store') }}",
                data: {
                  '_token' : "{{ csrf_token() }}",
                  'id' :offer_id
                },

                success: function (data) {

             

              },
              error: function (xhr) {
                  alert(xhr.responseText); // Display error message
              }
              });


          });


    </script>

  @stop


