@extends('manage.layouts.master')

@section('title', '食譜管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                食譜管理 <small>所有食譜列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 食譜管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <a href="{{ route('manage.recipes.create') }}" class="btn btn-success">建立新食譜</a>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="30" style="text-align: center">編號</th>
                        <th>標題</th>
                        <th width="70" style="text-align: center">詳細內容</th>
                        <th width="100" style="text-align: center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            <td style="text-align: center">{{$recipe->id}}</td>
                            <td>{{$recipe->name}}</td>
                            <td style="text-align: left">
                                簡介：{{Str::limit($recipe->content,150)}}
                                幾人份：{{ $recipe->person }}
                                製作時長：{{ $recipe->time }}
                                所需材料：{{ $recipe->material }}
                                步驟：{{ $recipe->step }}
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('manage.recipes.edit', $recipe->id) }}">編輯</a>
                                /
                                <form action="{{ route('manage.recipes.destory',  $recipe->id) }}" method="POST" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
