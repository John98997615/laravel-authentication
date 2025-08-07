@extends('layout.base')

@section('content')
    <h1>Liste des catégories</h1>
    <a href="{{ route('categories.create') }}">
        Créer une catégorie
    </a>

    @if($message = Session::get('success'))
        <p>
            {{ $message }}
        </p>
    @endif

    @foreach ($categories as $category)
        <p>
            <b>Name :</b> {{ $category->name }} <br>
            <b>Description :</b> {{ $category->description ? $category->description : "Non rempli." }}<br>
            <a href="{{ route('categories.show', $category->id) }}">
                Details
            </a>
        </p>
        <p>
            <a href="{{ route('categories.edit', $category->id) }}">
                Modifier
            </a>
        </p>
        <form action="{{ route('categories.destroy', $category->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer cette catégorie ? Cette action sera irréversible !')">
            @csrf

            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    @endforeach
@endsection