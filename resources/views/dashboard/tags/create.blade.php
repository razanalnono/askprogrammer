@extends('layouts.dashboard')
@section('title','Create Tag')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="#">Tags</a></li>
@endsection
@section('content')
<div>
<form action="{{ route('tags.store') }}" method="post">
    @csrf
@include('dashboard.tags._form')
</form>
</div>
@endsection