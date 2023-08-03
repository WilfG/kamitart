@extends('backLayouts.index')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bids' list</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover tag_dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Price</th>
                                <th>Events</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bids as $bid)
                            <tr class="">
                                <td>{{ $bid->biderName }}</td>
                                <td>{{ $bid->biderEmail }}</td>
                                <td>{{ $bid->biderPrice }}</td>
                                <td>{{ $bid->event->title }}</td>
                               
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