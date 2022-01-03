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
                        <h1><font color="#8A6BBE">Recipes</font></h1>
                        <hr class="small">
                        <span class="subheading"><font color="#8A6BBE">Welcome</font></span>
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
                        <img src="../img/recipe/{{$recipe->photo}}" width="300" height="300">

                        <a href="{{route('recipes.show',$recipe->id)}}">
                            <h4 class="post-title">

                        <a href="#">
                            <h2 class="post-title">

                                {{ $recipe->name }}
                            </h2>
                        </a>

                    </div>
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
                    @endforeach
                        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a></p>
                    <!-- Pager -->

                            <h3 class="post-subtitle" style="white-space: pre-line">
                                簡介：{{Str::limit($recipe->content,150)}}<br>
                                幾人份：{{ $recipe->person }}<br>
                                製作時長：{{ $recipe->time }}<br>
                                所需材料：<br>{{ $recipe->material }}<br>
                                步驟：<br>{{ $recipe->step }}<br>
                            </h3>

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
