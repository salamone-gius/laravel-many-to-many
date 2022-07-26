{{-- estendo il layout app --}}
@extends('layouts.app')

{{-- scrivo il content --}}
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>All tags</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Slug</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->slug}}</td>
                            <td style="min-width: 350px;">
                                <a href="{{route('admin.tags.show', $tag->id)}}" class="btn btn-primary">Show associated posts</a>
                                <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-warning">Edit tag</a>

                                {{-- nell'attributo action del tag form definisco la rotta che punta al destroy per eliminare la singola categoria (al submit la categoria verrà eliminata dalla tabella) passandogli l'id del singolo elemento che sarà cancellato --}}
                                {{-- nell'attributo method del tag form aggiungo il metodo http POST --}}
                                <form class="d-inline-block" action="{{route('admin.tags.destroy', $tag->id)}}" method="POST">

                                    {{-- aggiungo il token di validazione di laravel @csrf --}}
                                    @csrf

                                    {{-- aggiungo il metodo DELETE attraverso il metodo @method --}}
                                    @method('DELETE')
                                    <button type="submit" href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-danger">Delete tag</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center m-4">
        <a href="{{route('admin.tags.create')}}" class="btn btn-success">Create new tag</a>
    </div>
</div>
@endsection
