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
                        <h3 class="card-title">Add Post Category<small></small></h3>
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
                        <form action="{{ route('postcategories.store') }}" role="form" method="post" enctype="multipart/form-data" id="form-notif">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="name">Name :</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <br>
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