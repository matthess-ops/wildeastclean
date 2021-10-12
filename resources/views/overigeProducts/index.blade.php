@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h3>index of overige prodcuten</h3>


        {{-- <div class="row">
            @foreach ($overigeProducts as $overigeProduct)

            <div class="card" style="width: 18rem;">

           
                <img class="card-img-top"
                src="{{ asset('/storage/images/overigeProducts/'.$overigeProduct->main_image) }}"
                alt="Card image cap">

                <div class="card-body">
                  <h5 class="card-title">{{$overigeProduct->title}}</h5>
                  <p class="card-text">{{$overigeProduct->description}}</p>
                  <a href="#" class="btn btn-primary">Meer...</a>
                </div>
              </div>
            @endforeach

        </div> --}}


        

    </div>
@endsection
