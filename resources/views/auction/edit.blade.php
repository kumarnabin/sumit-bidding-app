@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Auction') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('auctions.update',$auction) }}">
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
                                                value="{{$item->id}}" {{$item->id==old('item_id',$auction->item_id)?'selected':''}}>{{$item->name}}</option>
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
                                <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" min="0" step="0.01"
                                           value="{{old('price',$auction->price)}}"
                                           class="form-control @error('price') is-invalid @enderror" name="price"
                                           required autocomplete="current-price">

                                    @error('price')
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
