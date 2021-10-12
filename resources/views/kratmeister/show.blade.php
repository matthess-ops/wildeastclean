@extends('layouts.navbar')

@section('content')
    <script src="{{ asset('js/show.js') }}" defer></script>

    <script>
        const beerbrands = @json($beerbrands);
        const kratmeister = @json($kratmeister);
        // const errors = @json($errors);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" />



    <div class="container">

        <div class="row">
            <h3>{{ $kratmeister->title }}</h3>

        </div>


        <div class="row mt-2">

            <div class="col-lg-3">

                <a class="example-image-link "
                    href="{{ asset('/storage/images/kratmeisters/' . $kratmeister->front_label_image) }}"
                    data-lightbox="example-set"><img class="example-image img-fluid resize_image_md"
                        src="{{ asset('/storage/images/kratmeisters/' . $kratmeister->front_label_image) }}" />
                </a>

                <p class="text-center">Etiket van het flesjes (8 x 8 cm)</p>


                <div class="d-flex justify-content-center">
                    {{-- {{-- {{print_r(json_decode($kratmeister->carousel_images, true)[0],true)}} --}}
                    @if (count(json_decode($kratmeister->carousel_images, true)[0])>0)
                    @foreach (json_decode($kratmeister->carousel_images, true) as $carousel_image)
                    <a class="example-image-link "
                        href="{{ asset('/storage/images/kratmeisters/' . $carousel_image[0]) }}"
                        data-lightbox="example-set" data-title="{{ $carousel_image[1] }}"><img class="example-image"
                            style="width:50px; height:50px; margin:2px"
                            src="{{ asset('/storage/images/kratmeisters/' . $carousel_image[0]) }}"
                            alt="Golden Gate Bridge with San Francisco in distance" />
                    </a>

                @endforeach
                    @endif

            </div>



            </div>




            <div class="col-lg-6 sm_margin_top">
                <label class = "text-justify">U kunt hier uw bierkrat samenstellen door onderstaande stappen te doorlopen. Vervolgens kunt u de bestelling plaatsen.</label>
                <h4 class="mt-2 mb-2">Personalisatie</h4>

                <form action="{{ route('addkratmeister') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class = "text-justify" for="beerbrand">Hoe moet het bier heten? (Typ hier uw zelfbedachte naam voor het bierkrat)</label>
                        <input type="text" value="{{ old('name_user') }}" class="form-control" name="name_user"
                            id="name_user" placeholder="Bennie Ruighaver Pils">
                        @error('name_user')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <label  class = "text-justify mt-2">Wie komt er op het flesje en de zijkant van het krat? (Upload hier de foto van een persoon naar keuze. Het gezicht van deze persoon verwerken we in het etiket en op de zijkant van het krat.)</label>


                    <div class="form-group custom-file">

                        <label class="custom-file-label" id="user_uploaded_image_label" for="user_uploaded_image"> Kies
                            foto</label>

                        <input type="file" class="custom-file-input" id="user_uploaded_image" name="user_uploaded_image"
                            accept="image/*">
                        @error('user_uploaded_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <br>

                        <label class="text-justify" for="back_label_text">Etikettekst (Hieronder staat al een standaardtekst. Kiest u voor deze tekst, dan kunt u deze stap overslaan. De door u opgegeven biernaam wordt dan verwerkt in de onderstaande tekst. U kunt ook zelf een tekst invoeren)</label>
                        <textarea type="text" name="back_label_text" id="back_label_text" class="form-control"
                            placeholder="" aria-describedby="helpId" rows="10">{{ $errors->any() ? old('back_label_text') : $kratmeister->back_label_text }}
                                    </textarea>
                        @error('back_label_text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mt-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Gebruikte tekens: </span><span id="usedChars">0</span><span>/</span><span
                                    id="maxChars">0</span>
                                </div>

                                <div class="col-sm-6 ">
                                    <input name="reset" id="reset" class="btn btn-primary float-md-right" type="button"
                                value="Terug naar oorspronkelijke tekst.">
                                </div>
                            </div>




                        </div>



                    </div>

                    <div>


                        <label for="product_specifications">Productspecificaties:</label>
                        <ul id="product_specifications_list">
                            <li>Inhoud krat: 24 flesjes x 33cl</li>
                            <li>Levertijd: 4 à 5 werkdageen</li>

                        </ul>
                    </div>

                    {{-- <div> --}}

{{--
                        <label for="personalisatie_list">Alle personalisatie</label>
                        <ul id="personalisatie_list">
                            <li>“Naam van uw biermerk / ontvanger van het cadeau.” op krat stickers</li>
                            <li>Gezicht van de persoon in kwestie vervangt het gezicht van Bennie Ruighaver.</li>
                            <li>Gepersonaliseerd back label tekst.</li>
                        </ul>
                    </div>

                    <div>
                        <label for="bestel_opties">Bestel opties</label>
                        <ul id="bestel_opties">
                            <li>Alleen de stickers voor een sixpack blikjes - (6x front en back label stickers, 4 sixpack
                                karton stickers)</li>
                            <li>Alleen de stickers voor een sixpack flesjes - (6x front en back label stickers, 4 sixpack
                                karton stickers)</li>
                            <li>Alleen de stickers voor een kratje - (24x front en back label stickers, 4 sixpack krat
                                stickers)</li>
                            <li>Sixpack blikjes beplakt met alle stickers.</li>
                            <li>Sixpack flesjes beplakt met alle stickers.</li>
                            <li>Krat bier beplakt met alle stickers.</li>
                        </ul>
                    </div> --}}




            </div>




            <div class="col-lg-3 mt-4 mt-lg-0">

                {{-- <div class="row">
                    <div class="col">
                        <h5>Prijs:€30,00 </h5>
                <h6>€30,00</h6>
                    </div>
                    <div class="col">
                        <h5>Verzendkosten: €10,00 </h5>
                <h6>€10,00</h6>
                    </div>

                </div> --}}

                <div class="row">
                    <div class="col-6">
                        <h5>Prijs:</h5>
                    </div>

                    <div class="col-6">
                        <h5 class = "float-right">€30.00</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h5>Verzendkosten:</h5>
                    </div>

                    <div class="col-6">
                        <h5 class = "float-right">€10.00</h5>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-6">
                        <h5 class="font-weight-bold" >Totaal:</h5>
                    </div>

                    <div class="col-6">
                        <h5 class="font-weight-bold  float-right">€40,00</h5>
                    </div>
                </div>


                {{-- <h5>Prijs:€30.00 </h5> --}}
                {{-- <h5>Verzendkosten: €10.00 </h5> --}}

                {{-- <h5>Prijs: </h5>
                <h6>€30,00</h6>

                <h5>Verzendkosten: </h5>
                <h6>€10,00</h6> --}}







                {{-- uncomment this code when you want to give customer other choices products --}}

                {{-- <div class="form-group">
                    <label for="packageSize">Labels voor</label>
                    <select class="form-control" name="packageSize" id="packageSize">

                    </select>
                    @if ($errors->any())
                        <div class="alert alert-danger">Voer opnieuw in</div>

                    @endif
                </div> --}}

                {{-- <div class="form-group">
                    <label for="beerBrandSelect">Biermerk</label>
                    <select class="form-control" name="beerbrand_id" id="beerBrandSelect">

                    </select>
                    @if ($errors->any())
                    <div class="alert alert-danger">Voer opnieuw in</div>

                @endif
                </div> --}}

                {{-- <h3>Totaal prijs</h3>
                <h4 id="totalPrice">{{ $kratmeister->single_can_price }}</h4> --}}
                <input type="hidden" value="{{ $kratmeister->id }}" name="kratmeister_id">
                <input type="hidden" value="beercase_price" name="packageSize">
                <input type="hidden" value="1" name="beerbrand_id">




                <button title="Toevoegen aan winkelwagen" class='btn btn-default pl-0' type='submit' value='submit'>
                    <i style="font-size: 3rem;color:#ffcc00" class='bi bi-cart-plus-fill fa-lg '> </i>
                </button>
                </form>



            </div>









        </div>





    </div>




    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>



@endsection
