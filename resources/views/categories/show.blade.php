@extends('layout.base')

@section('content')
    <h1>Détails de la catégorie</h1>

    <b>Name :</b> {{ $category->name }} <br />
    <b>Description :</b> {{ $category->description ? $category->description : 'Non rempli.' }} <br />
    @foreach ($category->products as $product)
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