@extends('layouts.navbar')

@section('content')
    <div class="container">
        <form action="{{ route('storeOrder') }}" method="post">
            <div class="form-group">
                <label for="firstname">Voornaam</label>
                <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" class="form-control"
                    placeholder="Voornaam" aria-describedby="helpId">
                @error('firstname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">
                <label for="lastname">Achternaam</label>
                <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" class="form-control"
                    placeholder="Achternaam" aria-describedby="helpId">
                @error('lastname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="streetname">Straatnaam</label>
                <input type="text" name="streetname" id="streetname" value="{{ old('streetname') }}" class="form-control"
                    placeholder="Straatnaam" aria-describedby="helpId">
                @error('streetname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="housenumber">Huisnummer+toevoegsel</label>
                <input type="text" name="housenumber" id="housenumber" value="{{ old('housenumber') }}" class="form-control"
                    placeholder="Huisnummer+toevoegsel" aria-describedby="helpId">
                @error('housenumber')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" id="postcode" value="{{ old('postcode') }}" class="form-control"
                    placeholder="Postcode" aria-describedby="helpId">
                @error('postcode')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="city">Plaatnaam</label>
                <input type="text" name="city" id="city" value="{{ old('city') }}" class="form-control"
                    placeholder="Plaatnaam" aria-describedby="helpId">
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phonenumber">Telefoon nummer</label>
                <input type="text" name="phonenumber" id="phonenumber" value="{{ old('phonenumber') }}" class="form-control"
                    placeholder="Telefoon nummer" aria-describedby="helpId">
                @error('phonenumber')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control"
                    placeholder="Email" aria-describedby="helpId">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">Betaal met IDeal</button>

        </form>







    </div>
@endsection
