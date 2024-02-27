@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('User') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update',$user) }}">
                            @method("PUT")
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{old('name',$user->name)}}"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           required autocomplete="current-name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" value="{{old('email',$user->email)}}"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           required autocomplete="current-email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" value="{{old('password')}}"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password_confirmation"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password"
                                           value="{{old('password_confirmation')}}"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           name="password_confirmation"
                                           autocomplete="current-password">

                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="role_ids"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>


                                <div class="col-md-6">
                                    <select multiple id="role_ids"
                                            class="form-control @error('role_ids') is-invalid @enderror"
                                            name="role_ids[]" required autocomplete="role_ids" autofocus>
                                        @foreach($roles as $role)
                                            <option
                                                value="{{ $role->id }}" {{ in_array($role->id, old('role_ids', $user->roles->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>

                                        @endforeach
                                    </select>

                                    @error('role_ids')
                                    <span class="invalid-user" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
