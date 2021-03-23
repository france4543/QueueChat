@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6" align='left'>
                            Service
                        </div>

                        <div class="col-md-6" align='right'>
                            <a class='btn btn-primary' href="{{url("/barber/service/create")}}">Create</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class='table table-bordered'>
                        <tr align='center'>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($services as $item)
                            <tr align='center'>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    <form action="{{url("/barber/service/$item->id")}}" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <a class='btn btn-warning' href="{{url("/barber/service/$item->id/edit")}}">Edit</a>
                                        <button class='btn btn-danger'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
