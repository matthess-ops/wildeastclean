@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>boek aanpassen</h3>

        <form action="{{ route('updateKratmeister', ['id' => $kratmeister->id]) }} }}" method="POST"
            enctype="multipart/form-data">
            {{ method_field('put') }}

            @csrf
            <div class="form-group">
                <label for="title">titel</label>

                <input type="text" name="title" value="{{ $kratmeister->title }}" id="title" value="{{ old('title') }}"
                    class="form-control" placeholder="" aria-describedby="helpId">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="back_label_text">Text label</label>
                <p class="text-danger">Vervang alle Bennie Ruighaver, Bennie referenties met $$$$. Want dit heeft javascript nodig om te bepalen waar
                    de naam vervangen dient te te worden met de ingevoerde naam.
                </p>
                <textarea type="text" name="back_label_text" value="{{ old('back_label_text') }}" id="back_label_text"
                    class="form-control" placeholder="" aria-describedby="helpId"
                    rows="3">{{ $kratmeister->back_label_text }}</textarea>
                @error('back_label_text')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>



            <div class="form-group">
                <label for="single_can_price">Sticker prijs blikje</label>
                <input type="number" value={{ $kratmeister->single_can_price }} name="single_can_price"
                    id="single_can_price" class="form-control" placeholder="" aria-describedby="helpId">
                @error('single_can_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="single_small_bottle_price">Sticker prijs flesje</label>
                <input type="number" value={{ $kratmeister->single_small_bottle_price }} name="single_small_bottle_price"
                    id="single_small_bottle_price" class="form-control" placeholder="" aria-describedby="helpId">
                @error('single_small_bottle_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="single_large_bottle_price">Sticker prijs fles groot 75cl</label>
                <input type="number" value={{ $kratmeister->single_large_bottle_price }} name="single_large_bottle_price"
                    id="single_large_bottle_price" class="form-control" placeholder="" aria-describedby="helpId">
                @error('single_large_bottle_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sixpack_can_price">Sticker prijs sixpack blikjes</label>
                <input type="number" value={{ $kratmeister->sixpack_can_price }} name="sixpack_can_price"
                    id="sixpack_can_price" class="form-control" placeholder="" aria-describedby="helpId">
                @error('sixpack_can_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sixpack_bottle_price">Sticker prijs sixpack flesjes</label>
                <input type="number" value={{ $kratmeister->sixpack_bottle_price }} name="sixpack_bottle_price"
                    id="sixpack_bottle_price" class="form-control" placeholder="" aria-describedby="helpId">
                @error('sixpack_bottle_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>



            <div class="form-group">
                <label for="beercase_price">Sticker prijs krat bier</label>
                <input type="number" value={{ $kratmeister->beercase_price }} name="beercase_price" id="beercase_price"
                    class="form-control" placeholder="" aria-describedby="helpId">
                @error('beercase_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>





            <label>Hoofd afbeelding</label>

            <p class="text-danger">Dit betreft the hoofd afbeelding, deze is op alle betreffend paginas prominent aanweg. Denk aan label.
                Elke keer als je iets veranderd moet je opnieuw de images uploaden. (wordt veranderd in versie 2).
            </p>


            <div class="form-group custom-file">
                <input type="file" class="custom-file-input" id="front_label_image" name="front_label_image"
                    accept="image/*">
                <label class="custom-file-label" id="front_label_image_label"
                    for="front_label_image">front_label_image</label>
                @error('front_label_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>



            <label>Carousel afbeeldingen</label>

            <p class="text-danger">Selecteer hier 1 of meerdere afbeeldingen die relevant zijn voor deze kratmeister,
                denk aan krat, fles, blik labels etc. Verder let op dat je de afbeelding als volgt omschrijft label_voor_krat.jpg
                want dit wordt namelijk de omschrijving van de afbeelding. Elke keer als je iets veranderd moet je opnieuw de images uploaden. (wordt veranderd in versie 2).
            </p>

            <div class="form-group">
                <div class="custom-file">
                    <label class="custom-file-label" id="carousel_images_label"
                        for="carousel_images">carousel_images</label>

                    <input type="file" class="custom-file-input" id="carousel_images" name="carousel_images[]" multiple
                        accept="image/*">
                    @error('carousel_images')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
