@extends('layouts.master')

@section('title', '所有食譜')

@section('content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('{{ asset('img/home-bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Recipes</h1>
                        <hr class="small">
                        <span class="subheading">Welcome</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    @foreach($recipes as $recipe)
                    <div class="post-preview">
                        <a href="#">
                            <img src="../img/recipe/{{$recipe->photo}}" width="300" height="300">
                            <h2 class="post-title">
                                {{ $recipe->name }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{Str::limit($recipe->content,150)}}
                            </h3>
                        </a>
                        <hr>
                        @endforeach
                        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
                    </div>
                    <hr>

            <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
