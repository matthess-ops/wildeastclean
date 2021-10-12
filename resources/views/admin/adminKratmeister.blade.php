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
    <a href="{{ route('createKratmeister') }}" class="btn btn-primary">Kratmeister template toevoegen</a>
  </div>

</div>

    <div class="row">
      @foreach ($kratmeisters as $kratmeister)
          <div class="col-sm-4 mt-3 d-flex align-items-stretch">
              <div class="card border-dark">

                  <h5 class="card-header">{{ $kratmeister->title }}</h5>
                  <div class="card-body">

                    <div class="form-group">

                      <img src="{{ asset('/storage/images/kratmeisters/' . $kratmeister->front_label_image) }}"
                          class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                          alt="">
                        </div>

                      <div class="form-group">
                        <form action='{{ route('deleteKratmeister', ['id' => $kratmeister->id]) }}' method="post">
                          @csrf
                        <div class="form-group">
                          {{ method_field('delete') }}
                          <input class="btn btn-primary" type="submit" value="Kratmeister verwijderen">

                        </div>
                        </form>
                      </div>


                      <div class="form-group">
                        <form action='{{ route('editKratmeister', ['id' => $kratmeister->id]) }}' method="post">
                          @csrf
                        <div class="form-group">
                          {{ method_field('patch') }}
                          <input class="btn btn-primary" type="submit" value="Kratmeister aanpassen">

                        </div>
                        </form>
                      </div>

                  </div>

              </div>
          </div>
      @endforeach


  </div>


  </div>

  @endsection


{{-- <h1>admin kratmeister</h1>

<div class="container">
  <h3>index of kratmeisters</h3>
  <a href="{{ route('createKratmeister') }}" class="btn btn-primary">Kratmeister template toevoegen</a>



  <div class="row">
      @foreach ($kratmeisters as $kratmeister)

      <div class="card" style="width: 18rem;">

          <img class="card-img-top"
          src="{{ asset('/storage/images/kratmeisters/'.$kratmeister->front_label_image) }}"
          alt="Card image cap">

          <div class="card-body">
            <h5 class="card-title">{{$kratmeister->title}}</h5>
            <p class="card-text">{{$kratmeister->back_label_text}}</p>
            <form action='{{ route('deleteKratmeister', ['id' => $kratmeister->id]) }}' method="post">
              @csrf
            <div class="form-group">
              {{ method_field('delete') }}
              <input class="btn btn-primary" type="submit" value="Kratmeister verwijderen">

            </div>
            </form>


            <form action='{{ route('editKratmeister', ['id' => $kratmeister->id]) }}' method="post">
              @csrf
            <div class="form-group">
              {{ method_field('patch') }}
              <input class="btn btn-primary" type="submit" value="Kratmeister aanpassen">

            </div>
            </form>
          </div>
        </div>
      @endforeach

  </div>




</div> --}}
