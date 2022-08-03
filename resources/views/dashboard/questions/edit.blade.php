@extends('layouts.dashboard')
@section('title','Edit Tag')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="#">Tags</a></li>
<li class="breadcrumb-item active"><a href="#">Edit-Tags</a></li>
@endsection
@section('content')
<div>
<form action="{{ route('question.update',$question->id) }}" method="post">
  @method('put')
    @csrf
@include('dashboard.questions._form')
</form>
</div>
@endsection