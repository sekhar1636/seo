@extends('common.layout')

@section('title', 'Email Verified')

@section('style')

@endsection

@section('js')


@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Already Verified</div>
                    <div class="panel-body">
                        Youre Account is already Verified. <a href="{{ route('getIndex') }}">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection