@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tizimdagi Portfoliolar
            <small> ro'yhati</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Bosh sahifa</a></li>
            <li class="active">Portfolio</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('portfolios.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Qo'shish</a>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="dataTable2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 25px;">#</th>
                                <th>Mavzu</th>
                                <th>Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0
                            @endphp
                            @foreach ($portfolios as $o)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $o->subject }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('portfolios.show',$o->id) }}" ><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-primary" href="{{ route('portfolios.edit',$o->id) }}" ><i class="fa fa-pencil"></i></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['portfolios.destroy', $o->id],'style'=>'display:inline']) !!}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] ) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $portfolios->render() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
