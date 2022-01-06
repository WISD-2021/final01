@extends('manage.layouts.master')

@section('title', '食譜管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                食譜管理
            </h1>
    </div>
    </div>
    <!-- /.row -->

    <div class="row" style="margin-bottom: 10px; text-align: right">
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
                        <th width="30" style="text-align: left">編號</th>
                        <th width="70">標題</th>
                        <th width="70" style="text-align: left">簡介</th>
                        <th width="70" style="text-align: left">幾人份</th>
                        <th width="70" style="text-align: left">製作時長</th>
                        <th width="150" style="text-align: left">所需材料</th>
                        <th width="150" style="text-align: left">步驟</th>
                        <th width="70" style="text-align: left"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>

                            <td style="text-align: left">{{$recipe->id}}</td>
                            <td style="text-align: left">{{$recipe->name}}</td>
                            <td style="text-align: left">{{Str::limit($recipe->content,150)}}</td>
                            <td style="text-align: left">{{ $recipe->person }}</td>
                            <td style="text-align: left">{{ $recipe->time }}</td>
                            <td style="text-align: left">{{ $recipe->material }}<br></td>
                            <td style="text-align: left">{{ $recipe->step }}<br></td>

                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('manage.recipes.edit', $recipe->id) }}">編輯</a>
                                <form action="{{ route('manage.recipes.destroy',  $recipe->id) }}" method="POST" style="display:inline">
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
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
@endsection
