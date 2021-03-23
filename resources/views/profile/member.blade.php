@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-4 bg-blue text-white">{{ __('Profile') }}</div>

                @if (Auth::user()->images === null)
                    <div></div>
                @else
                    <div align='center' class='m-4'>
                        <img src="/storage/{{ Auth::user()->images }}" width="100%" height="200" style="object-fit: contain;">
                    </div>
                @endif

                <form class='mr-4 ml-4' action="{{url("/member/profile")}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autofocus>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required readonly>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>
    
                        <div class="col-md-6">
                            <select class='form-control' name="sex" id="" required>
                                @if (Auth::user()->sex === 'male')
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                @else  
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                @endif
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
    
                        <div class="col-md-6">
                            <input class='form-control' name='age' type="number" value="{{ Auth::user()->age }}" required>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>
    
                        <div class="col-md-6">
                            <input class='form-control' name='tel' type="number" value="{{ Auth::user()->tel }}" required>
                        </div>
                    </div>
    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4 mb-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
