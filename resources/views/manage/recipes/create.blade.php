@extends('manage.layouts.master')

@section('title', '新增食譜')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                新增食譜<small>請輸入食譜內容</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 食譜管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <form action="/manage/recipes" method="POST" role="form">
                @method('POST')
                @csrf

                <div class="form-group">
                    <label for="name">標題：</label>
                    <input name="name" class="form-control" placeholder="請輸入食譜標題">
                </div>

                <div class="form-group">
                    <label for="content">簡介：</label>
                    <textarea id="content" name="content" class="form-control" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="person">幾人份：</label>
                    <textarea id="person" name="person" class="form-control" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="time">製作時長：</label>
                    <textarea id="time" name="time" class="form-control" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="material">食材：</label>
                    <textarea id="material" name="material" class="form-control" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="step">步驟：</label>
                    <textarea id="step" name="step" class="form-control" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="photo">圖片：</label>
                    <textarea id="photo" name="photo" class="form-control" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="status">狀態：</label>
                    <label class="radio-inline" for="t1">
                        <input type="radio" name="status" id="0" value="0">已上傳
                    </label>
                    <label class="radio-inline" for="t2">
                        <input type="radio" name="status" id="1" value="1">未上傳
                    </label>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-success">新增</button>
                </div>

                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection

