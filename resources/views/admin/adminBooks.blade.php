@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-12">
                <h4>Kratmeister control panel</h4>

            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <a href="{{ route('createBook') }}" class="btn btn-primary">Boek toevoegen</a>
            </div>

        </div>

        @foreach ($books as $book)
            <div class="container mt-5">
                <div class="row ">

                    <div class="col-sm-3">
                        <a href="{{ route('showBook', ['id' => $book->id]) }}">
                            <img src="{{ asset('/storage/images/books/' . $book->main_image) }}"
                                class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                alt="">
                    </div>
                    </a>

                    <div class="col-sm-7">
                        <a style="text-decoration: none;     color: black; "
                            href="{{ route('showBook', ['id' => $book->id]) }}">

                            <h3>{{ $book->title }}</h3>
                            <p class="text-justify mt-3">{{ $book->description }}</p>
                        </a>

                    </div>
                    <div class="col-sm-2">
                        <h3 class="mt-5">€@convert($book->price)</h3>
                        <div class="form-group">
                            <form action='{{ route('deleteBook', ['id' => $book->id]) }}' method="post">
                                @csrf
                                {{ method_field('delete') }}
                                <input class="btn btn-primary" type="submit" value="boek verwijderen">

                            </form>
                        </div>

                        <div class="form-group">

                            <form action='{{ route('editBook', ['id' => $book->id]) }}' method="post">
                                @csrf
                                {{ method_field('patch') }}
                                <input class="btn btn-primary" type="submit" value="boek aanpassen">

                            </form>



                        </div>
                    </div>
                </div>

        @endforeach

    </div>

@endsection


{{-- <h3>index of books</h3>
    <a href="{{ route('createBook') }}" class="btn btn-primary">Boek toevoegen</a>



    <div class="row">
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
