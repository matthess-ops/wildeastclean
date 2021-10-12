@extends('layouts.navbar')




@section('content')

    <script>
        const beerbrands = @json($beerbrands);
        const kratmeister = @json($kratmeister);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" />



    <div class="container">


      <div class="row ">
        <div class="col-sm-3 image-set">
          <h3>prijs column</h3>
          {{-- <img src="{{ asset('/storage/images/kratmeisters/bennie_cowboy_600.jpg') }}"
          class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
          alt=""> --}}

          <a class="example-image-link "
                    href="{{ asset('/storage/images/kratmeisters/bennie_cowboy_600.jpg') }}"
                    data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img
                        class="example-image img-fluid"
                        src="{{ asset('/storage/images/kratmeisters/bennie_cowboy_600.jpg') }}"
                        alt="Golden Gate Bridge with San Francisco in distance" />
                      </a>

                      <a class="example-image-link "
                      href="{{ asset('/storage/images/kratmeisters/bennie_cowboy_600.jpg') }}"
                      data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img
                          class="example-image"
                          style = "width:50px; height:50px"
                          src="{{ asset('/storage/images/kratmeisters/bennie_cowboy_600.jpg') }}"
                          alt="Golden Gate Bridge with San Francisco in distance" />
                        </a>

                        <a class="example-image-link "
                        href="{{ asset('/storage/images/kratmeisters/bennie_cowboy_600.jpg') }}"
                        data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img
                            class="example-image"
                            style = "width:50px; height:50px"
                            src="{{ asset('/storage/images/kratmeisters/bennie_cowboy_600.jpg') }}"
                            alt="Golden Gate Bridge with San Francisco in distance" />
                          </a>

                          <a class="example-image-link "
                          href="{{ asset('/storage/images/kratmeisters/bennie_cowboy_600.jpg') }}"
                          data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img
                              class="example-image"
                              style = "width:50px; height:50px"
                              src="{{ asset('/storage/images/kratmeisters/bennie_cowboy_600.jpg') }}"
                              alt="Golden Gate Bridge with San Francisco in distance" />
                            </a>

                       
         
        </div>
        <div class="col-sm-6 bg-dark">
          <h3>text column</h3>

        </div>

        <div class="col-sm-3 bg-primary">
            <h3>prijs column</h3>
        </div>
      </div>

        {{-- <div class="image-row">
            <div class="image-set">
                <a class="example-image-link"
                    href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg/399px-Tour_Eiffel_Wikimedia_Commons.jpg"
                    data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img
                        class="example-image"
                        src="data:image/jpeg;base64,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"
                        alt="Golden Gate Bridge with San Francisco in distance" /></a>
                <a class="example-image-link"
                    href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg/399px-Tour_Eiffel_Wikimedia_Commons.jpg"
                    data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img
                        class="example-image"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg/399px-Tour_Eiffel_Wikimedia_Commons.jpg"
                        alt="Forest with mountains behind" /></a>
                <a class="example-image-link"
                    href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg/399px-Tour_Eiffel_Wikimedia_Commons.jpg"
                    data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img
                        class="example-image"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg/399px-Tour_Eiffel_Wikimedia_Commons.jpg"
                        alt="Bicyclist looking out over hill at ocean" /></a>
                <a class="example-image-link"
                    href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg/399px-Tour_Eiffel_Wikimedia_Commons.jpg"
                    data-lightbox="example-set"
                    data-title="Click anywhere outside the image or the X to the right to close."><img class="example-image"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg/399px-Tour_Eiffel_Wikimedia_Commons.jpg"
                        alt="Small lighthouse at bottom with ocean behind" /></a>
            </div>
        </div>

    </div> --}}


    <script>
        console.log("ASDFASDFASDFSFASF")
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>


@endsection
