@extends('admin.template')

@section('title') {{'Daftar Akun Bank'}} @endsection

@section('breadcumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Data Akun Bank</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{route('admin.bankPayment.create')}}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Tambah Data Akun Bank</a>
        </div>
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body px-4">
                    <table id="example" class="display table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10">No.</th>
                                <th>Nama Bank</th>
                                <th>Atas Nama</th>
                                <th>No.Rekening</th>
                                <th>Aktif ?</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banks as $bank)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$bank->bank_name}}</td>
                                    <td>{{$bank->behalf_of}}</td>
                                    <td>{{$bank->account_number}}</td>
                                    <td>
                                        @if ($bank->status)
                                            <span class="text-success">Aktif</span>
                                        @else
                                            <span class="text-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.bankPayment.edit', $bank->id)}}" class="btn btn-primary d-inline mr-2 mb-2">Edit</a>
                                        <a href="#" onclick="deleteBank({{$bank->id}})" class="btn btn-danger d-inline mr-2 mb-2">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

    const deleteBank = (id) => {
        event.preventDefault();
        let url = "/admin/bankpayment/delete";
        Notiflix.Confirm.Show( 
            'Akun Bank',
            'Apakah anda yakin ingin menghapus?',
            'Yes',
            'No',
             function(){ 
                $.ajax(
                    {
                        url: url,
                        type: 'delete', 
                        dataType: "JSON",
                        data: {
                            "id": id ,
                        },
                        success: function (response){
                            if(response.status == 1){
                                Notiflix.Notify.Success(response.message);
                                location.reload();
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr);
                            Notiflix.Notify.Failure('Ooopss');
                        }
                });
            }, function(){
                 // No button callback alert('If you say so...'); 
            } ); 
    }
</script>
@endpush