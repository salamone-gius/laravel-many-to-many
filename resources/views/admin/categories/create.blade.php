{{-- estendo il layout app --}}
@extends('layouts.app')

{{-- scrivo il content --}}
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create new category</h1>
        </div>
        <div class="card-body">

            {{-- nell'attributo action del form inserisco la rotta per immagazzinare tutti i dati inseriti nel form --}}
            {{-- nell'attributo method del form inserisco il metodo del form che INVIA i dati al db --}}
            <form action="{{route('admin.categories.store')}}" method="POST">

                {{-- all'interno del form inserisco il token di validazione di laravel --}}
                @csrf
                <div class="form-group">

                    {{-- l'attributo for del tag label deve matchare con l'attributo id del tag input --}}
                    <label for="name">Name</label>

                    {{-- l'attributo name (importantissimo) deve matchare con il nome della colonna che dovrà andare a riempire --}}
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">

                    {{-- segnalazione di errore in caso di validazione fallita --}}
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center m-4">
        <a href="{{route('admin.categories.index')}}" class="btn btn-secondary">Return to all categories</a>
    </div>
</div> 
@endsection
