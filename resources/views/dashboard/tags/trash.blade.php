@extends('layouts.dashboard')
@section('title','Tags')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="#">Tags</a></li>
<li class="breadcrumb-item active"><a href="#">Tags</a></li>
@endsection
@section('content')

<div class="mb-3">
    <a href="{{ route('tags.index') }}" class="btn btn-outline-success">Create Tag</a>
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
            <th>Deleted At</th>
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
            <td>{{ $tag->deleted_at }}</td>
            <td>
    <form class="delete-form" action="{{ route('tags.restore',['tags'=>$tag->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-info btn-sm">Restore</button>
                </form>
            </td>

            <td>
                <form class="delete-form" action="{{ route('tags.force-delete',['tags'=>$tag->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-info btn-sm">Delete</button>
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