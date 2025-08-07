@extends('layout.base')

@section('content')
    <h1>Détails du produit</h1>

    <b>Name :</b> {{ $product->name }} <br />
    <b>Description :</b> {{ $product->description ? $product->description : 'Non rempli.' }} <br />
    <b>Prix :</b> {{ $product->price }} FCFA <br />
    <b>Quantité :</b> {{ $product->quantity }} <br />
    <b>Catégorie :</b> {{ $product->category ? $product->category->name : 'Aucune catégorie' }} <br />
@endsection