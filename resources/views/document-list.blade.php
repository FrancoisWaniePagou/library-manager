@extends('layouts.app')

@section('title', 'Documents list')
@section('content')
<div>
    <h3>Liste des documents de bibliotheque-{{ $id }}</h3>
    {{ $documents }}
</div>
@endsection
    