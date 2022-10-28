@extends('layouts.app')

@section("title") Article Detail @endsection
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
        <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>{{ $article->title }}</h4>
                    <div class="text-primary font-weight-bolder">
                        <span class="mr-2 feather-user">{{ $article->user->name }}</span>
                        <span class="mr-2 feather-layers">{{ $article->category->title }}</span>
                        <span class="mr-2 feather-calendar">{{$article->created_at->format("d-m-Y")}}</span>
                        <span class="mr-2 feather-clock ">{{$article->created_at->format("h:i A")}}</span>
                    </div>
                    <hr>
                    <p class="description">{{ $article->description }}</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{route('article.edit',$article->id)}}" class="btn btn-outline-primary">
                                Edit
                            </a>
                            <a href="{{route('article.index')}}" class="btn btn-outline-dark">
                                Article List
                            </a>
                            <form action="{{ route('article.destroy',$article->id) }}" method="post" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete this article?')">Delete</button>
                            </form>
                        </div>
                        <p class="mb-0">{{ $article->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

