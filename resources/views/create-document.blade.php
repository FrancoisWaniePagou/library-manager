@extends('layouts.app')
@section('title', $submitValueName . ' document')

@section('content')
<div class="container document_form">
    <h2>@if((isset($action) && $action)) {{ $action }} @endif</h2>
    <a class="back_btn" href="{{ url('document/' . $idLibrary) }}"> << Liste de documents</a>
    <form class="form library" action=" {{ url($actionForm) }}" method="POST">
        {{ csrf_field() }}
        @if($submitValueName == 'update'){{ method_field('PUT') }} @endif
        <div class="radio_group">
            <p>Type de document</p>
            @if ($errors->first('document-type') !== null && $errors->first('document-type')) 
                <span class="error">{{ $errors->first('document-type') }}</span>
            @endif
            <div class="radio_group_document_type">
                <input type="radio" name="document-type" id="dictionnary" value="Dictionnaire" checked/>
                <label for="dictionnary">Dictionnaire:</label>
            </div>
            <div class="radio_group_document_type">
                <input type="radio" name="document-type" id="roman" value="Roman"/>
                <label for="roman">Roman:</label>
            </div>
           <div class="radio_group_document_type">
                <input type="radio" name="document-type" id="guide" value="Guide"/>
                <label for="guide">Guide:</label>
           </div>
            <div class="radio_group_document_type">
                <input type="radio" name="document-type" id="review" value="Revue"/>
                <label for="review">Revue:</label>
            </div>
        </div>
        <input type="hidden" name="id-library" id="idLibrary" value="{{ $idLibrary }}">
        <label for="title"> Titre*: </label>
        <input type="text" value="@if($errors->first('title') == null && !$errors->first('name') && !old('name') && $submitValueName == 'update' ) {{ $fieldValue['name'] }} @else {{ old('name') }} @endif" id="title" name="title" />
        @if ($errors->first('title') !== null && $errors->first('title')) 
            <span class="error">{{ $errors->first('title') }}</span>
        @endif
        <label for="price"> Prix*: </label>
        <input type="text" value="@if($errors->first('owner') == null && !$errors->first('owner') && !old('owner') && $submitValueName == 'update' ) {{ $fieldValue['owner'] }} @else {{ old('owner') }} @endif" id="price" name="price" />
        @if ($errors->get('price') !== null && $errors->get('price')) 
            @foreach($errors->get('price') as $errorsPrice)
                <span class="error">{{ $errorsPrice }}</span>
            @endforeach
        @endif      
        {{-- <label for="image"> image*: </label>
        <input type="file" id="image" name="image" />
        @if ($errors->first('image') !== null && $errors->first('image')) 
            <span class="error">{{ $errors->first('image') }}</span>
        @endif               --}}

        <div class="block_dictionnary_field">
            <label for="language">Langue*:</label>
            <input type="text" name="language" id="language" value="">
            @if ($errors->first('language') !== null && $errors->first('language')) 
                <span class="error">{{ $errors->first('language') }}</span>
            @endif 
        </div>  
        
        <div class="hidden_block block_book_field">
            <label for="author">Auteur*:</label>
            <input type="text" name="author" id="author" value=""/>
            <label for="isbn">ISBN*:</label>
            <input type="text" name="isbn" id="isbn" value=""/>
        </div> 

        <div class="hidden_block block_review_field">
            <label for="month">Mois*:</label>
            <input type="text" name="month" id="month" value=""/>
            <label for="year">Année*:</label>
            <input type="text" name="year" id="year" value=""/>
        </div> 

        <div class="hidden_block block_roman_field">
            <label for="literary_price">Prix Littéraire*:</label>
            <input type="text" name="literary_price" id="literary_price" value=""/>
        </div> 

        <div class="hidden_block block_guide_field">
            <label for="school_level">Niveau scolaire*:</label>
            <input type="text" name="school_level" id="school_level" value=""/>
        </div>              
        <input class="btn btn-success library_submit" type="submit" name="submitted" value="@if(isset($submitValueName) && $submitValueName) {{ $submitValueName }} @endif"/>
    </form>
    
@endsection