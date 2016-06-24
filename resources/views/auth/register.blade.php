@extends('layouts.master')
@section('title', 'Registreren')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-10">
            <form method="post" action="{{ action('Auth\AuthController@getRegister') }}" class="form-horizontal">
                {!! csrf_field() !!}

                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                    <label for="first_name" class="control-label col-sm-4">Voornaam *</label>
                    <div class="col-sm-8">
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="form-control">
                        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('name_prefix') ? 'has-error' : ''}}">
                    <label for="name_prefix" class="control-label col-sm-4">Tussenvoegsel</label>
                    <div class="col-sm-8">
                        <input type="text" name="name_prefix" id="name_prefix" value="{{ old('name_prefix') }}" class="form-control">
                        {!! $errors->first('name_prefix', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                    <label for="last_name" class="control-label col-sm-4">Achternaam *</label>
                    <div class="col-sm-8">
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control">
                        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <hr>

                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email" class="control-label col-sm-4">E-mailadres *</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
                    <label for="phone_number" class="control-label col-sm-4">Telefoonnummer</label>
                    <div class="col-sm-8">
                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="form-control">
                        {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <hr>

                <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                    <label for="address" class="control-label col-sm-4">Adres *</label>
                    <div class="col-sm-8">
                        <input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control">
                        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}">
                    <label for="zip_code" class="control-label col-sm-4">Postcode *</label>
                    <div class="col-sm-8">
                        <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" class="form-control">
                        {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                    <label for="city" class="control-label col-sm-4">Stad *</label>
                    <div class="col-sm-8">
                        <input type="text" name="city" id="city" value="{{ old('city') }}" class="form-control">
                        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <hr>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    <label for="password" class="control-label col-sm-4">Wachtwoord</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" id="password" class="form-control">
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                    <label for="password_confirmation" class="control-label col-sm-4">Wachtwoord herhalen</label>
                    <div class="col-sm-8">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Registreren</button>
                    </div>
                </div>
            </form>

            <p>Heeft u al een account? <a href="{{ route('login') }}">Log in.</a></p>
        </div>
    </div>
@endsection
