@extends('layout.base')

@section('content')
    <h1>Créer un produit</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="post">
        @csrf

        <label for="name">Nom</label>
        <input type="text" placeholder="Saisir le nom du produit ..." value="{{ old('name') }}" id="name" name="name" />

        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="5">{{ old('description') }}</textarea>
        {{-- <button type="submit">Soumettre</button> --}}

        <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantité</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Catégorie</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    {{-- <option value="">Sélectionner une catégorie</option> --}}
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Créer le produit</button>
        </form>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Retour à la liste des produits</a>
    </div>
    </form>
@endsection