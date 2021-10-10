@extends('admin.template')

@section('title') {{'Daftar Akun Bank'}} @endsection

@section('breadcumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Akun Bank</h1>
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
                <form action="{{route('admin.bankPayment.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{$bank->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Bank</label>
                            <input type="text" name="bank_name" value="{{$bank->bank_name}}" class="form-control">
                            @if ($errors->has('bank_name'))
                                <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Atas Nama</label>
                            <input type="text" name="behalf_of" value="{{$bank->behalf_of}}" class="form-control">
                            @if ($errors->has('behalf_of'))
                                <span class="text-danger">{{ $errors->first('behalf_of') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Rekening</label>
                            <input type="text" name="account_number" value="{{$bank->account_number}}" class="form-control">
                            @if ($errors->has('account_number'))
                                <span class="text-danger">{{ $errors->first('account_number') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Logo Bank</label>
                            <input type="file" name="photo" class="form-control">
                            <input type="hidden" name="oldPhoto" value="{{$bank->photo}}">
                            @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="status" @if($bank->status) checked  @endif class="form-check-input" id="exampleCheck1">
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