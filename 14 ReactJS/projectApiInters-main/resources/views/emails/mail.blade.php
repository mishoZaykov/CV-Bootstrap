@extends('front.layouts.app')

@section('content')
<div style="width: 100%; background-color: #313131">
    <h1>{{ $mailData['title']  }}</h1>
    <div style="background-color: #fff"">
        {{ $mailData['content'] }}
    </div>
</div>
@endsection