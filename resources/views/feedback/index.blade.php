@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Feedback') }}</span>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('feedbacks.create') }}">Add</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive caption-top">
                            <caption>List of feedbacks</caption>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Item</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedbacks as $key=>$item)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$item->user?->name}}</td>
                                    <td>{{$item->item?->name}}</td>
                                    <td>{{$item->rating}}</td>
                                    <td>{{$item->comment}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">
                                            <a class="nav-link" href="{{route('feedbacks.edit',$item)}}">Edit</a>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                                onclick="deleteItem('{{route('feedbacks.destroy',$item)}}')">Delete
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
