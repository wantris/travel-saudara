@extends('admin.template')

@section('title') {{'Daftar Rute'}} @endsection

@section('breadcumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Rute</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{route('admin.route.create')}}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Tambah Rute</a>
        </div>
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body px-4">
                    <table id="example" class="display table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10">No.</th>
                                <th>Keberangkatan</th>
                                <th>Tujuan</th>
                                <th>Harga</th>
                                <th>Aktif ?</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($routes as $route)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$route->cityDepartureRef->name}}</td>
                                    <td>{{$route->cityArrivalRef->name}}</td>
                                    <td>Rp. {{number_format($route->price,2,',','.')}}</td>
                                    <td>
                                        @if ($route->is_active)
                                            <span class="text-success">Aktif</span>
                                        @else
                                            <span class="text-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.route.edit', $route->id)}}" class="btn btn-primary d-inline mr-2 mb-2">Edit</a>
                                        <a href="#" onclick="deleteRoute({{$route->id}})" class="btn btn-danger d-inline mb-2">Hapus</a>
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

    const deleteRoute = (id) => {
        event.preventDefault();
        let url = "/admin/route/delete";
        Notiflix.Confirm.Show( 
            'Data Rute',
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