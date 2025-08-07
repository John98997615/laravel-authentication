@extends('layout.base')

@section('content')
    <h1>Modifier un produit</h1>

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

    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Nom</label>
        <input type="text" placeholder="Saisir le nom de la catégorie ..." value="{{ $product->name }}" id="name" name="name" />

        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="5">{{ $product->description }}</textarea>
        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Sélectionner une catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Retour à la liste des produits</a>
        <br><br>
        
        <button type="submit">Mettre à jour</button>
    </form>
@endsection