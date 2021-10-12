@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Voeg een nieuw boek toe</h3>

        <form action="{{ route('storeBook') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">titel</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder=""
                    aria-describedby="helpId">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Boeken overzicht pagina omschrijving</label>
                <p class="text-danger">Let op dat je hier niet teveel tekst plaats, want dan wordt de pagina te rommelig  </p>
                <textarea  type="text" name="description" value="{{ old('description') }}" id="description" class="form-control" placeholder=""
                    aria-describedby="helpId" rows="3"></textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Blurb aint needed for now maybe something for later, set blurb nullable in the migration --}}
            {{-- <div class="form-group">
                <label for="blurb">blurb</label>
                <textarea type="text" name="blurb" value="{{ old('blurb') }}" id="blurb" class="form-control" placeholder="" aria-describedby="helpId" rows="10"></textarea>
                @error('blurb')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="form-group">
                <label for="passage">Hoofd pagina tekst/passage</label>
                <p class="text-danger">Hier kan je een pagina aan tekst kwijt of meerdere kleine stukjes. Na het opslaan moet je het gewoon even checken om de website.</p>

                <textarea type="text" name="passage" value="{{ old('passage') }}" id="passage" class="form-control" placeholder=""
                    aria-describedby="helpId" rows="10"></textarea>
                @error('passage')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Prijs</label>
                <p class="text-danger">Prijs seperator is een punt. Dus als je de prijs wil aanpassen moet het zoiets als 1.00 zijn</p>

                <input type="float" name="price" id="price" class="form-control" placeholder="" aria-describedby="helpId">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <label>Hoofd afbeelding boek</label>

            <p class="text-danger">Dit betreft the hoofd afbeelding, deze is op alle betreffend paginas prominent aanweg. Denk aan boek cover etc. </p>

                <div class="form-group custom-file">
                    <input type="file" class="custom-file-input" id="main_image" name="main_image" accept="image/*">
                    <label class="custom-file-label" id="main_image_label" for="main_image">Hoofd afbeelding</label>
                    @error('main_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

          

            {{-- <div class="form-group">
                <div class="custom-file">
                    <label class="custom-file-label" id="carousel_images_label" for="carousel_images">Carousel afbeeldingen</label>

                    <input type="file" class="custom-file-input" id="carousel_images" name="carousel_images[]" multiple
                        accept="image/*">
                    @error('carousel_images')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
    
            <button type="submit" class="btn btn-primary">Voeg boek toe</button>









   

    </form>
    </div>
@endsection
