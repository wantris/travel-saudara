@extends('admin.template')

@section('title') {{'Daftar Jadwal Travel'}} @endsection

@section('breadcumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Jadwal Travel</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@push('custom-style')
     <!-- Select2 -->
    <link rel="stylesheet" href="{{url('assets/admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3 text-right">
            <a href="{{route('admin.schedule.index')}}" class="btn btn-primary"><i class="fad fa-backward mr-2"></i>Kembali</a>
        </div>
        <div class="col-12">
            <div class="card card-primary">
                <form action="{{route('admin.schedule.save')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Rute</label>
                            <select name="route" id="" class="form-control route-select">
                                <option selected>Pilih Rute</option>
                                @foreach ($routes as $route)
                                    <option value="{{$route->id}}">{{$route->cityDepartureRef->name}}  ->  {{$route->cityArrivalRef->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('route'))
                                <span class="text-danger">{{ $errors->first('route') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Kendaraan</label>
                            <select name="vehicle" id="" class="form-control">
                                <option selected>Pilih Kendaraan</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{$vehicle->id}}">{{$vehicle->vehicle_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('vehicle'))
                                <span class="text-danger">{{ $errors->first('vehicle') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Keberangkatan</label>
                            <input type="date" name="date" placeholder="Input tanggal" class="form-control">
                            @if ($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Waktu Keberangkatan</label>
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <input type="text" name="departure_time" class="form-control datetimepicker-input" placeholder="00:00 AM" data-target="#datetimepicker1"/>
                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                            @if ($errors->has('departure_time'))
                                <span class="text-danger">{{ $errors->first('departure_time') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Perkiraan Waktu Tiba</label>
                            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                <input type="text" name="arrival_time" class="form-control datetimepicker-input" placeholder="00:00 AM" data-target="#datetimepicker2"/>
                                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                            @if ($errors->has('arrival_time'))
                                <span class="text-danger">{{ $errors->first('arrival_time') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="number" name="price" placeholder="Input Harga" class="form-control">
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->  
        </div>
    </div>
@endsection

@push('custom-js')
<!-- Select2 -->
<script src="{{url('assets/admin/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
    
    $(document).ready(function() {
        $('#example').DataTable();
        $('.route-select').select2();
        $('#datetimepicker1').datetimepicker({
            format: 'HH:mm'
        });

        $('#datetimepicker2').datetimepicker({
            format: 'HH:mm'
        });
        
    } );
</script>
@endpush