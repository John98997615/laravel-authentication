@extends('layout.base')

@section('content')
    <h1>Profil de l'utilisateur</h1>
    <b>Nom :</b> {{ $user->name }} <br /><br />
    <b>Email :</b> {{ $user->email }} <br /><br />
    <b>Catégories créées :</b>
    <ul>
        @foreach ($user->categories as $category)
            <li>
                <a href="{{ route('categories.show', $category->id) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <b>Produits créés :</b>
    <ul>
        @foreach ($user->products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">
                    {{ $product->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <b>Nombre de catégories créées :</b> {{ $user->categories->count() }} <br /><br />
    <b>Nombre de produits créés :</b> {{ $user->products->count() }} <br /><br />
    <b>Date de création du compte :</b> {{ $user->created_at->format('d/m/Y H:i') }} <br /><br />
    <b>Date de dernière mise à jour :</b> {{ $user->updated_at->format('d/m/Y H:i') }} <br /><br />
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Voir les catégories</a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Voir les produits</a>
    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Retour à l'accueil</a>
    <br><br>
    <form action="{{ route('logout') }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">
        @csrf
        <button type="submit" class="btn btn-danger">Se déconnecter</button>
    </form>
    <br><br>
    {{-- <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Modifier le profil</a>
    <form action="{{ route('profile.destroy', $user->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible !');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer le compte</button>
    </form> --}}
@endsection