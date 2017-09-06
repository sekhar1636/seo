@extends('common.layout')

@section('title', $title)

@section('style')

@endsection

@section('js')

@endsection

@section('content')
    <div class="well well-lg">
        <h3 class="block" style="font-weight: 600;color:#697882;">{{ $title }}</h3>
        <strong style="color:#697882;"></strong>
        {!! $description !!}
    </div>


@endsection
