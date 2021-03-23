@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-blue text-white">{{ __('My chat') }}</div>

                <div class="card-body">
                    <table class='table table-bordered'>
                        
                        @foreach ($rents as $item)
                            @if ($item->status === 'wait')
                                <tr align='center'>
                                    <td>
                                        <a href="{{ url("/member/chat/$item->id") }}">
                                            {{$item->get_rents_member->shop_name}}
                                        </a>
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
