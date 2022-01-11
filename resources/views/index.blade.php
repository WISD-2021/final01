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
                                <h4 class="div2" style="white-space: pre-line">
                                    簡介：{{Str::limit($show->content,150)}}<br>
                                    人數：{{ $show->person }}<br>
                                    製作時長：{{ $show->time }}<br>
                                    所需材料：<br>{{ $show->material }}<br>
                                    步驟：<br>{{ $show->step }}<br>
                                </h4>
                                <div class="div2">
                                @if(\Illuminate\Support\Facades\Auth::check())

                                        <form action='{{route('recipes.create',$show->id)}}'>
                                            <button class="btn btn-outline-dark" type="submit">加入我的最愛</button>
                                        </form>
                                        <form method="GET" action='{{route('comments.create',$show->id)}}'>
                                            <p style="margin-top: 30px; margin-bottom: 10px">
                                                <textarea name="mycomment" rows="6" cols="40" required></textarea>
                                                <button class="btn btn-outline-dark" type="submit">留言</button>
                                            </p>
                                        </form>
                                @endif
                                    <?php
                                    $comments = DB::table('comments')->where('recipe_id',$show->id)->get();
                                    $users = DB::table('users')->orderBy('id','ASC')->get();
                                    ?>
                                    <p>所有留言</p><hr>
                                    @if(isset($comments))
                                        @foreach($comments as $cc)
                                            @if($cc->recipe_id == $show->id)
                                                @foreach($users as $user)
                                                    @if($user->id == $cc->user_id)
                                                        <h5 style="white-space: pre-line">
                                                            {{ $user->name }}：{{Str::limit($cc->content,150)}}
                                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                                <form action="{{ route('comments.destroy',$cc->id) }}" method="POST" style="display: inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-outline-dark" type="submit" style="width:100px;height:30px; padding:5px 5px;">刪除評論</button>
                                                                </form>
                                                            @endif
                                                                <?php
                                                                    $replies = DB::table('replies')->where('comment_id',$cc->id)->get();
                                                                    //$_SESSION['cc_id']=$cc->id;
                                                                ?>
                                                                @if(isset($replies))
                                                                <?php
                                                                    $_SESSION['cc_id']=$cc->id;
                                                                ?>
                                                                    @foreach($replies as $rr)
                                                                            @foreach($users as $user)
                                                                                @if($user->id == $rr->user_id)
                                                                                    <h6 style="white-space: pre-line; color: #0f6674">
                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->name }}：{{Str::limit($rr->content,150)}}
                                                                                    </h6>
                                                                                @endif
                                                                            @endforeach
                                                                    @endforeach
                                                                @endif
                                                                @if(\Illuminate\Support\Facades\Auth::check())
                                                                    <form  method="GET" action='{{route('replies.create',$cc->id)}}' style="display: inline">
                                                                        <p style="margin-top: 10px; margin-bottom: 10px">
                                                                            <?php
                                                                                echo "<input name='cc_id' value='".$cc->id."' hidden>";
                                                                            ?>
                                                                             <textarea name="myreply" rows="2" cols="20" style=" padding:0px 0px;" required></textarea>
                                                                             <button class="btn btn-outline-dark" type="submit" style="width:100px;height:30px; padding:5px 5px;">回復評論</button>
                                                                        </p>
                                                                    </form>
                                                                @endif


                                                        </h5>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                            @endforeach
                            @endif
                            <!-- Pager -->

                            </div>
            </div>
        </div>
@endsection
