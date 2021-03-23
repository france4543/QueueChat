@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Customer') }}</div>

                <div class="card-body">
                    <table class='table table-bordered'>
                        <tr align='center'>
                            <th>List</th>
                            <th>Tel</th>
                            <th>Action</th>
                        </tr>
                        
                        @foreach ($rents as $key => $item)
                            @if ($item->status !== 'cancel')
                                <tr align='center'>

                                    <td>
                                        <a href="{{ url("/barber/chat/$item->id") }}">{{$item->get_rents_barber->name}}</a>
                                    </td>
                                    <td>
                                        {{$item->get_rents_barber->tel}}
                                    </td>

                                    <td>
                                        <form action="{{url("/barber/customer/$item->id")}}" method="post">
                                            {{ csrf_field() }}
                                            @method('PUT')
                                            <button class='btn btn-danger'>Reject</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
