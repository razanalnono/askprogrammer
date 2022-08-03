@extends('layouts.dashboard')
@section('title','Tags')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="#">Tags</a></li>
@endsection
@section('content')

<div class="mb-3">
<a href="{{ route('questions.create') }}" class="btn btn-outline-success">Questions</a>   
<a href="{{ route('questions.trash') }}" class="btn btn-outline-dark">Trash</a>
</div>

<x-alert type="success" />
<x-alert type="info" />
<x-alert type="danger" />

<form action="{{ URL::current() }}" method="get">
<x-form.input name="name" />

</form>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th colspan="1">Operation</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($questions as $question)
        <tr>
            <td>{{ $question->id }}</td>
            <td><a href="/questions/{{ $question->id }}/edit">{{ $question->question }}</a></td>
            <td>{{ $question->status }}</td>

            <td>
                <a class="btn btn-primary" href="{{ route('questions.edit',['question'=>$question->id]) }}">Edit</a>
            </td>
            <td>
                <form class="delete-form" action="{{ route('questions.destroy',['question'=>$question->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>

        @empty
        <tr>
            <td colspan="6">No Tags Defined </td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $questions->withQueryString()->links('pagination.custom') }}


@endsection