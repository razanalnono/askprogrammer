@extends('layouts.dashboard')
@section('title','Ask')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="#">Questions</a></li>
@endsection
@section('content')
<div>
    <form action="{{ route('question.store') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <x-form.input type="text" class="form-control-lg" id="question" name="question" label="Question" />
        </div>

        <div class="form-group">
            <label for="birth_date">Select Tag</label>
            <div class="col-sm-6">
                <select class="form-control" name="tag_id">
                    @foreach ($tags as $tag )
                    <option name="{{ $tag->id }}" value="{{ $tag->id }}"> {{ $tag->name }}</option>
                    @endforeach
            </div>
            </select>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

        {{-- <div class="form-group">
            <label for="">Status</label>
            <div>
                <x-form.radio name="status" :checked="$question->status"
                    :options="['open' => 'Open', 'closed' => 'Closed']" />
            </div>
        </div> --}}

        {{-- <div class="form-group mb-3">
            <label for="">Tags</label>
            <div>
                @foreach($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        id="{{ $tag->id }}">
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                </div>
                @endforeach
            </div>
        </div> --}}
    </form>
</div>

    @endsection