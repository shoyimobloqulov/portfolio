@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tizimdagi Kategoriyalar
            <small> ro'yhati</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Bosh sahifa</a></li>
            <li class="active">Ranglar</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-9">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="dataTable2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 25px;">#</th>
                                <th>Asosiy</th>
                                <th>Qo'shimcha</th>
                                <th>Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0
                            @endphp
                            @foreach ($category as $o)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $o->name }}</td>
                                    <td>{{ $o->parent->name ?? "" }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('category.show',$o->id) }}" ><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-primary" href="{{ route('category.edit',$o->id) }}" ><i class="fa fa-pencil"></i></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $o->id],'style'=>'display:inline']) !!}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] ) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $category->render() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-xs-3">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nomi</label>
                                <input type="text" class="form-control" name="name">
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('parent_id')?'has-error':''}}">
                                <label for="countries_id">Kategoriya</label>
                                <select class="form-control select2" id="parent_id" style="width: 100%;" name="parent_id">
                                    <option value="0">Parent</option>
                                    @foreach($categoryList as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('parent_id'))
                                    <span class="help-block">{{ $errors->first('parent_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success">Qo'shish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
