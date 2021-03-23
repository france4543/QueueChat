@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail') }}</div>

                <div class="card-body">
                    <img src="/storage/{{ $users->images }}" width="100%" height="400" style="object-fit: contain;">
                    
                    <label class='mt-4'><b>Name: </b></label>
                    <input class='form-control mb-2' type="text" value="{{ $users->name }}" readonly>

                    <label><b>Age: </b></label>
                    <input class='form-control mb-2' type="text" value="{{ $users->age }}" readonly>

                    <label><b>Sex: </b></label>
                    <input class='form-control mb-2' type="text" value="{{ $users->sex }}" readonly>

                    <label><b>Tel: </b></label>
                    <input class='form-control mb-2' type="text" value="{{ $users->tel }}" readonly>

                    <label><b>Shop Name: </b></label>
                    <input class='form-control mb-2' type="text" value="{{ $users->shop_name }}" readonly>

                    <label><b>Shop Address: </b></label>
                    <input class='form-control mb-2' type="text" value="{{ $users->shop_address }}" readonly>

                    <label><b>Shop Detail: </b></label>
                    <input class='form-control mb-2' type="text" value="{{ $users->shop_detail }}" readonly>
                    
                    <label><b>Services: </b></label>
                    <ul>
                        @foreach ($services as $item)
                            <li>{{$item->name}}</li>
                        @endforeach
                    </ul>
                    
                    <hr>
                    @if (Auth::user()->user_role !== 'Barber' && $users->status !== 'OFF' )
                        <div align='right'>
                            <form action="{{ url("/barber/customer/$users->id") }}" method="post">
                                {{ csrf_field() }}
                                <button class='btn btn-primary'>Cut hair</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
