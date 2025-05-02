@extends('base')
@section('right')
<div class="container">

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $e)
            <li>{{$e}}</li>
            @endforeach
        </ul>

    @endif
    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data"
        class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label>Titre</label>
            <input type="text" value="{{old('title')}}" name="title" class="form-control @error('title') is-invalid @enderror" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label>Fichier PDF</label>
            <input type="file" name="file_path" class="form-control @error('file_path') is-invalid @enderror"
                required>
            @error('file_path')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image_path" class="form-control @error('image_path') is-invalid @enderror"
                required>
            @error('image_path')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>

</div>
@endsection

