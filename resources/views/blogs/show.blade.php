@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kategoriyani ko'rish
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Bosh sahifa</a></li>
            <li class="">Kategoriya</li>
            <li class="active">{{ $category->name }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nomi: </th>
                                <th>{{ $category->name }}</th>
                            </tr>

                            <tr>
                                <th>Bog'langan: </th>
                                <th>{{ $category->parent->name ?? "Bog'lamlar yo'q" }}</th>
                            </tr>
                        </table>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="flat-red" checked>
                            </label>
                            <label>
                                <input type="checkbox" class="flat-red">
                            </label>
                            <label>
                                <input type="checkbox" class="flat-red" disabled>
                                Flat green skin checkbox
                            </label>
                        </div>
                        <form action="">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th><input type="checkbox" class="minimal" disabled></th>
                                </tr>
                            </table>
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
