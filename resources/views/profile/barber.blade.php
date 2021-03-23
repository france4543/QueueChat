@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-4">{{ __('Profile') }}</div>

                @if (Auth::user()->images === null)
                    <div></div>
                @else
                    <div align='center' class='m-4'>
                        <img src="/storage/{{ Auth::user()->images }}" width="100%" height="200" style="object-fit: contain;">
                    </div>
                @endif

                <form class='mr-4 ml-4' action="{{url("/barber/profile")}}" method="post" enctype="multipart/form-data">
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
    
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Shop Name') }}</label>
    
                        <div class="col-md-6">
                            <input class='form-control' name='shop_name' type="text" value="{{ Auth::user()->shop_name }}" required>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Shop Address') }}</label>
    
                        <div class="col-md-6">
                            <input class='form-control' name='shop_address' type="text" value="{{ Auth::user()->shop_address }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Shop Detail') }}</label>
    
                        <div class="col-md-6">
                            <input class='form-control' name='shop_detail' type="text" value="{{ Auth::user()->shop_detail }}" required>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Shop Type') }}</label>
    
                        <div class="col-md-6">
                            <select class='form-control' name="shop_type" required>
                                @if (Auth::user()->shop_type === null)
                                    <option value="">Please select type</option>
                                    <option value="Male only">Male only</option>
                                    <option value="Female only">Female only</option>
                                    <option value="All">All</option>
                                @else
                                    @if (Auth::user()->shop_type === 'Male only')
                                        <option value="Male only">Male only</option>
                                        <option value="Female only">Female only</option>
                                        <option value="All">All</option>
                                    @elseif (Auth::user()->shop_type === 'Female only')
                                        <option value="Female only">Female only</option>
                                        <option value="All">All</option>
                                        <option value="Male only">Male only</option>
                                    @else
                                    <option value="All">All</option>
                                        <option value="Female only">Female only</option>
                                        <option value="Male only">Male only</option>
                                    @endif
                                @endif
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Shop Image') }}</label>
    
                        <div class="col-md-6">
                            <input class='form-control' type="file" name='images' accept="image/*">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
    
                        <div class="col-md-6">
                            <select class='form-control' name="status" id="" required>
                                @if (Auth::user()->status === null)
                                    <option value="male">Please select status</option>
                                    <option value="ON">ON</option>
                                    <option value="OFF">OFF</option>
                                @elseif (Auth::user()->status === 'ON')
                                    <option value="ON">ON</option>
                                    <option value="OFF">OFF</option>
                                @else
                                    <option value="OFF">OFF</option>
                                    <option value="ON">ON</option>
                                @endif
                            </select>
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
