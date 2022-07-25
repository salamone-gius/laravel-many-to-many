@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit post: {{$post->title}}</h1>
        </div>
        <div class="card-body">
            <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $post->title)}}">
                    @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6">{{old('content', $post->content)}}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                {{-- aggiungo la possibilità all'utente di modificare un tag ad un post --}}
                <div class="form-group">
                    <p>Tags</p>
                    @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        {{-- in caso di checbox multiple devo stare attento al name del tag input (come array) --}}
                        <input class="form-check-input @error('tags') is-invalid @enderror" type="checkbox" id="{{$tag->slug}}" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', $postTags)) ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                    </div>
                    @error('tags')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    @endforeach
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{old('published', $post->published) ? 'checked' : ''}}>
                    <label class="form-check-label" for="published">Post</label>
                    @error('published')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning">Save changes</button>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center m-4">
        <a href="{{route('admin.posts.index')}}" class="btn btn-secondary">Return to all posts</a>
    </div>
</div>
@endsection