@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('User') }}</span>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.create') }}">Add</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive caption-top">
                            <caption>List of users</caption>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=>$item)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @foreach($item->roles as $role)
                                            <span>{{$role->name}}, </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">
                                            <a class="nav-link" href="{{route('users.edit',$item)}}">Edit</a>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                                onclick="deleteItem('{{route('users.destroy',$item)}}')">Delete
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
