@extends('layouts.navbar')

@section('content')
    <div class="container">

        @php
            $totalPrice = 0;
            $boekenCount = 0;
        @endphp

        @if (Session::get('sessionBooksb') == null && Session::get('sessionKratmeistertest') == null)
            <h4>Er zitten geen producten in de winkelwagen</h4>
        @else

        @if (Session::get('sessionBooksb') != null)

        <h4>Boeken</h4>


        <form action="{{ route('updatecart') }}" method="POST">
            @csrf


            <div class="row">


                <div class="table-responsive">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Titel</th>
                                <th scope="col">Prijs</th>
                                <th scope="col">Aantal</th>
                                <th scope="col">Prijs totaal</th>
                                <th scope="col">Verwijder bestelling</th>

                            </tr>
                        </thead>





                        @if (Session::get('sessionBooksb') != null)
                            <tbody>

                                @foreach (json_decode(Session::get('sessionBooksb'), true) as $book)
                                    @php
                                        $totalPrice = $totalPrice + $book['book_price'] * $book['book_count'];
                                        $boekenCount = $boekenCount + $book['book_count'];
                                    @endphp
                                    <tr>
                                        <td>{{ $book['book_id'] }}</td>
                                        <td>{{ $book['book_title'] }}</td>
                                        <td>€@convert($book['book_price'])</td>
                                        <td><input type="number" min="1" name={{ $book['book_id'] . '&count&book' }}
                                                id={{ $book['book_id'] . '&count&book' }}
                                                value={{ $book['book_count'] }} class="form-control"></td>
                                        <td>€@convert($book['book_price']*$book['book_count'])</td>

                                            <td><div class="form-check">
                                                <input class="form-check-input" name={{ $book['book_id'] . '&delete&book' }}
                                                type="checkbox" value="" id={{ $book['book_id'] . '&delete&book' }}></td>
                                            </div></td>
                                    </tr>
                                @endforeach


                            </tbody>
                        @endif

                    </table>
                </div>
            </div>
            @endif


            <div class="row">

                @if (Session::get('sessionKratmeistertest') != null)

                <h4>De Kratmeister</h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">Naam</th>
                                <th scope="col">De Kratmeister</th>
                                {{-- <th scope="col">Bier merk </th>
                                <th scope="col">Labels voor</th>
                                <th scope="col">Kratmeister label prijs</th>
                                <th scope="col">Bier prijs</th> --}}
                                <th scope="col">Prijs</th>
                                <th scope="col">Verwijder bestelling</th>

                            </tr>
                        </thead>

                        {{-- {{dd($request->all())}} --}}
                        @if (Session::get('sessionKratmeistertest') != null)

                            <tbody>

                                @foreach (json_decode(Session::get('sessionKratmeistertest'), true) as $kratmeister)
                                    @php($totalPrice = $totalPrice + ($kratmeister['kratmeister_sticker_price'] + $kratmeister['kratmeister_beer_price']))
                                    <tr>
                                        <td>{{ $kratmeister['name_user'] }}</td>
                                        <td>{{ $kratmeister['kratmeister_sticker_title'] }}</td>
                                        {{-- <td>{{ $kratmeister['kratmeister_beer_brand'] }}</td>

                                        @switch($kratmeister['packageSize'])
                                            @case('single_can_price')
                                                <td>1 Blikje</td>

                                            @break

                                            @case('single_small_bottle_price')
                                                <td>1 Flesje</td>
                                            @break

                                            @case('single_large_bottle_price')
                                                <td>0.75l fles</td>
                                            @break
                                            @case('sixpack_bottle_price')
                                                <td>sixpack flesjes</td>
                                            @break
                                            @case('sixpack_can_price')
                                            <td>sixpack blikjes</td>
                                        @break
                                            @case('beercase_price')
                                                <td>1 krat</td>
                                            @break
                                            @case('single_large_bottle_price')
                                                <td>0.75l fles</td>
                                            @break
                                            @default

                                        @endswitch
                                        <td>€@convert($kratmeister['kratmeister_sticker_price'])</td>
                                        <td>€@convert($kratmeister['kratmeister_beer_price'])</td> --}}

                                        <td>€@convert($kratmeister['kratmeister_sticker_price']+$kratmeister['kratmeister_beer_price'])
                                        </td>
                                        {{-- <td>  --}}
                                            {{-- <input class="form-check-input"
                                                name={{ str_replace(" ","-",$kratmeister['name_user'] . '&delete&kratmeister') }}
                                                type="checkbox" value=""
                                                id={{ str_replace(" ","-",$kratmeister['name_user'] . '&delete&kratmeister' )}}> --}}

                                            {{-- </td> --}}

                                                <td><div class="form-check">
                                                    <input class="form-check-input"
                                                    name={{ str_replace(" ","-",$kratmeister['name_user'] . '&delete&kratmeister') }}
                                                    type="checkbox" value=""
                                                    id={{ str_replace(" ","-",$kratmeister['name_user'] . '&delete&kratmeister' )}}>
                                                </div></td>

                                    </tr>



                                @endforeach


                            </tbody>
                        @endif
                    </table>
                </div>
                @endif

            </div>


            <div class="row mt-2">
                <button type="submit" class="btn btn-primary">Update winkelwagen</button>

            </div>


        </form>


        <div class="row mt-4">
            <p>Verzendkosten: €0,00</p>

        </div>

        <div class="row mt-2">
            <p>Boeken korting (bij aanschaf van 2 of meer boeken):
                @if ($boekenCount > 1)
                    €5,00
                    @php($totalPrice = $totalPrice - 5)

                @else
                    €0,00

                @endif


            </p>
        </div>

        <div class="row mt-2">
            <span>Totaal prijs: €@convert($totalPrice)</span>
        </div>
        <div class="row mt-2">
            {{-- Only show order button when price is above 0 euros, this should never happen --}}
            @if ($totalPrice > 0)
                <a class="btn btn-primary" href="{{ route('orderform') }}" role="button">Bestellen</a>

            @endif

        </div>


            @endif








    </div>
@endsection
