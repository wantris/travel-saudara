@extends('admin.template')

@section('title') {{'Daftar Jadwal Travel Reguler'}} @endsection

@section('breadcumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Jadwal Travel Reguler</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{route('admin.schedule.create')}}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Tambah Data</a>
        </div>
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body px-4">
                    <div class="table-responsive">
                        <table id="example" class="display table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10">No.</th>
                                    <th>Keberangkatan</th>
                                    <th>Tujuan</th>
                                    <th>Jam</th>
                                    <th width="30">Sisa Kursi</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->routeRef->cityDepartureRef->name}}</td>
                                        <td>{{$item->routeRef->cityArrivalRef->name}}</td>
                                        <td>{{$item->departure_time}}</td>
                                        <td>{{$item->remaining_seats}}</td>
                                        <td>Rp. {{number_format($item->price,2,',','.')}}</td>
                                        @php
                                            $fixdate = \Carbon\Carbon::parse($item->date);
                                        @endphp
                                        <td>{{$fixdate->isoFormat('D MMMM Y')}}</td>
                                        <td>
                                            @php
                                                $jsonItem = json_encode($item);
                                            @endphp
                                            <a href="#" onclick="seeDetail({{$jsonItem}})" class="btn btn-info d-inline mr-2 mb-2">Detail</a>
                                            <a href="{{route('admin.schedule.edit', $item->id)}}" class="btn btn-primary d-inline mr-2 mb-2">Edit</a>
                                            <a href="#" onclick="deleteSchedule({{$item->id}})" class="btn btn-danger d-inline mr-2 mb-2">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-5">
                    Total Terisi
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col-6" id="seat-total">
  
                </div>
            </div>
          <div class="row">
              <div class="col-5">
                  Kursi Terisi
              </div>
              <div class="col-1">
                  :
              </div>
              <div class="col-6" id="seat-filled">

              </div>
          </div>
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

    const seeDetail = (item) =>{
        console.log(item);
        $('#seat-total').text(item.vehicle_ref.total_seats);
        $('#seat-filled').text(item.seats_filled);
        $('#exampleModal').modal('show');
    }

    const deleteSchedule = (id) => {
        event.preventDefault();
        let url = "/admin/schedule/delete";
        Notiflix.Confirm.Show( 
            'Jadwal Travel',
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