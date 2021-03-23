@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <form action="{{"/barber/service/$services->id"}}" method="post">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="card-body">
                        <label>Name: </label>
                        <input class='form-control mb-2' type="text" name='name' value="{{$services->name}}" required>
                        <div align='right'>
                            <button class='btn btn-primary'>Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
