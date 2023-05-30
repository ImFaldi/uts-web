@extends('layout.dashboardLayout')

@section('title', 'Table')

@section('nav_table', 'active')

@section('page', 'Table')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                    <strong>Success!</strong> {{ session('success') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('failed'))
                <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
                    <strong>Failed!</strong> {{ session('failed') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                
            {{-- Portofolio table --}}
            <div class="card mb-4">
                <div class="col-12">
                    <div class="card-header pb-0 col-4">
                        <h6>Portofolio table</h6>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-block btn-success mb-3" data-bs-toggle="modal"
                                data-bs-target="#modal-form">Create</button>
                            {{--  portofolio form  --}}
                            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog"
                                aria-labelledby="modal-form" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card card-plain">
                                                <div class="card-header pb-0 text-left">
                                                    <h3 class="font-weight-bolder text-info text-gradient">Add Portofolio
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <form role="form text-left" method="POST"
                                                        action="{{ route('portofolio.store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <label>Title</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Title"
                                                            aria-label="title" name="title" id="title">
                                                        </div>
                                                        <label>Category</label>
                                                        <div class="input-group mb-3">
                                                            <select class="form-control" name="category_id" id="category_id">
                                                                <option value="">-- Select Category --</option>
                                                                @foreach ($category as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <label>Description</label>
                                                        <div class="input-group mb-3">
                                                            <textarea class="form-control" placeholder="Description" aria-label="description" name="description"></textarea>
                                                        </div>
                                                        <label>Upload Image</label>
                                                        <div class="input-group mb-3">
                                                            <input type="file" class="form-control"
                                                                placeholder="Upload Image" aria-label="upload image"
                                                                name="image">
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit"
                                                                class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Create</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Title</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Description</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Image</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($portofolio as $row)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $row->title }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->description }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><img
                                                        src="{{ asset('images/' . $row->image) }}" alt=""
                                                        width="100px"></p>
                                            </td>
                                            <td class="align-middle">
                                                {{-- modal edit --}}
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modal-edit{{ $row->id }}">Edit</button>
                                                <div class="modal fade" id="modal-edit{{ $row->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-md"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card card-plain">
                                                                    <div class="card-header pb-0 text-left">
                                                                        <h3
                                                                            class="font-weight-bolder text-info text-gradient">
                                                                            Add Portofolio
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form role="form text-left" method="POST"
                                                                            action="{{ route('portofolio.update', $row->id) }}"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            <label>Title</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Title" aria-label="title"
                                                                                    name="title" id="title"
                                                                                    value="{{ $row->title }}">
                                                                            </div>
                                                                            <label>Description</label>
                                                                            <div class="input-group mb-3">
                                                                                <textarea class="form-control" placeholder="Description" aria-label="description" name="description"
                                                                                    value="{{ $row->description }}"></textarea>
                                                                            </div>
                                                                            <label>Upload Image</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="file" class="form-control"
                                                                                    placeholder="Upload Image"
                                                                                    aria-label="upload image"
                                                                                    name="image"
                                                                                    value="{{ $row->image }}">
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <button type="submit"
                                                                                    class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Create</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('portofolio.delete', $row->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- category table --}}
            <div class="card mb-4">
                <div class="col-12">
                    <div class="card-header pb-0 col-4">
                        <h6>Category table</h6>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-block btn-success mb-3" data-bs-toggle="modal"
                                data-bs-target="#modal-form-category">Create</button>
                            {{--  category form  --}}
                            <div class="modal fade" id="modal-form-category" tabindex="-1" role="dialog"
                                aria-labelledby="modal-form" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card card-plain">
                                                <div class="card-header pb-0 text-left">
                                                    <h3 class="font-weight-bolder text-info text-gradient">Add Category
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <form role="form text-left" method="POST"
                                                        action="{{ route('category.store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <label>Category Name</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Category Name" aria-label="category"
                                                                name="name" id="name">
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit"
                                                                class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Create</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            ID</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $row)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $row->id }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $row->name }}</p>
                                            </td>
                                            <td class="align-middle">
                                                {{-- modal edit --}}
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modal-edit-category{{ $row->id }}">Edit</button>
                                                <div class="modal fade" id="modal-edit-category{{ $row->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-md"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card card-plain">
                                                                    <div class="card-header pb-0 text-left">
                                                                        <h3
                                                                            class="font-weight-bolder text-info text-gradient">
                                                                            Update Category
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form role="form text-left" method="POST"
                                                                            action="{{ route('category.update', $row->id) }}"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            <label>Name Category</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Category Name" aria-label="name"
                                                                                    name="name" id="name"
                                                                                    value="{{ $row->name }}">
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <button type="submit"
                                                                                    class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Create</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('category.delete', $row->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
