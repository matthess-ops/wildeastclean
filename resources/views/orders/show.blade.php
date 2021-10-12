@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h3>Klant gegevens</h3>

                <dl class="row">

                    <dt class="col-sm-4">Voornaam</dt>
                    <dd class="col-sm-8">{{ $order->firstname }}</dd>

                    <dt class="col-sm-4">Achternaam</dt>
                    <dd class="col-sm-8">{{ $order->lastname }}</dd>

                    <dt class="col-sm-4">Straat</dt>
                    <dd class="col-sm-8">{{ $order->streetname }}</dd>

                    <dt class="col-sm-4">Huisnummer</dt>
                    <dd class="col-sm-8">{{ $order->housenumber }}</dd>

                    <dt class="col-sm-4">Plaats</dt>
                    <dd class="col-sm-8">{{ $order->city }}</dd>

                    <dt class="col-sm-4">Postcode</dt>
                    <dd class="col-sm-8">{{ $order->postcode }}</dd>

                    <dt class="col-sm-4">Telefoon</dt>
                    <dd class="col-sm-8">{{ $order->phonenumber }}</dd>

                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ $order->email }}</dd>

                </dl>
            </div>



            <div class="col-md-6">
                <h3>Order data</h3>

                <dl class="row">

                    <dt class="col-sm-4">Database ID</dt>
                    <dd class="col-sm-8">{{ $order->id }}</dd>

                    <dt class="col-sm-4">Mollie ID</dt>
                    <dd class="col-sm-8">{{ $order->mollie_id }}</dd>

                    <dt class="col-sm-4">Bestelbedrag</dt>
                    <dd class="col-sm-8">{{ $order->total_order_price }}</dd>

                    <dt class="col-sm-4">Status</dt>
                    <dd class="col-sm-8">{{ $order->paymentStatus }}</dd>



                </dl>


            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <h3 class="mt-5">Boeken</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Boek ID</th>
                            <th scope="col">Titel</th>
                            <th scope="col">Aantal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($order->book_orders)

                            @foreach (json_decode($order->book_orders, true) as $book)
                                <tr>
                                    <td>{{ $book['book_id'] }}</td>
                                    <td>{{ $book['book_title'] }}</td>
                                    <td>{{ $book['book_count'] }}</td>
                                </tr>
                            @endforeach
                        @endisset

                    </tbody>
                </table>

            </div>


        </div>



        <hr class="mt-10 mb-10" />





        <h3 class="mt-5">Kratmeisters</h3>

        @isset($order->kratmeister_orders)
            @foreach (json_decode($order->kratmeister_orders, true) as $kratmeister_order)
                <hr class="mt-10 mb-10" />

                <div class="row">
                    <div class="col-md-6">

                        <dl class="row">

                            <dt class="col-sm-4">Kratmeister template</dt>
                            <dd class="col-sm-8">{{ $kratmeister_order['kratmeister_sticker_title'] }}</dd>

                            <dt class="col-sm-4">Kratmeister ID</dt>
                            <dd class="col-sm-8">{{ $kratmeister_order['kratmeister_id'] }}</dd>

                            <dt class="col-sm-4">Naam op krat/label</dt>
                            <dd class="col-sm-8">{{ $kratmeister_order['name_user'] }}</dd>

                            <dt class="col-sm-4">Bier merkt</dt>
                            <dd class="col-sm-8">{{ $kratmeister_order['kratmeister_beer_brand'] }}</dd>

                            <dt class="col-sm-4">Verpakking size</dt>

                            @switch($kratmeister_order['packageSize'])
                                @case('single_can_price')
                                    <dd class="col-sm-8">1 Blikje</dd>

                                @break
                                @case('single_small_bottle_price')
                                    <dd class="col-sm-8">1 Flesje</dd>
                                @break

                                @case('single_large_bottle_price')
                                    <dd class="col-sm-8">0.75l fles</dd>
                                @break
                                @case('sixpack_bottle_price')
                                    <dd class="col-sm-8">sixpack flesjes</dd>
                                @break
                                @case('beercase_price')
                                    <dd class="col-sm-8">1 krat</dd>
                                @break
                                @case('single_large_bottle_price')
                                    <dd class="col-sm-8">0.75l fles</dd>
                                @break
                                @default

                            @endswitch

                            <dt class="col-sm-4">Download photo</dt>
                            <dd class="col-sm-8">

                                <a class="btn btn-success"
                                    href="{{ route('getfile', ['filename' => $kratmeister_order['user_photo_path'], 'username' => 'KratmeisterID-' . $kratmeister_order['kratmeister_id'] . '-OrderID-' . $order->id . '-' . $kratmeister_order['name_user']]) }}">Download
                                    foto</a>


                            </dd>



                        </dl>


                    </div>

                    <div class="col-md-6">

                        {{ $kratmeister_order['back_label_text'] }}


                    </div>
                </div>

            @endforeach
        @endisset

        <form action="{{ route('updateOrder', ['id' => $order->id]) }}" method="POST">
            <button class="btn btn-primary" type="submit" name="action" value="shipped">Markeren als verzonden</button>
            <button class="btn btn-primary" type="submit" name="action" value="retour">Markeren als geretourneerd</button>
        </form>
    </div>




@endsection
