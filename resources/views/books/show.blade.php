@extends('layouts.navbar')

@section('content')
    <div class="container">

        <div class="container mt-5">

            <div class="row">
                <h4>{{ $book->title }}</h3>

            </div>
            <div class="row mt-3">
                <div class="col-sm-3 mb-3">
                    <img src="{{ asset('/storage/images/books/' . $book->main_image) }}"
                        class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                        alt="">
                </div>
                <div class="col-sm-7">
                    <p class="text-justify" style="white-space: pre-line">{{ $book->passage }}</p>
                </div>
                <div class="col-sm-2">
                    <h3 class="">€@convert($book->price)</h3>


                    <form action="{{ route('addbook') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $book->id }}" name="book_id">

                        <div class="form-group">
                            <label for="nr_of_books">Aantal boeken</label>
                            <select class="form-control" name="book_count" id="book_count">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>

                            </select>
                        </div>

                        <p class="text-justify" style="font-size:0.8rem">Bij aanschaf van 2 of meer dezelfde /verschillende
                            boeken ontvangt u 5 euro korting</p>
                        <button title="Toevoegen aan winkelwagen" class='btn btn-default p-0' type='submit' value='submit'>
                            <i style="font-size: 3rem;color:#ffcc00" class='bi bi-cart-plus-fill fa-lg'> </i>
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>

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
