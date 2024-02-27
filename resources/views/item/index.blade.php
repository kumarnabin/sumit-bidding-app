@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Item') }}</span>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('items.create') }}">Add</a>
                            </li>
                        </ul>
                    </div>


                    <div class="card-body">
                        <table class="table table-responsive caption-top">
                            <caption>List of items</caption>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Bidding Start</th>
                                <th scope="col">Bidding End</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key=>$item)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->category?->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->bidding_start}}</td>
                                    <td>{{$item->bidding_end}}</td>
                                    <td>{{$item->user?->name}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">
                                            <a class="nav-link" href="{{route('items.edit',$item)}}">Edit</a>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                                onclick="deleteItem('{{route('items.destroy',$item)}}')">Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
