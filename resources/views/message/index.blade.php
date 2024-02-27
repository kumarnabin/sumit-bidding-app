@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Message') }}</span>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('messages.create') }}">Add</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive caption-top">
                            <caption>List of messages</caption>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sender</th>
                                <th scope="col">Message</th>
                                <th scope="col">Receiver</th>
                                <th scope="col">Time</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $key=>$item)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$item->sender?->name}}</td>
                                    <td>{{$item->message}}</td>
                                    <td>{{$item->receiver?->name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">
                                            <a class="nav-link" href="{{route('messages.edit',$item)}}">Edit</a>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                                onclick="deleteItem('{{route('messages.destroy',$item)}}')">Delete
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
