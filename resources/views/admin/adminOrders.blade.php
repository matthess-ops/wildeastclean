@extends('layouts.admin')

@section('content')

    <div class="col-xs-1-12">


  
        <div class="row mb-2">
            <a class="mr-2 btn {{ $buttonHighlight == 'is_paid' ? 'btn-success' : 'btn-primary' }}"
                href="{{ route('filterOrders', ['id' => 'to_send']) }}" role="button">Betaalde orders</a>
            <a class="mr-2 btn {{ $buttonHighlight == 'all' ? 'btn-success' : 'btn-primary' }} "
                href="{{ route('filterOrders', ['id' => 'all']) }}" role="button">Alle orders</a>
            <a class="mr-2 btn {{ $buttonHighlight == 'problem' ? 'btn-success' : 'btn-primary' }}"
                href="{{ route('filterOrders', ['id' => 'other']) }}" role="button">Problematische orders</a>
            <a class="mr-2 btn {{ $buttonHighlight == 'shipped' ? 'btn-success' : 'btn-primary' }}"
                href="{{ route('filterOrders', ['id' => 'shipped']) }}" role="button">Verzonden orders</a>

                <form method="GET" action="{{ route('searchOrders') }}" class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="zoek mollie/order id" aria-label="Search" name="search">
                  <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                </form>

             



        </div>


        <div class="row">
          {{ $orders->links() }}

        

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Order details</th>

                        <th scope="col">besteldatum</th>

                        <th scope="col">status</th>
                        <th scope="col">db_id</th>
                        <th scope="col">mollie_id</th>
                        <th scope="col">bestel bedrag</th>
                        <th scope="col">kratmeister</th>
                        <th scope="col">boek</th>

                    </tr>
                </thead>


                <tbody>

                    @foreach ($orders as $order)
                        <tr>


                            <td> <a href="{{ route('showOrder', ['id' => $order->id]) }}"
                                    class="btn btn-primary">Details</a></td>


                            <td href="{{ route('showOrder', ['id' => $order->id]) }}">{{ $order->created_at }}</td>


                            <td>{{ $order->paymentStatus }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->mollie_id }}</td>
                            <td>{{ $order->total_order_price }}</td>
                            <td>{{ $order->kratmeister_orders != null ? 'yes' : 'no' }}</td>
                            <td>{{ $order->book_orders != null ? 'yes' : 'no' }}</td>

                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>

    </div>


@endsection
