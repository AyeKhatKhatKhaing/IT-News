@extends('layouts.app')

@section("title") Article Create @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="feather-plus-circle">Add Article</h4>
                    <form action="{{ route('article.store') }}" method="post" id="articleForm">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label>Select Category</label>
                        <select name="category" form="articleForm" class="custom-select custom-select-lg @error('category') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}" {{ $c->id == old('category') ? 'selected':''}}>{{ $c->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 mt-3">
            <div class="card">
                <div class="card-body">
                        <div class="form-group mb-0" >
                            <label>Aticle Title</label>
                            <input type="text" name="title" form="articleForm" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                        </div>
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        <div class="form-group mb-0">
                            <label>Aticle Description</label>
                            <textarea name="description" form="articleForm" rows="15" class="description form-control @error('description') is-invalid @enderror">
                                {{ old('description') }}
                            </textarea>
                        </div>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <button class="btn btn-primary btn-block" form="articleForm" type="submit">Add Article</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

