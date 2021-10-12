@extends('layouts.admin')

@section('content')

  <div class="container">
    <h3>Bier control panel</h3>

    <p class="text-danger">Als een biermerk bv geen grote fles en/of sixpack blikjes heeft moet je de prijs op 0 zetten
      want dan worden deze niet als optie gegeven aan de klant.
  </p>

    <a href="{{ route('createBeerbrand') }}" class="btn btn-primary">Bier merk toevoegen</a>

    @if($errors->any())

    <h4>De onderstaande velden moeten een waarder hebben van nul of hoger</h4>

    @foreach (json_decode($errors) as $error )
    <div class="alert alert-danger">{{ $error[0]  }}</div>

    @endforeach


@endif


    <form action="{{ route('storeBeerbrand') }}" method="POST">
      @csrf

    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th data-field="test">bier merk</th>
          <th scope="col">enkel blikje prijs</th>
          <th scope="col">enkel flesje prijs</th>
          <th scope="col">0.75 cl fles prijs</th>
          <th scope="col">sixpack blikjes prijs</th>
          <th scope="col">sixpack flesjes prijs</th>
          <th scope="col">kratje bier prijs</th>
          <th scope="col">verwijder bierbrand</th>

          


        </tr>
      </thead>


      <tbody>

        @foreach ($beerbrands as $beerbrand )
          
        <tr>
          <td>{{$beerbrand->id}}</td>
          <td><input type="text" name={{$beerbrand->id."&beerbrand"}}  id={{$beerbrand->id."&beerbrand"}}   value= {{$beerbrand->beerbrand}} class="form-control"></td>

   
          <td><input type="float" min="0" name={{$beerbrand->id."&single_can_price"}}  id={{$beerbrand->id."&single_can_price"}}   value= {{$beerbrand->single_can_price}} class="form-control"></td>

          <td><input type="float" min="0" name={{$beerbrand->id."&single_small_bottle_price"}}  id={{$beerbrand->id."&single_small_bottle_price"}}   value= {{$beerbrand->single_small_bottle_price}} class="form-control"></td>

          <td><input type="float" min="0" name={{$beerbrand->id."&single_large_bottle_price"}}  id={{$beerbrand->id."&single_large_bottle_price"}}   value= {{$beerbrand->single_large_bottle_price}} class="form-control"></td>

          <td><input type="float" min="0" name={{$beerbrand->id."&sixpack_can_price"}}  id={{$beerbrand->id."&sixpack_can_price"}}   value= {{$beerbrand->sixpack_can_price}} class="form-control"></td>

          <td><input type="float" min="0" name={{$beerbrand->id."&sixpack_bottle_price"}}  id={{$beerbrand->id."&sixpack_bottle_price"}}   value= {{$beerbrand->sixpack_bottle_price}} class="form-control"></td>

          <td><input type="float" name={{$beerbrand->id."&beercase_price"}}  id={{$beerbrand->id."&beercase_price"}}   value= {{$beerbrand->beercase_price}} class="form-control"></td>
          <td>   <input class="form-check-input" name={{$beerbrand->id."&delete"}} type="checkbox" value="" id="flexCheckDefault"></td>

      

          



        </tr>
        @endforeach

       
      </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Opslaan</button>

    </form>

    







    {{-- <div class="row">
        @foreach ($books as $book)

        <div class="card" style="width: 18rem;">

         
            <img class="card-img-top"
            src="{{ asset('/storage/images/books/'.$book->main_image) }}"
            alt="Card image cap">

            <div class="card-body">
              <h5 class="card-title">{{$book->title}}</h5>
              <p class="card-text">{{$book->description}}</p>
              <form action='{{ route('deleteBook', ['id' => $book->id]) }}' method="post">
                @csrf
              <div class="form-group">
                {{ method_field('delete') }}
                <input class="btn btn-primary" type="submit" value="boek verwijderen">

              </div>
              </form>


              <form action='{{ route('editBook', ['id' => $book->id]) }}' method="post">
                @csrf
              <div class="form-group">
                {{ method_field('patch') }}
                <input class="btn btn-primary" type="submit" value="boek aanpassen">

              </div>
              </form>
            </div>
          </div>
        @endforeach

    </div> --}}


    

</div>

@endsection