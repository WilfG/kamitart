@extends('backLayouts.index')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Posts categories list</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover tag_dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $categorie)
                            <tr class="">
                                <td>{{ $categorie->name }}</td>
                                
                                <td>
                                    <a href="{{route('postcategories.show', $categorie->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" ><i class="fa fa-eye"></i></a>
                                    <a href="{{route('postcategories.edit', $categorie->id)}}" data-toggle="tooltip" title="Modifier" class="btn btn-warning btn-xs"><i class="fa fa-edit "></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</section>
@endsection