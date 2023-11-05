@extends('front.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- @foreach ($products as $product)
               {{ $product->name }}<br>
            @endforeach --}}
            {{ $products->name }}
            <h1>Contacts</h1>
        </div>
    </div>
</div>
@endsection
