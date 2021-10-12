

@extends('layouts.navbar')

@section('content')


    <div class="container">
        <img src="{{ asset('/storage/images/other_images/kratmeister logog.png') }}"
            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">

        <div class="row">
            <div class="col-sm-3 justify-content-center">
                <img src="{{ asset('/storage/images/other_images/gert_standaard_400.jpg') }}"
                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                <h3 class="text-center">Bennier Ruighaver</h3>
            </div>
            <div class="col-sm-9">
                <p class="text-justify">
                    Om indruk op elkaar te maken scheppen mannen graat op. Zet een paar kerels samen en al snel hoor je zinnen voorbij komen als: 'Ik heb de nieuwste Audi.' Of: 'Ik heb een zwembad in de tuin.' Of: 'Ik heb een eigen bedrijf.' Dit soort opschepperijen zijn allemaal leuk en aardig, maar je maakt pas echt indruk als je kunt zeggen: 'Ik heb een eigen biermerk.'
                    <br><br>
                    Een eigen biermerk. Iederen man droomt ervan. Maar stamp maar eens een eigen bierfabriek uit de grond. Daarin slagen slechts enkelingen, zoals Freddy Heineken, Eddy Warsteiner en Gait-jan Grolsch. Gelukkig is het ontwikkelenn van een eigen bier vanaf heden een stuk eenvoudiger. Op deze pagina kunt u door middel van enkele simpele muisklikken uw eigen op maat gemaakte bierkrat samenstellen. U kiest hieronder een passende vormgeving. Vervolgens doorloopt u de verschillende stappen van het keuzemenu.
                    <br><br>
                    We hebben Bennie Ruighaver bereid gebonden om model te staan voor een zestal vormgevingen van het bierkrat. Hieronder staan ze weergegeven. U kunt een van de zes vormgevingen uitkiezen voor uw eigen bierkrat.

                </p>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col text-center">
                <h3 class="h3_title " style="margin-left: 15px">Kies hier een passende vormgeving voor uw bierkrat</h3>

            </div>
        </div>


        <div class="row">
            @foreach ($kratmeisters as $kratmeister)

                <div class="col-sm-4 mt-3 d-flex align-items-stretch">
                    <div class="card border-dark">
                      <a style="text-decoration: none;     color: black; " href="{{ route('showKratmeister',['id' => $kratmeister->id]) }}">

                        <h5 class="card-header">{{ $kratmeister->title }}</h5>
                        <div class="card-body">
                            <img src="{{ asset('/storage/images/kratmeisters/' . $kratmeister->front_label_image) }}"
                                class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                alt="">


                        </div>
                      </a>
                    </div>
                </div>
            @endforeach


        </div>

    </div>
@endsection
