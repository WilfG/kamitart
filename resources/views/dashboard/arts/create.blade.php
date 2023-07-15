@extends('backLayouts.index')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add an Art<small></small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                    @if (session('errors'))
                        <div class="mb-4 font-medium text-sm text-green-600 alert alert-danger">
                            {{ session('errors') }}
                        </div>
                        @endif
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600 alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form role="form" action="{{ route('arts.store') }}" method="post" enctype="multipart/form-data" id="form-notif">
                            @csrf('POST')
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="title">Title :</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="description">Description :</label>
                                    <textarea name="description" class="form-control" required></textarea>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="status">Status :</label>
                                    <select name="status" class="form-control" required>
                                        <option value=""></option>
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="sale_price">Sale price ($) :</label>
                                    <input type="number"  min="0" name="sale_price" class="form-control">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="artist_id">Artist :</label>
                                    <select name="artist_id" class="form-control" required>
                                    <option value=""></option>
                                        @foreach($artists as $artist)
                                        <option value="{{ $artist->id }}">{{ $artist->firstname .' '. $artist->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="artist_id">Category :</label>
                                    <select name="categorie_id" class="form-control" required>
                                    <option value=""></option>
                                        @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                           
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="artPath">Art's Image :</label>
                                    <input type="file" accept=".png,.gif,.jpg,.webp,.pdf" id="artPath" name="artPath" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <button class="btn btn-success pull-right" type="submit">Enregistrer </button>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>
</section>
@endsection