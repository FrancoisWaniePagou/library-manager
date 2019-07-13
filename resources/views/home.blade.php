@extends('layouts.app')

@section('title', 'Welcome | Library app')
@section('content')
<h3>Libraries List</h3>
<div class="addBtn confirmation_message">
    <a class="btn btn-primary" href="<?php echo route('library.create'); ?>">Create a new library</a>
    @if(Session::has('messageConfirmation')) <span class="success_message"> {{ Session::get('messageConfirmation') }} </span>@endif
</div>
<div class="content">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Owner</th>
                <th>City</th>
                <th>Quarter</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($libraries) && $libraries)
            @foreach ($libraries as $library)
                <tr>
                    <td>{{ $library->id }}</td>
                    <td>{{ $library->name }}</td>
                    <td>{{ $library->owner }}</td>
                    <td>{{ $library->city }}</td>
                    <td>{{ $library->quarter }}</td>
                    <td>{{ $library->phoneNumber }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('library.show', ['id' => $library->id]) }}">Show</a>
                        <a class="btn btn-secondary" href="{{ route('library.edit', ['id' => $library->id]) }}">Edit</a>
                        <a class="btn btn-danger delete_btn" href="#">
                            <span>Delete</span>
                            <form class="delete_form" action="{{ route('library.destroy', ['id' => $library->id]) }}" method="POST" style="display: none;">
                                {{ method_field('DELETE') }}{{ csrf_field() }}
                            </form>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @if(@isset($noRecordMessage) && $noRecordMessage)
        <div class="empty_rows">{{ $noRecordMessage }}</div>
    @endif
</div>
@endsection
