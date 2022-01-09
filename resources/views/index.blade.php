@extends('layouts.master')

@section('title', '食譜')

@section('content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
{{--    <header class="intro-header" style="background-image: url('{{ asset('img/bg.jpg') }}')">--}}
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
{{--                        <h1><font color="#a0522d">Recipes</font></h1>--}}
{{--                        <hr class="small">--}}
{{--                        <span class="subheading"><font color="#a0522d"><b>Welcome</b></font></span>--}}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <form method="GET" action='{{route('recipes.search')}}'>
                <div class="" style="position:absolute; right:72px; font-size: 28px ">
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
                    <div class="div1">
                        <img src="../img/recipe/{{$recipe->photo}}" width="200" height="200">
                        <a href="#">
                            <h3 class="post-title">
                                <a href="{{route('recipes.show',$recipe->id)}}">
                                {{ $recipe->name }}
                            </h3>
                        </a>
                    </div>
                     @endforeach

                    @if(isset($recipe2))
                        @foreach($recipe2 as $show)
                            @if($show->id == $recipe->id)
                                <?php
                                    session_start();
                                    $_SESSION['id']=$show->id;
                                ?>
                    <div>
                        <h3 class="div2" style="white-space: pre-line">
                                簡介：{{Str::limit($show->content,150)}}<br>
                                幾人份：{{ $show->person }}<br>
                                製作時長：{{ $show->time }}<br>
                                所需材料：<br>{{ $show->material }}<br>
                                步驟：<br>{{ $show->step }}<br>
                        </h3>
                        <div  class="div2">
                            <form action='{{route('recipes.create',$show->id)}}'>
                                <button class="btn btn-outline-dark" type="submit" style="background-color: lavender;">加入我的最愛</button>
                            </form>
                        </div>
                    </div>
                            @endif
                        @endforeach
                    @endif


            <!-- Pager -->

            </div>
        </div>
    </div>
@endsection
