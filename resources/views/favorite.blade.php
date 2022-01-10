@extends('layouts.master')

@section('title', '我的最愛')

@section('content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
           <div class="col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1">
                @foreach($favorites as $favorite)
                    @foreach($recipes as $recipe)
                         @if($favorite->recipe_id == $recipe->id)
                                @if($favorite->user_id == auth()->user()->id)
                                    <div class="div2">
                                        <img src="../img/recipe/{{$recipe->photo}}" width="200" height="200">
                                        <a href="#">
                                            <h3 class="post-title">
                                                <a href="{{route('recipes.show',$recipe->id)}}">
                                                {{ $recipe->name }}
                                            </h3>
                                        </a>
                                        <div  class="div2">
                                           <form action="{{ route('favorites.destroy',$favorite->id) }}" method="POST" style="display: inline">
                                               @method('DELETE')
                                               @csrf
                                              <button class="btn btn-outline-dark" type="submit">移出我的最愛</button>
                                           </form>
{{--                                            <a href="{{ route('favorites.destroy',$favorite->id) }}" class="btn btn-outline-dark" onClick="return confirm('確定要移出此食譜?')">移出我的最愛</a>--}}
                                        </div>
                                    </div>
                                @endif
                          @endif
                    @endforeach
                @endforeach
           </div>
        </div>
    </div>
@endsection
