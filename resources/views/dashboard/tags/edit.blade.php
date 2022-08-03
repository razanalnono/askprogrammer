@extends('layouts.dashboard')
@section('title','Edit Tag')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="#">Tags</a></li>
<li class="breadcrumb-item active"><a href="#">Edit-Tags</a></li>
@endsection
@section('content')
<div>
<form action="{{ route('tags.update',$tag->id) }}" method="post">
  @method('put')
    @csrf
@include('dashboard.tags._form')
</form>
</div>
@endsection