@extends('admin.template')

@section('title') {{'Daftar Rute'}} @endsection

@section('breadcumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Edit Data Rute</h1>
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
                <form action="{{route('admin.route.update')}}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{$route->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Kota Keberangkatan</label>
                            <select name="departure" id="" class="form-control city-select">
                                <option selected>Pilih Kota</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}" @if($city->id == $route->departure) selected @endif>{{$city->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('departure'))
                                <span class="text-danger">{{ $errors->first('departure') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Kota Tujuan</label>
                            <select name="arrival" id="" class="form-control city-select">
                                <option selected>Pilih Kota</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}" @if($city->id == $route->arrival) selected @endif>{{$city->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('arrival'))
                                <span class="text-danger">{{ $errors->first('arrival') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" name="price" value="{{$route->price}}" class="form-control">
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="is_active" @if($route->is_active) checked @endif class="form-check-input" id="exampleCheck1">
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