@extends('layouts.dashboard')
@section('title','Tags')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="#">Tags</a></li>
@endsection
@section('content')

<div class="mb-3">
<a href="{{ route('tags.create') }}" class="btn btn-outline-success">Create Tag</a>   
<a href="{{ route('tags.trash') }}" class="btn btn-outline-dark">Trash</a>
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
        @forelse($tags as $tag)
        <tr>
            <td>{{ $tag->id }}</td>
            <td><a href="/tags/{{ $tag->id }}/edit">{{ $tag->name }}</a></td>
            <td>{{ $tag->slug }}</td>
            <td>{{ $tag->created_at }}</td>
            <td>{{ $tag->updated_at }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('tags.edit',['tag'=>$tag->id]) }}">Edit</a>
            </td>
            <td>
                <form class="delete-form" action="{{ route('tags.destroy',['tag'=>$tag->id]) }}" method="post">
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

{{ $tags->withQueryString()->links('pagination.custom') }}


@endsection