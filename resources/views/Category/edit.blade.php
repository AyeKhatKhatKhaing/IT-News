@extends('layouts.app')

@section("title") Edit Category @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Manager</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="feather-list">Edit Category</h4>
                    <hr>

                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-inline">
                            <input type="text" class="form-control-lg form-control @error('title') is-invalid @enderror" name="title" value="{{old('title',$category->title)}}">
                            <button class="btn btn-lg btn-primary ml-2" type="submit">Update</button>
                        </div>
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </form>
                    <hr>
                    @if(session("message"))
                        <span class="text-success">{{session("message")}}</span>
                    @endif

                    @include('Category.list')

                </div>
            </div>
        </div>
    </div>
@endsection
