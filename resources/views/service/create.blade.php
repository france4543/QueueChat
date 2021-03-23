@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <form action="{{url("/barber/service")}}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <label>Name: </label>
                        <input class='form-control mb-2' type="text" name='name' required>
                        <div align='right'>
                            <button class='btn btn-primary'>Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
