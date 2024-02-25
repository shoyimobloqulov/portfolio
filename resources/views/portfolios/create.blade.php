@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tizimdagi Bloglar
            <small> blog</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Bosh sahifa</a></li>
            <li class="active">blog</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bloglar</h3>
                    </div>

                    <form role="form" action="{{ route('portfolios.store') }}" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="subject">Mavzu</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Mavzu">
                            </div>
                            <div class="form-group">
                                <label for="desc">Mavzu</label>
                                <textarea class="form-control" id="desc" name="desc"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Categoriyalar</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a Categoriyalar" name="category[]" style="width: 100%;">
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Yuborish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
