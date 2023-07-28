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
                        <h3 class="card-title">Add Artist<small></small></h3>
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
                        <form action="{{ route('artists.store') }}" role="form" method="post" enctype="multipart/form-data" id="form-notif">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="firstname">Firstname :</label>
                                    <input type="text" name="firstname" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="lastname">Lastname :</label>
                                    <input type="text" name="lastname" class="form-control" required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="phoneNumber">Phone Number :</label>
                                    <input type="text" name="phoneNumber" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="email">Email :</label>
                                    <input type="email" name="email" class="form-control">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <label for="country-dd">Country:</label>
                                    <select id="country-dd" name="country" class="form-control">
                                        <option value="">Select Country</option>
                                        @foreach ($data['countries'] as $dt)
                                        <option value="{{$dt->id}}">
                                            {{$dt->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <label for="state-dd">States:</label>
                                    <select id="state-dd" name="state" class="form-control" required>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <label for="city-dd">Cities:</label>
                                    <select id="city-dd" name="city" class="form-control" required>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="birthdate">Birth date:</label>
                                    <input type="date" name="birthdate" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="address">Address :</label>
                                    <input type="text" name="address" class="form-control">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="birthdate">Bio:</label>
                                    <textarea name="bio" class="form-control" required></textarea>
                                </div>
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="artPath">Artist's Photo :</label>
                                    <input type="file" accept=".png,.gif,.jpg,.webp,.pdf" id="artistPath" name="artistPath" class="form-control" required="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <label for="featured">Featured :</label>
                                    <select id="featured" name="featured" required="">
                                        <option value="@php echo 1; @endphp">Yes</option>
                                        <option value="@php echo 0; @endphp">No</option>
                                    </select>
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
<script src="/assets/js/main.min.js"></script>
<script>
    $(document).ready(function() {
        $('#country-dd').on('change', function() {
            var idCountry = this.value;
            $("#state-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function(key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });
        $('#state-dd').on('change', function() {
            var idState = this.value;
            $("#city-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(res.cities, function(key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection