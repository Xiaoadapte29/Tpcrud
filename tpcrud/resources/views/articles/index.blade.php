@extends('base')

@section('right')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Articles</h2>
            <a href="{{ route('articles.create') }}" class="btn btn-success">Add New</a>
        </div>
        
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="20%">Title</th>
                            <th width="15%">Image</th>
                            <th width="15%">File</th>
                            <th width="25%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td class="text-center">
                                    @if($article->image_path)
                                    <img src="{{ Storage::url($article->image_path) }}" width="80" class="img-thumbnail">
                                    @else
                                    <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($article->file_path)
                                    <a href="{{ Storage::url($article->file_path) }}" class="btn btn-sm btn-outline-primary" download>
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                    
                                    @else
                                        <span class="text-muted">No file</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('sidebar')

<div class="container-fluid">
    <div class="row flex-nowrap">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-5 d-none d-sm-inline">Menu</span>
    </a>
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
    <li class="nav-item">
    <a href="#" class="nav-link align-middle px-0">
    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"  style="color: aliceblue">Home</span>
    </a>
    </li>
    <li>
    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline" style="color: aliceblue"  >Dashboard</span>
    </a>
    <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
    <li class="w-100">
    <a href="#" class="nav-link px-0"  style="color: aliceblue"> <span class="d-none d-sm-inline"  style="color: aliceblue">Item</span> 1 </a>
    </li>
    <li>
    <a href="#" class="nav-link px-0"  style="color: aliceblue" > <span class="d-none d-sm-inline"  style="color: aliceblue">Item</span> 2 </a>
    </li>
    </ul>
    </li>
    <li>
    <a href="#" class="nav-link px-0 align-middle">
    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline"  style="color: aliceblue">Orders</span>
    </a>
    </li>
    <li>
    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline"  style="color: aliceblue">Bootstrap</span>
    </a>
    <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
    <li class="w-100">
    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"  style="color: aliceblue">Item</span> 1</a>
    </li>
    <li>
    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"  style="color: aliceblue">Item</span> 2</a>
    </li>
    </ul>
    </li>
    <li>
    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline"  style="color: aliceblue">Products</span>
    </a>
    <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
    <li class="w-100">
    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"  style="color: aliceblue">Product</span> 1</a>
    </li>
    <li>
    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"  style="color: aliceblue">Product</span> 2</a>
    </li>
    <li>
    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"  style="color: aliceblue">Product</span> 3</a>
    </li>
    <li>
    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"  style="color: aliceblue">Product</span> 4</a>
    </li>
    </ul>
    </li>
    <li>
    <a href="#" class="nav-link px-0 align-middle">
    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline"  style="color: aliceblue">Customers</span>
    </a>
    </li>
    </ul>
    <hr>
    <div class="dropdown pb-4">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
    <span class="d-none d-sm-inline mx-1">loser</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
    <li><a class="dropdown-item" href="#" >New project...</a></li>
    <li><a class="dropdown-item" href="#">Settings</a></li>
    <li><a class="dropdown-item" href="#">Profile</a></li>
    <li>
    <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
