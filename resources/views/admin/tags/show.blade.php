{{-- estendo il layout app --}}
@extends('layouts.app')

{{-- scrivo il content --}}
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{$tag->id}} - {{$tag->name}}</h1>
        </div>
        <div class="card-body">
            {{-- se ci sono post associati, li stampo --}}
            @if (count($tag->posts) > 0)
            <h2>Associated posts</h2>
            <ul>
                {{-- avendo instaurato a livello di Model una relazione one to many (una categoria, più post), utilizzando i relativi metodi dei Model, posso portarmi appresso gli elementi (di altre tabelle) associati --}}
                {{-- ciclando sulla relazione one to many, ottengo anche le informazioni dei post associati --}}
                @foreach ($tag->posts as $post)
                    <li>{{$post->title}}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center m-4">
        <a href="{{route('admin.tags.index')}}" class="btn btn-secondary">Return to all tags</a>
    </div>
</div>
@endsection
