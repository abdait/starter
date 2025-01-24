
@extends('layouts.ajax')

@section('content')

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

    <div class="alert alert-success"  id="seccess_msg" style="display: none">
         the offer add Successfully
      </div>
    <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">{{ __('messages.offers') }}</h4>
      <form class="needs-validation"  id="offer_form"  >
        <div class="row g-3">
          @csrf
          <div class="col-sm-12">
              <label for="firstName" class="form-label">{{ __('messages.photo') }}</label>
              <input type="file" class="form-control" name="photo" >
              @error('photo')
              <small class='text-danger text-center text-small'>
                    {{ $message }}
                </small>
              @enderror
            </div>
          <div class="col-sm-12">
            <label for="firstName" class="form-label">{{ __('messages.name en') }}</label>
            <input type="text" class="form-control" name="name_en" >
            @error('name_en')
            <small class='text-danger text-center text-small'>
                  {{ $message }}
              </small>
            @enderror
          </div>
          <div class="col-sm-12">
            <label for="firstName" class="form-label">{{ __('messages.name ar') }}</label>
            <input type="text" class="form-control" name="name_ar" >
            @error('name_ar')
            <small class='text-danger text-center text-small'>
                  {{ $message }}
              </small>
            @enderror
          </div>
          <div class="col-sm-12">
            <label for="lastName" class="form-label">{{ __('messages.price') }}</label>
            <input type="text" class="form-control" name="price"   >
            @error('price')
             <small class='text-danger text-center text-small' >
              {{ $message }}
             </small>
          @enderror

          </div>
          <div class="col-sm-12">
              <label for="lastName" class="form-label">{{ __('messages.details en') }}</label>
              <input type="text" class="form-control" name="details_en" id="lastName"  >
              @error('details_en')
              <small class='text-danger text-center text-small'>
                  {{ $message }}
              </small>
              @enderror

            </div>
            <div class="col-sm-12">
              <label for="lastName" class="form-label">{{ __('messages.details ar') }}</label>
              <input type="text" class="form-control" name="details_ar" id="lastName"  >
              @error('details_ar')
              <small class='text-danger text-center text-small'>
                  {{ $message }}
              </small>
              @enderror

            </div>


        <button class="w-100 btn btn-primary btn-lg" id="save_offers">{{ __('messages.save') }}</button>
      </form>
    </div>
  </div>
</main>
@stop

@section('scripts')
  <script>
        $(document).on('click','#save_offers',function(e){
              
              e.preventDefault(); 
              var form_data = new FormData($('#offer_form')[0]);

              $.ajaxSetup({
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                          });

              $.ajax({
              
              type: "POST",
              enctype:"multipart/form-data",
              url: "{{ route('ajax.offers.store') }}",
              data: form_data,
              processData:false,
              contentType:false,
              cache:false,
              success: function (data) {
                if (data.status==true){

                  $('#seccess_msg').show();
                }
              
            },
            error: function (xhr) {
                alert(xhr.responseText); // Display error message
            }
            });


        });
       

  </script> 

@stop