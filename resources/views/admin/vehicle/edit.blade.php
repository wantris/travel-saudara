@extends('admin.template')

@section('title') {{'Daftar Kendaraan'}} @endsection

@section('breadcumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Edit Data Kendaraan</h1>
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
            <a href="{{route('admin.vehicle.index')}}" class="btn btn-primary"><i class="fad fa-backward mr-2"></i>Kembali</a>
        </div>
        <div class="col-12">
            <div class="card card-primary">
                <form action="{{route('admin.vehicle.update')}}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{$vehicle->id}}">
                    <input type="hidden" name="total_seat" value="{{$vehicle->total_seats}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kendaraan</label>
                            <input type="text" name="name" value="{{$vehicle->vehicle_name}}" class="form-control">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Total Kursi</label>
                            <input type="text" disabled value="{{$vehicle->total_seats}}" class="form-control">
                            @if ($errors->has('total_seat'))
                                <span class="text-danger">{{ $errors->first('total_seat') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="is_active" @if($vehicle->is_active) checked @endif class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Aktif?</label>
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
        $('.city-select').select2();
    } );
</script>
@endpush