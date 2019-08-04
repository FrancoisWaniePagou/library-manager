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
            @if ($errors->has('documentType')) 
                <span class="error">{{ $errors->first('documentType') }}</span>
            @endif
            <div class="radio_group_document_type">
                <input type="radio" name="documentType" id="dictionnary" value="Dictionnaire" checked />
                <label for="dictionnary">Dictionnaire:</label>
            </div>
            <div class="radio_group_document_type">
                <input type="radio" name="documentType" id="roman" value="Roman" @if(old('documentType') == 'Roman') checked @endif/>
                <label for="roman">Roman:</label>
            </div>
            <div class="radio_group_document_type">
                    <input type="radio" name="documentType" id="guide" value="Guide"  @if(old('documentType') == 'Guide') checked @endif/>
                    <label for="guide">Guide:</label>
            </div>
            <div class="radio_group_document_type">
                <input type="radio" name="documentType" id="review" value="Revue" @if(old('documentType') == 'Revue') checked @endif/>
                <label for="review">Revue:</label>
            </div>
        </div>
        <input type="hidden" name="idLibrary" id="idLibrary" value="{{ $idLibrary }}">
        <label for="title"> Titre*: </label>
        <input type="text" value="@if($errors->has('title') && !old('title') && $submitValueName == 'update' ) {{ $fieldValue['title'] }} @else {{ old('title') }} @endif" id="title" name="title" />
        @if ($errors->has('title')) 
            <span class="error">{{ $errors->first('title') }}</span>
        @endif
        <label for="price"> Prix*: </label>
        <input type="text" value="@if($errors->has('price') && !old('owner') && $submitValueName == 'update' ) {{ $fieldValue['price'] }} @else {{ old('price') }} @endif" id="price" name="price" />
        @if ($errors->has('price')) 
            @foreach($errors->get('price') as $errorsPrice)
                <span class="error">{{ $errorsPrice }}</span>
            @endforeach
        @endif      
        {{-- <label for="image"> image*: </label>
        <input type="file" id="image" name="image" />
        @if ($errors->first('image') !== null && $errors->first('image')) 
            <span class="error">{{ $errors->first('image') }}</span>
        @endif               --}}
        <label for="numberOfPage">Nombre de page*:</label>
        <input type="text" name="numberOfPage" id="numberOfPage" value="@if($errors->has('numberOfPage') && !old('numberOfPage') && $submitValueName == 'update' ) {{ $fieldValue['numberOfPage'] }} @else {{ old('numberOfPage') }} @endif">
        @if ($errors->has('numberOfPage')) 
            <span class="error">{{ $errors->first('numberOfPage') }}</span>
        @endif 
        <div class="block_dictionnary_field">
            <label for="language">Langue*:</label>
            <input type="text" name="language" id="language" value="@if($errors->has('language') && !old('language') && $submitValueName == 'update' ) {{ $fieldValue['language'] }} @else {{ old('language') }} @endif">
            @if ($errors->has('language')) 
                <span class="error">{{ $errors->first('language') }}</span>
            @endif 
        </div>  
        
        <div class="hidden_block block_book_field">
            <label for="author">Auteur*:</label>
            <input type="text" name="author" id="author" value="@if($errors->has('author') && !old('author') && $submitValueName == 'update' ) {{ $fieldValue['author'] }} @else {{ old('author') }} @endif"/>
            @if ($errors->has('author')) 
                <span class="error">{{ $errors->first('author') }}</span>
            @endif
            <label for="isbn">ISBN*:</label>
            <input type="text" name="isbn" id="isbn" value="@if($errors->has('isbn') && !old('isbn') && $submitValueName == 'update' ) {{ $fieldValue['isbn'] }} @else {{ old('isbn') }} @endif"/>
            @if ($errors->has('isbn')) 
                <span class="error">{{ $errors->first('isbn') }}</span>
            @endif
        </div> 

        <div class="hidden_block block_review_field">
            <label for="month">Mois*:</label>
            <select name="month" id="month">
                <option value="">--Sélectionner un mois</option>
                @foreach($months as $month)
                    <option value="{{ $month }}">{{ $month }}</option>
                @endforeach
            <select/>
            @if ($errors->has('month')) 
                <span class="error">{{ $errors->first('month') }}</span>
            @endif
            <label for="year">Année*:</label>
            <input type="text" name="year" id="year" @if($errors->has('year') && !old('year') && $submitValueName == 'update' ) value="{{ $fieldValue['year'] }}" @else value="{{ old('year') }} @endif"/>
            @if ($errors->has('year')) 
                <span class="error">{{ $errors->first('year') }}</span>
            @endif
        </div> 

        <div class="hidden_block block_roman_field">
            <label for="literary_price">Prix Littéraire*:</label>
            <input type="text" name="literary_price" id="literary_price" @if($errors->has('literary_price') && !old('literary_price') && $submitValueName == 'update' ) value="{{ $fieldValue['literary_price'] }}" @else value="{{ old('literary_price') }} @endif"/>
            @if ($errors->has('literary_price')) 
                <span class="error">{{ $errors->first('literary_price') }}</span>
            @endif
        </div> 

        <div class="hidden_block block_guide_field">
            <label for="school_level">Niveau scolaire*:</label>
            <input type="text" name="school_level" id="school_level" @if($errors->has('school_level') && !old('school_level') && $submitValueName == 'update' ) value="{{ $fieldValue['school_level'] }}" @else value="{{ old('school_level') }} @endif"/>
            @if ($errors->has('school_level')) 
                <span class="error">{{ $errors->first('school_level') }}</span>
            @endif
        </div>              
        <input class="btn btn-success library_submit" type="submit" name="submitted" value="@if(isset($submitValueName) && $submitValueName) {{ $submitValueName }} @endif"/>
    </form>
    
@endsection