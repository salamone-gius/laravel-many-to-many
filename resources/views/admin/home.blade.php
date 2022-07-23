@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center m-4">
                <a href="{{route('admin.posts.index')}}" class="btn btn-secondary m-4">See all posts</a>
                <a href="{{route('admin.posts.create')}}" class="btn btn-success">Create new post</a>
            </div>
            <div class="d-flex justify-content-center align-items-center m-4">
                <a href="{{route('admin.categories.index')}}" class="btn btn-secondary m-4">See all categories</a>
                <a href="{{route('admin.categories.create')}}" class="btn btn-success">Create new category</a>
            </div>
        </div>
    </div>
</div>
@endsection
