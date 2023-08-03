@extends('backLayouts.index')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Posts list</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover tag_dataTable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr class="">
                                <td>{{ $post->title }}</td>
                                
                                <td>
                                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" ><i class="fas fa-eye"></i></a>
                                    <a href="{{route('posts.edit', $post->id)}}" data-toggle="tooltip" title="Modifier" class="btn btn-warning btn-xs"><i class="fas fa-edit "></i> </a>
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