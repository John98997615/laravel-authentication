@extends('layout.base')

@section('content')
    <h1>Liste des produits</h1>
    <a href="{{ route('products.create') }}">
        Créer un produit
    </a>

    @if($message = Session::get('success'))
        <p>
            {{ $message }}
        </p>
    @endif

    @foreach ($products as $product)
        <p>
            <b>Name :</b> {{ $product->name }} <br>
            <b>Description :</b> {{ $product->description ? $product->description : "Non rempli." }}<br>
            <a href="{{ route('products.show', $product->id) }}">
                Details
            </a>
        </p>
        <p>
            <a href="{{ route('products.edit', $product->id) }}">
                Modifier
            </a>
        </p>
        <form action="{{ route('products.destroy', $product->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer cette catégorie ? Cette action sera irréversible !')">
            @csrf

            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    @endforeach
@endsection