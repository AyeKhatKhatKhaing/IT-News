@extends('layouts.app')

@section("title") Article Edit @endsection
@section('head')
    <style>
        .description{
            white-space: pre-line;
        }
    </style>
@endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="feather-edit-2">Edit Article</h4>
                    <form action="{{ route('article.update',$article->id) }}" method="post" id="editArticle">
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label>Select Category</label>
                        <select name="category" form="editArticle" class="custom-select custom-select-lg @error('category') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}" {{ $c->id == old('category',$article->category_id) ? 'selected':''}}>{{ $c->title }}</option>
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
                        <input type="text" name="title" form="editArticle" value="{{ old('title',$article->title) }}" class="form-control @error('title') is-invalid @enderror">
                    </div>
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group mb-0">
                        <label>Aticle Description</label>
                        <textarea name="description" form="editArticle" rows="15" class="description form-control @error('description') is-invalid @enderror">
                                {{ old('description',$article->description) }}
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
                        <button class="btn btn-primary btn-block" form="editArticle" type="submit">Update</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

