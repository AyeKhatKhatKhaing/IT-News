@extends('layouts.app')

@section("title") Sample Page @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Sample</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sample Page</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="feather-feather">Sample Page</h4>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eum fugiat impedit minima placeat quaerat unde vero? Asperiores, consequuntur, corporis distinctio eum exercitationem in nihil numquam qui tempore vel voluptatum!</p>
                </div>
            </div>
        </div>
    </div>
@endsection

