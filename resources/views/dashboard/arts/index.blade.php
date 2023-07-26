@extends('backLayouts.index')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Arts list</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover tag_dataTable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Sale Price</th>
                                <th>Owner / Creator</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arts as $art)
                                @if($art->status == 1)
                                    @php
                                        $status = 'Sold';
                                        $color = 'danger';
                                    @endphp
                                @elseif($art->status == 0)
                                    @php
                                        $status = 'Available';
                                        $color = 'success';
                                    @endphp
                                @endif
                                @foreach($categories as $categorie)
                                    @if($art->categorie_id == $categorie->id)
                                        @php
                                            $categorie_name = $categorie->name;
                                        @endphp
                                    @endif
                                @endforeach
                                @foreach($artists as $artist)
                                    @if($art->artist_id == $artist->id)
                                        @php
                                            $artist_name = $artist->firstname .' '. $artist->lastname;
                                        @endphp
                                    @endif
                                @endforeach
                            <tr class="">
                                <td>{{ $art->title }}</td>
                                <td>{{ $art->description }}</td>
                                <td class="alert alert-{{$color}}">{{ $status }}</td>
                                <td>{{ $art->sale_price }}</td>
                                <td>{{ $artist_name }}</td>
                                <td>{{ $categorie_name }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Voir les pièces jointes"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('arts.edit', $art->id)}}" data-toggle="tooltip" title="Modifier" class="btn btn-warning btn-xs"><i class="fa fa-edit "></i> </a>
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