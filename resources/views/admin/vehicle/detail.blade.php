@extends('admin.template')

@section('title') {{'Daftar Kursi Kendaraan'}} @endsection

@section('breadcumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Kursi Kendaraan {{$vehicle->vehicle_name}}</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 mb-3">
            <a href="{{route('admin.vehicle.addSeat', $vehicle->id)}}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Tambah Data Kursi Kendaraan</a>
        </div>
        <div class="col-lg-6 mb-3 text-right">
            <a href="{{route('admin.vehicle.index')}}" class="btn btn-primary"><i class="fad fa-backward mr-2"></i>Kembali</a>
        </div>
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body px-4">
                    <table id="example" class="display table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor Kursi</th>
                                <th>Aktif ?</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seats as $seat)
                                <tr>
                                    <td>{{$seat->number_of_seat}}</td>
                                    <td>
                                        @if ($seat->status)
                                            <span class="text-success">Aktif</span>
                                        @else
                                            <span class="text-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" onclick="deleteSeat({{$seat->id}})" class="btn btn-danger d-inline mr-2 mb-2">Hapus</a>
                                        @if ($seat->status)
                                            <a href="#" onclick="updateStatus({{$seat->id}}, 0)" class="btn btn-secondary d-inline mr-2 mb-2">Buat Tidak Aktif</a>
                                        @else
                                            <a href="#" onclick="updateStatus({{$seat->id}}, 1)" class="btn btn-success d-inline mr-2 mb-2">Buat Aktif</a>
                                        @endif
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

    const updateStatus = (id, status) => {
        event.preventDefault();
        let url = "/admin/vehicle/seat/status";
        $msg = "";
        if(status){
            $msg = "Apakah anda yakin ingin kursi aktif?";
        }else{
            $msg = "Apakah anda yakin ingin kursi tidak aktif?";
        }
        Notiflix.Confirm.Show( 
            'Data Kursi',
            $msg,
            'Yes',
            'No',
             function(){ 
                $.ajax(
                    {
                        url: url,
                        type: 'post', 
                        dataType: "JSON",
                        data: {
                            "id": id ,
                            "status":status
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

    const deleteSeat = (id) => {
        event.preventDefault();
        let url = "/admin/vehicle/seat/delete";
        Notiflix.Confirm.Show( 
            'Data Kursi',
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