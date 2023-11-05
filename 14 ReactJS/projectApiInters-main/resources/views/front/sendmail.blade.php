@extends('front.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>

                    @include('front.partials.select', [
                        'name' => 'select-city',
                        'id' => '',
                        'options' => $options,
                        'class' => ''
                    ])

                    @include('front.partials.button', [
                        'class' => 'btn btn-primary',
                        'buttonText' => $user->email,
                        'type' => ''
                    ])

                    
                </form>
                
            </div>
        </div>
    </div>
@endsection
