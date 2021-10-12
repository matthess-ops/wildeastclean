@extends('layouts.admin')

@section('content')
  <h1>admin Overig producten</h1>

  <div class="container">
    <h3>index of overige producten</h3>
    <a href="{{ route('createOverigeProduct') }}" class="btn btn-primary">Overige product toevoegen</a>
    {{-- createOverigeProduct --}}


    <div class="row">
        @foreach ($overigeProducts as $overigeProduct)

        <div class="card" style="width: 18rem;">

         
            <img class="card-img-top"
            src="{{ asset('/storage/images/overigeProducts/'.$overigeProduct->main_image) }}"
            alt="Card image cap">

            <div class="card-body">
              <h5 class="card-title">{{$overigeProduct->title}}</h5>
              <p class="card-text">{{$overigeProduct->description}}</p>
              <form action='{{ route('deleteOverigeProduct', ['id' => $overigeProduct->id]) }}' method="post">
                @csrf
              <div class="form-group">
                {{ method_field('delete') }}
                <input class="btn btn-primary" type="submit" value="Overige product verwijderen">

              </div>
              </form>


              <form action='{{ route('editOverigeProduct', ['id' => $overigeProduct->id]) }}' method="post">
                @csrf
              <div class="form-group">
                {{ method_field('patch') }}
                <input class="btn btn-primary" type="submit" value="Overige product aanpassen">

              </div>
              </form>
            </div>
          </div>
        @endforeach

    </div>


    

</div>

@endsection