@extends('admin.template')

@section('title') {{'Daftar Kota Rute'}} @endsection

@section('breadcumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Kota Rute</h1>
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
        <div class="col-12">
            <div class="card card-primary">
                <form action="{{route('admin.city.save')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Kota</label>
                            <select name="city" id="" class="form-control city-select">
                                <option selected>Pilih Kota</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city['city_name']}}">{{$city['city_name']}}</option>
                                @endforeach
                                <option value="Jakarta">Jakarta</option>
                            </select>
                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
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
        $('.city-select').select2();
    } );
</script>
@endpush