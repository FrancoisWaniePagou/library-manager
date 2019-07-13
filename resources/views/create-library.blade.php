@extends('layouts.app')
@section('title', $submitValueName . ' library')

@section('content')
<div class="container">
    <h2>@if((isset($action) && $action)) {{ $action }} @endif</h2>
    <a class="back_btn" href="{{ route('library.index') }}">Home</a>
    <form class="form library" action=" {{ url($actionForm) }}" method="POST">
        {{ csrf_field() }}
        @if($submitValueName == 'update'){{ method_field('PUT') }} @elseif($submitValueName == 'create'){{ method_field('POST') }} @endif
        <label for="name"> Nom*: </label>
        <input type="text" value="@if($errors->first('name') == null && !$errors->first('name') && !old('name') && $submitValueName == 'update' ) {{ $fieldValue['name'] }} @else {{ old('name') }} @endif" id="name" name="name" />
        @if ($errors->first('name') !== null && $errors->first('name')) 
            <span class="error">{{ $errors->first('name') }}</span>
        @endif
        <label for="owner"> Propriétaire*: </label>
        <input type="text" value="@if($errors->first('owner') == null && !$errors->first('owner') && !old('owner') && $submitValueName == 'update' ) {{ $fieldValue['owner'] }} @else {{ old('owner') }} @endif" id="owner" name="owner" />
        @if ($errors->first('owner') !== null && $errors->first('owner')) 
            <span class="error">{{ $errors->first('owner') }}</span>
        @endif     
        <label for="phoneNumber"> Téléphone*: </label>
        <input type="text" value="@if($errors->first('phoneNumber') == null && !$errors->first('phoneNumber') && !old('phoneNumber') && $submitValueName == 'update' ) {{ $fieldValue['phoneNumber'] }} @else {{ old('phoneNumber') }} @endif" id="phoneNumber" name="phoneNumber" />
        @if ($errors->get('phoneNumber') !== null && $errors->get('phoneNumber')) 
            @foreach($errors->get('phoneNumber') as $errorsPhoneNumber)
                <span class="error">{{ $errorsPhoneNumber }}</span>
            @endforeach
        @endif               
        <label for="city"> Ville*: </label>
        <input type="text" value="@if($errors->first('city') == null && !$errors->first('city') && !old('city') && $submitValueName == 'update' ) {{ $fieldValue['city'] }} @else {{ old('city') }} @endif" id="city" name="city" />
        @if ($errors->first('city') !== null && $errors->first('city')) 
            <span class="error">{{ $errors->first('city') }}</span>
        @endif               
        <label for="quarter"> Quartier*: </label>
        <input type="text" value="@if($errors->first('quarter') == null && !$errors->first('quarter') && !old('quarter') && $submitValueName == 'update' ) {{ $fieldValue['quarter'] }} @else {{ old('quarter') }} @endif" id="quarter" name="quarter" />
        @if ($errors->first('quarter') !== null && $errors->first('quarter')) 
            <span class="error">{{ $errors->first('quarter') }}</span>
        @endif              
    <input class="btn btn-success library_submit" type="submit" name="submitted" value="@if(@isset($submitValueName) && $submitValueName) {{ $submitValueName }} @endif"/>
    </form>
    
@endsection