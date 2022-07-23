{{-- estendo il layout app --}}
@extends('layouts.app')

{{-- scrivo il content --}}
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{$post->id}} - {{$post->title}}</h1>
            <div>
                {{-- avendo instaurato a livello di Model una relazione one to many (una categoria, più post), utilizzando i relativi metodi dei Model, posso portarmi appresso gli elementi (di altre tabelle) associati --}}
                {{-- richiamando la relazione one to many, ottengo anche le informazioni della categoria associata --}}
                @if ($post->category)
                    <h3>Category: {{$post->category->name}}</h3>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div>{{$post->content}}</div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center m-4">
        <a href="{{route('admin.posts.index')}}" class="btn btn-secondary">Return to all posts</a>
    </div>
</div>
@endsection
