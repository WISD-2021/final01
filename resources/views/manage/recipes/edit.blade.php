@extends('manage.layouts.master')

@section('title', '編輯食譜')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                編輯食譜<small>編輯食譜內容</small>
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
            <form action="/manage/recipes/{{$recipe->id}}" method="POST" role="form">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name1">標題：</label>
                    <input name="name1" class="form-control" name="name" value="{{old('name',$recipe->name)}}">
                </div>

                <div class="form-group">
                    <label for="content1">簡介：</label>
                    <textarea name="content1" class="form-control" rows="10"> {{ old('content',$recipe->content) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="person1">幾人份：</label>
                    <textarea  name="person1" class="form-control" rows="10"> {{ old('person',$recipe->person) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="time1">製作時長：</label>
                    <textarea  name="time1" class="form-control" rows="10"> {{ old('time',$recipe->time) }}</textarea>
                </div>

                <div class="form-group">
                <label for="material1">製作食材：</label>
                    <textarea name="material1" class="form-control" rows="10"> {{ old('material',$recipe->material) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="step1">步驟：</label>
                    <textarea  name="step1" class="form-control" rows="10"> {{ old('step',$recipe->step) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="photo1">圖片：</label>
                    <textarea name="photo1" class="form-control" rows="10">{{ old('photo',$recipe->photo) }}</textarea>
                </div>

                @if($recipe->status=='0')
                    <div class="form-group">
                        <label for="status1">上傳狀態：</label>
                        <label class="radio-inline" for="t1">
                            <input type="radio" name="status" id="0" value="0" checked>已上傳
                        </label>

                        <label class="radio-inline" for="t2">
                            <input type="radio" name="status" id="1" value="1">未上傳
                        </label>
                    </div>
                @else
                    <div class="form-group">
                        <label for="status1">上傳狀態：</label>
                        <label class="radio-inline" for="t1">
                            <input type="radio" name="status" id="0" value="0">已上傳
                        </label>
                        <label class="radio-inline" for="t2">
                            <input type="radio" name="status" id="1" value="1" checked>未上傳
                        </label>
                    </div>
                @endif

                <div class="text-right">
                    <button type="submit" class="btn btn-success">更新</button>
                </div>

            </form>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </div>
    </div>
    <!-- /.row -->
@endsection
