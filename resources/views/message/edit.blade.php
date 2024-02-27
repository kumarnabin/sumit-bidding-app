@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Message') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('messages.update',$message) }}">
                            @method("PUT")
                            @csrf

                            <div class="row mb-3">
                                <label for="sender_id"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Sender') }}</label>

                                <div class="col-md-6">
                                    <select id="sender_id" class="form-control @error('sender_id') is-invalid @enderror"
                                            name="sender_id" required autocomplete="sender_id" autofocus>
                                        @foreach($users as $sender)
                                            <option
                                                value="{{$sender->id}}" {{$sender->id==old('sender_id',$message->sender_id)?'selected':''}}>{{$sender->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('sender_id')
                                    <span class="invalid-message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="receiver_id"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Receiver') }}</label>

                                <div class="col-md-6">
                                    <select id="receiver_id"
                                            class="form-control @error('receiver_id') is-invalid @enderror"
                                            name="receiver_id" required autocomplete="receiver_id" autofocus>
                                        @foreach($users as $receiver)
                                            <option
                                                value="{{$receiver->id}}" {{$receiver->id==old('receiver_id',$message->receiver_id)?'selected':''}}>{{$receiver->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('receiver_id')
                                    <span class="invalid-message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="message"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>

                                <div class="col-md-6">
                                    <input id="message" type="text" value="{{old('message',$message->message)}}"
                                           class="form-control @error('message') is-invalid @enderror" name="message"
                                           required autocomplete="current-message">

                                    @error('message')
                                    <span class="invalid-message" role="alert">
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
