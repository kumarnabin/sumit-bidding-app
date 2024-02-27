@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Category') }}</span>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories.create') }}">Add</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <table class="table table-responsive caption-top">
                            <caption>List of categories</caption>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key=>$item)
                                <tr>
                                    <th scope="row">{{$key++}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">
                                            <a class="nav-link" href="{{route('categories.edit',$item)}}">Edit</a>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                                onclick="deleteItem('{{route('categories.destroy',$item)}}')">Delete
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
