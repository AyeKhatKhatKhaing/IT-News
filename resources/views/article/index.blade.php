@extends('layouts.app')

@section("title") Sample Page @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="feather-list">Article List</h4>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <a class="btn btn-outline-primary btn-lg feather-plus-circle mr-3" href="{{ route('article.create') }}">Add Article</a>
                            @isset(request()->search)
                                <a class="btn btn-outline-dark btn-lg feather-list mr-3" href="{{ route('article.index') }}">Article List</a>
                            @endisset
                        </div>
                        <form action="{{ route('article.index') }}" method="get">
                            <div class="form-inline">
                                <input type="text" class="form-control form-control-lg" name="search" placeholder="Search Article">
                                <button class="btn btn-primary btn-lg feather-search ml-2" type="submit"></button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    @if(session('message'))
                        <p class="alert alert-success">{{ session('message') }}</p>
                    @endif
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Article</td>
                            <td>Owner</td>
                            <td>Category</td>
                            <td>Controls</td>
                            <td>Created At</td>
                        </tr>
                        </thead>
                        <tbody>
                      @forelse($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>
                                    <span class="font-weight-bolder">{{ \Illuminate\Support\Str::words($article->title,5) }}</span><br>
                                    <small class="text-muted">{{ \Illuminate\Support\Str::words($article->description,8) }}</small>
                                </td>
                                <td>{{ $article->user->name }}</td>
                                <td>{{ $article->category->title }}</td>
                                <td class="text-nowrap">
                                    <a href="{{route('article.show',$article->id)}}" class="btn btn-outline-success">
                                        Show
                                    </a>
                                    <a href="{{route('article.edit',$article->id)}}" class="btn btn-outline-primary">
                                        Edit
                                    </a>
                                    <form action="{{ route('article.destroy',[$article->id,'page'=>request()->page]) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete {{$article->title}}')">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <span class="feather-calendar">{{$article->created_at->format("d m Y")}}</span>
                                    <br>
                                    <span class="feather-clock ">{{$article->created_at->format("h i A")}}</span>
                                </td>
                            </tr>
                      @empty
                          <tr>
                              <td colspan="6" class="text-center">There is no Article</td>
                          </tr>

                      @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        {{ $articles->appends(request()->all())->links() }}
                        <p class="h4 font-weight-bolder">Total : {{ $articles->total() }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

