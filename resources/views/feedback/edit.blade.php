@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Feedback') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('feedbacks.update',$feedback) }}">
                            @method("PUT")
                            @csrf

                            <div class="row mb-3">
                                <label for="item_id"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Item') }}</label>

                                <div class="col-md-6">
                                    <select id="item_id" class="form-control @error('item_id') is-invalid @enderror"
                                            name="item_id" required autocomplete="item_id" autofocus>
                                        @foreach($items as $item)
                                            <option
                                                value="{{$item->id}}" {{$item->id==old('item_id',$feedback->item_id)?'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('item_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="user_id"
                                       class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>

                                <div class="col-md-6">
                                    <select id="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                            name="user_id" required autocomplete="user_id" autofocus>
                                        @foreach($users as $user)
                                            <option
                                                value="{{$user->id}}" {{$user->id==old('user_id',$feedback->user_id)?'selected':''}}>{{$user->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="rating" class="col-md-4 col-form-label text-md-end">{{ __('Rating') }}</label>

                                <div class="col-md-6">
                                    <input id="rating" type="number" min="1" max="5" value="{{old('rating',$feedback->rating)}}"
                                           class="form-control @error('rating') is-invalid @enderror" name="rating"
                                           required autocomplete="current-rating">

                                    @error('rating')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Comment') }}</label>

                                <div class="col-md-6">
                                    <input id="comment" type="text" value="{{old('comment',$feedback->comment)}}"
                                           class="form-control @error('comment') is-invalid @enderror" name="comment"
                                           required autocomplete="current-comment">

                                    @error('comment')
                                    <span class="invalid-feedback" role="alert">
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
