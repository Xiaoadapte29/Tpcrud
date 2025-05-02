@extends('base')

@section('right')
<div class="container mt-4">
    <h2>Modifier l'article</h2>

    <form action="{{ route('articles.update', $articles->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" value="{{ old('title', $articles->title) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Image actuelle</label><br>
            <img src="{{ asset(str_replace('public', 'storage', $articles->image_path)) }}" width="200" alt="Image actuelle">
        </div>
        <div class="mb-3">
            <label for="image_path" class="form-label">Nouvelle Image</label>
            <input type="file" name="image_path" id="image_path" class="form-control">
        </div>
        <div class="mb-3">
            <label>Fichier actuel</label><br>
            <a href="{{ asset(str_replace('public', 'storage', $articles->file_path)) }}" target="_blank">Télécharger</a>
        </div>
        <div class="mb-3">
            <label for="file_path" class="form-label">Nouveau Fichier</label>
            <input type="file" name="file_path" id="file_path" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
