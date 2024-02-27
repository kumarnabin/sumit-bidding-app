@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Item') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('items.update',$item) }}">
                            @method("PUT")
                            @csrf

                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" value="{{old('name',$item->name)}}"
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
                                <label for="category_id"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

                                <div class="col-md-6">
                                    <select id="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id" required autocomplete="category_id" autofocus>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}" {{$category->id==old('category_id',$item->category_id)?'selected':''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Detail') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description"
                                              class="form-control @error('description') is-invalid @enderror" name="description"
                                              required
                                              autocomplete="current-description">{{old('description',$item->description)}}</textarea>

                                    @error('description')
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
                                           value="{{old('price',$item->price)}}"
                                           class="form-control @error('price') is-invalid @enderror" name="price"
                                           required autocomplete="current-price">

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bidding_start"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Bidding Start') }}</label>

                                <div class="col-md-6">
                                    <input id="bidding_start" type="date"
                                           value="{{old('bidding_start',$item->bidding_start)}}"
                                           class="form-control @error('bidding_start') is-invalid @enderror"
                                           name="bidding_start"
                                           required autocomplete="current-bidding_start">

                                    @error('bidding_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bidding_end"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Bidding End') }}</label>

                                <div class="col-md-6">
                                    <input id="bidding_end" type="date"
                                           value="{{old('bidding_end',$item->bidding_end)}}"
                                           class="form-control @error('bidding_end') is-invalid @enderror"
                                           name="bidding_end"
                                           required autocomplete="current-bidding_end">

                                    @error('bidding_end')
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
