<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">



@extends('layouts.navbar')

@section('content')
    <div class="container">



            @foreach ($books as $book)
            <div class="container mt-5">
            <div class="row ">
              <div class="col-sm-3">
                <a href="{{ route('showBook',['id' => $book->id]) }}">
              <img src="{{ asset('/storage/images/books/'.$book->main_image) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">              </div>
              </a>

              <div class="col-sm-7">
                <a style="text-decoration: none;     color: black; " href="{{ route('showBook',['id' => $book->id]) }}">

                <h3 class= "book_title">{{$book->title}}</h3>
                <p class="text-justify mt-3">{{$book->description}}</p>
                              </a>

              </div>
              <div class="col-sm-2">
                  <div class="row ">
                      <div class="col justify-content-center  d-flex align-items-center book_price">
                        <h3 class="">€@convert($book->price)</h3>

                      </div>

                    <div class="col justify-content-center  d-flex align-items-center">
                        <form action="{{ route('addbook') }}" method="POST">
                            @csrf
                            <input type="hidden" value="1" name="book_count">

                            <input type="hidden" value="{{$book->id}}" name="book_id">

                            <button title="Toevoegen aan winkelwagen"  class='btn btn-default' type='submit' value='submit'>
                              <i style="font-size: 3rem;color:#ffcc00" class='bi bi-cart-plus-fill fa-lg'> </i>
                          </button>
                        </form>
                    </div>

                      </div>


              </div>
            </div>
          </div>

            @endforeach


    </div>
@endsection




{{-- @extends('layouts.navbar')

@section('content')
    <div class="container">
        <h3>index of books</h3>


        <div class="row">

            @foreach ($books as $book)

            <div class="card-column col-sm-6" style="">


                <img class="card-img-top"
                src="{{ asset('/storage/images/books/'.$book->main_image) }}"
                alt="Card image cap">

                <div class="card-body">
                  <h5 class="card-title">{{$book->title}}</h5>
                  <p class="card-text">{{$book->description}}</p>
                  <a href="#" class="btn btn-primary">Meer...</a>
                </div>
              </div>
            @endforeach

        </div>




    </div>
@endsection --}}

