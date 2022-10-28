@extends('layouts.app')

@section("title") Category Manager @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Category Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="feather-list">Manage Category</h4>
                    <hr>

                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="form-inline">
                            <input type="text" class="form-control-lg form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}">
                            <button class="btn btn-lg btn-primary ml-2" type="submit">Add Category</button>
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
