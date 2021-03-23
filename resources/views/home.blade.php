@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header  bg-blue text-white">{{ __('Barber Haircut') }}</div>

                <div class="card-body">
                    @foreach ($users as $item)
                        @if ($item->status === 'ON')
                            <a class="mb-4" href="/home/{{$item->id}}">
                                <img src="/storage/{{ $item->images }}" width="100%" height="400" style="object-fit: contain;">
                                <h2 style="color: green;">Status: ON</h2>
                                <hr>
                            </a>
                        @else
                            <div class="mb-4">
                                <img src="/storage/{{ $item->images }}" width="100%" height="400" style="object-fit: contain; opacity: 0.3;">
                                <h2 style="color: red;">Status: OFF</h2>
                                <hr>
                            </div>
                        @endif
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
