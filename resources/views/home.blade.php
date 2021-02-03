@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body" style="padding: 20px;">
                    <h3>{{ __('MadMin Blog') }}</h3>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @if(Auth::user()->role_id === 1 && Auth::user()->is_active)
                        <a href="/admin" class="btn">Visit Dashboard</a>
                    @endif

                    <div class="row">
                        <div class="col s12">
                          <ul class="tabs">
                            <li class="tab col s2"><a href="#test1">All</a></li>
                            @if($categories)
                                @php $a = 2; @endphp
                                @foreach($categories as $category)
                                    <li class="tab col s2"><a href="#test{{$a++}}">{{$category->name}}</a></li>
                                @endforeach
                            @endif
                          </ul>
                        </div>
                        <div id="test1" class="col s12">
                            @if($posts)
                                @foreach($posts as $post)
                                    <div class="card sticky-action col s5" style="">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator" src="{{ $post->photo->file }}">
                                        </div>
                                        <div class="card-action">
                                            <span class="card-title activator grey-text text-darken-4">{{$post->title}} </span>
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title activator grey-text text-darken-4">{{$post->title}}<i class="material-icons right" style="font-weight: bold; font-style:normal;">X</i></span>
                                            <br>
                                            <span style="font-size: 15px;"><b>Updated at:</b> {{ $post->updated_at->diffForHumans() }}</span>
                                            <br> 
                                            {{$post->body}}
                                            <br>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @if($categories)
                        @php $a = 2; @endphp
                            @foreach($categories as $category)
                            <div id="test{{$a++}}" class="col s12">
                                @foreach($posts as $post)
                                    @if ($post->category_id == $category->id)
                                        <div class="card sticky-action col s5" style="">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator" src="{{ $post->photo->file }}">
                                            </div>
                                            <div class="card-action">
                                                <span class="card-title activator grey-text text-darken-4">{{$post->title}} </span>
                                            </div>
                                            <div class="card-reveal">
                                                <span class="card-title activator grey-text text-darken-4">{{$post->title}}<i class="material-icons right" style="font-weight: bold; font-style:normal;">X</i></span>
                                                <br>
                                                <span style="font-size: 15px;"><b>Updated at:</b> {{ $post->updated_at->diffForHumans() }}</span>
                                                <br> 
                                                {{$post->body}}
                                                <br>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

