@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Overige Product aanpassen</h3>

        <form action="{{ route('updateOverigeProduct', ['id' => $overigeProduct->id]) }} }}" method="POST"
            enctype="multipart/form-data">
            {{ method_field('put') }}
     
            @csrf
            <div class="form-group">
                <label for="title">titel</label>
                <input type="text" name="title" value={{ $overigeProduct->title }} id="title" value="{{ old('title') }}"
                    class="form-control" placeholder="" aria-describedby="helpId">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <textarea type="text" name="description" value="{{ old('description') }}" id="description"
                    class="form-control" placeholder="" aria-describedby="helpId"
                    rows="3">{{ $overigeProduct->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>



            <h2>Elke keer als je aanpassing aan een product doet moet je de fotos even opnieuw uploaden</h2>

            <div class="form-group custom-file">
                <input type="file" class="custom-file-input" id="main_image" name="main_image" accept="image/*">
                <label class="custom-file-label" id="main_image_label" for="main_image">main_image</label>
                @error('main_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <script>
                document.getElementById("main_image").addEventListener("change", () => {
                    console.log(document.getElementById("main_image").value);
                    const fileNameSplitted = document.getElementById("main_image").value.split('\\')
                    const fileName = fileNameSplitted[fileNameSplitted.length - 1];

                    document.getElementById("main_image_label").innerHTML = fileName;

                }, true)
            </script>

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
            <script>
                document.getElementById("carousel_images").addEventListener("change", () => {
                    const fileNames = document.getElementById("carousel_images").files
                    console.log("filnames are ", fileNames)
                    console.log("filnames are ", fileNames[0].name)
                    let newInnerhtml = ""

                    for (let index = 0; index < fileNames.length; index++) {
                        const fileName = fileNames[index].name;
                        console.log(fileName)
                        newInnerhtml = newInnerhtml + "," + fileName

                    }

                    document.getElementById("carousel_images_label").innerHTML = newInnerhtml;

                }, true)
            </script>



            <button type="submit" class="btn btn-primary">Submit</button>











        </form>
    </div>
@endsection
