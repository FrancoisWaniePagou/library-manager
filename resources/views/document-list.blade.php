@extends('layouts.app')

@section('title', 'Documents list')
@section('content')
<h3>Liste des documents de bibliotheque {{ $libraryName }}</h3>
<a href="{{ route('library.index') }}" title="home"> << home</a>
<div class="addBtn confirmation_message">
    <a class="btn btn-primary" href="<?php echo url('document/' . $idLibrary . '/create'); ?>">Create a new document</a>
    @if(Session::has('messageConfirmation')) <span class="success_message"> {{ Session::get('messageConfirmation') }} </span>@endif
</div>
<div class="content">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Price</th>
                <th>Title</th>
                <th>Document type</th>
                <th>image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($documents) && $documents)
                @foreach ($documents as $document)
                <tr>
                    <td>{{ $document->id }}</td>
                    <td>{{ $document->price }}</td>
                    <td>{{ $document->title }}</td>
                    <td>{{ $document->documentType }}</td>
                    <td>{{ $document->image }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('document.edit', ['id' => $document->id, 'document_type' => $document->documentType]) }}">Edit</a>
                        <a class="btn btn-danger delete_btn" href="#">
                            <span>Delete</span>
                            <form class="delete_form" action="{{ route('document.destroy', ['id' => $document->id]) }}" method="POST" style="display: none;">
                                {{ method_field('DELETE') }}{{ csrf_field() }}
                            </form>
                        </a>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    @if(isset($noRecordMessage) && $noRecordMessage)
        <div class="empty_rows">{{ $noRecordMessage }}</div>
    @endif
</div>
@endsection
