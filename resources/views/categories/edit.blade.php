@extends('layout.base')

@section('content')
    <h1>Modifier une catégorie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Nom</label>
        <input type="text" placeholder="Saisir le nom de la catégorie ..." value="{{ $category->name }}" id="name" name="name" />

        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="5">{{ $category->description }}</textarea>
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="{{ route('categories.index') }}">Retour à la liste des catégories</a>
    <form action="{{ route('categories.destroy', $category->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer la catégorie</button
@endsection