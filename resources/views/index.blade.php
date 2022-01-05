@extends('layouts.master')

@section('title', '所有食譜')

@section('content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('{{ asset('img/bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><font color="#a0522d">Recipes</font></h1>
                        <hr class="small">
                        <span class="subheading"><font color="#a0522d"><b>Welcome</b></font></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <form method="GET" action='{{route('recipes.search')}}'>
                <div class="search" style="position:absolute; right:72px; font-size: 28px">
                    <input type="text" id="search" name="search" >
                </div>
                <button class="btn btn-outline-dark" type="submit" style="background-color: lavender; position:absolute; right:4px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </form>
            <div class="col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1">
                    @foreach($recipes as $recipe)
                    <div class="post-preview">
                        <img src="../img/recipe/{{$recipe->photo}}" width="300" height="300">
                        <a href="#">
                            <h4 class="post-title">
                                <a href="{{route('recipes.show',$recipe->id)}}">
                                {{ $recipe->name }}
                            </h4>
                        </a>
                    </div>

                        @endforeach
                        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a></p>

                            <hr>

                    @if(isset($recipe2))
                        @foreach($recipe2 as $show)
                            @if($show->id == $recipe->id)
                    <div>
                        <h3 class="post-subtitle" style="white-space: pre-line">
                                簡介：{{Str::limit($show->content,150)}}<br>
                                幾人份：{{ $show->person }}<br>
                                製作時長：{{ $show->time }}<br>
                                所需材料：<br>{{ $show->material }}<br>
                                步驟：<br>{{ $show->step }}<br>
                        </h3>
                        <hr>
                    </div>
                            @endif
                        @endforeach
                    @endif
                            <hr>


                        @if(isset($search2))

                            @foreach($search2 as $ss)
                                @if($ss->name == $recipe->name)
                                    <div>
                                        <h3 class="post-subtitle" style="white-space: pre-line">
                                            簡介：{{Str::limit($ss->content,150)}}<br>
                                            幾人份：{{ $ss->person }}<br>
                                            製作時長：{{ $ss->time }}<br>
                                            所需材料：<br>{{ $ss->material }}<br>
                                            步驟：<br>{{ $ss->step }}<br>
                                        </h3>
                                        <hr>
                                    </div>
                            @endif
                        @endforeach
                    @endif
            @endforeach

            <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="{{route('home.index')}}">Back &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
