@extends("Blog.master")
@section("content")
    <div class="">
        <div class="py-3">

            <h2 class="fw-bolder">{{$article->title}} </h2>
            <div class="my-3 feature-image-box">
                <div class="d-block d-md-flex justify-content-between align-items-center my-3">

                    <div class="">
                        <img  src="{{ isset($article->user->photo) ? asset('storage/profile/'.$article->user->photo) : asset('dashboard/img/user-default-photo.png') }}"
                                     class="avatar avatar-30 photo rounded-circle" height="30" width="30"
                                     loading="lazy">
                        <a href="{{route('byUser',$article->user->slug)}}" class="text-decoration-none font-weight-bolder" title="Visit admin’s website" rel="author external">{{$article->user->name}}</a></div>

                    <div class="text-primary">
                        <i class="feather-calendar"></i>
                        <a href="{{route('byDate',$article->created_at->format("Y-m-d h:i:s"))}}" class="text-decoration-none font-weight-bolder" title="Visit admin’s website" rel="author external">{{$article->created_at->format("d M Y h:i a")}}</a>
                    </div>
                </div>

                <p style="white-space: pre-line"> {{ $article->description }}</p>
                @php

                    $prevArticle=\App\Article::where("id","<",$article->id)->latest()->first();
                    $nextArticle=\App\Article::where("id",">",$article->id)->first();

                @endphp

                <div class="nav d-flex justify-content-between p-3">
                    <a href="{{ isset($prevArticle)? route('detail',$prevArticle->slug): '#'}}" class="btn btn-outline-primary page-mover rounded-circle
                    @empty($prevArticle) disabled @endempty">
                        <i class="feather-chevron-left"></i>
                    </a>

                    <a class="btn btn-outline-primary px-3 rounded-pill" href="{{ route('index') }}">
                        Read All
                    </a>

                    <a href="{{isset($nextArticle)? route('detail',$nextArticle->slug) : '#' }}" class="btn btn-outline-primary page-mover rounded-circle
                    @empty($nextArticle) disabled @endempty">
                        <i class="feather-chevron-right"></i>
                    </a>
                </div>
            </div>


        </div>

        <div class="d-block d-lg-none d-flex justify-content-center">
        </div>

    </div>
@endsection
