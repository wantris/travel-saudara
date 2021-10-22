@extends('template')

@section('title') {{'Pencarian Jadwal'}} @endsection

@push('custom-style')

@endpush

@section('content')

<div class="container my-4">
    <div class="row p-2">
        <div class="col-12">
            <div class="fs-3 fw-lighter">
                <i class="fas fs-4 fa-map-marker-alt text-danger"></i>&nbsp; <b>{{$route->cityDepartureRef->name}}</b>
                &nbsp;&nbsp;<i class="fas fs-5 fa-chevron-left text-black-50" style="font-size: .7em;"></i><i class="fas fs-5 fa-chevron-right text-black-50" style="font-size: .7em;"></i> &nbsp; <b>{{$route->cityArrivalRef->name}}</b></div>
        </div>
        <div class="col-12">
            <div class="mt-3">
            <i class="far fa-calendar-alt text-danger"></i>&nbsp; {{$dateFormat->isoFormat('DD MMMM YYYY')}} <i class="fas fs-5 fa-chevron-left text-black-50 ml-2" style="font-size: .7em;"></i><i class="fas fs-5 fa-chevron-right text-black-50 mr-2" style="font-size: .7em;"></i>{{$dateFormatHome->isoFormat('DD MMMM YYYY')}}</div>
        </div>
    </div>

    <div class="row mt-3 p-3">
        <div class="col-12 py-3 px-4 shadow bg-white" style="border-radius: .5em;">
            <div class="row">
                <div class="col-md-6">
                    <div class="small"> <b>Dari:</b></div>
                    <select class="rounded-end wide" style="width: 100%" id="departure-select">
                        <option data-display="Cari Keberangkatan">Cari Keberangkatan</option>
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}" @if($city->id == $route->departure) selected @endif>
                                {{$city->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="small"> 
                        <b>Ke:</b>
                    </div>
                    <select class="rounded-end wide" style="width: 100%">
                        <option value="{{$route->arrival}}"  data-display="{{$route->cityArrivalRef->name}}">{{$route->cityArrivalRef->name}}</option>
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="small"> 
                        <b>Tanggal Pergi:</b>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text border-1 rounded-start bg-white">
                            &nbsp;<i class="fas fa-calendar-alt text-danger"></i>&nbsp;
                        </span>
                        <input type="text" id="date-travel" class="form-control rounded-end" name="tanggal" id="ticketing-picker" readonly="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="small"> 
                        <b>Tanggal Pulang:</b>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text border-1 rounded-start bg-white">
                            &nbsp;<i class="fas fa-calendar-alt text-danger"></i>&nbsp;
                        </span>
                        <input type="text" id="date-home-travel" class="form-control rounded-end" name="tanggal_pulang" id="ticketing-picker" readonly="">
                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-center">
                    <div class="switch-wrap mt-3">
                        <div class="primary-switch border">
                            <input type="checkbox" @if($option) checked @endif id="primary-switch" checked>
                            <label for="primary-switch"></label>
                        </div>
                    </div>
                    <b class="text-danger mt-2">&nbsp; Pergi Pulang?</b>
                </div>
                <div class="col-md-3">
                    <div id="labeltglpulang" class="small" style="display:none;"> 
                        <b>Tanggal Pulang:</b>
                    </div>
                    <div class="input-group" style="display:none;" id="tglpulang">
                        <span class="input-group-text border-1 rounded-start bg-white">
                            &nbsp;<i class="far fa-calendar-alt small text-black-50"></i>&nbsp;
                        </span>
                        <input name="tanggalpulang" value="{{$date}}" id="tanggalpulang" type="text" class="form-control rounded-end" aria-label="tanggalpulang" aria-describedby="tanggalpulang" readonly="">
                    </div>
                </div>
                <div class="col">
                    <div class="small"> 
                        <b>&nbsp;</b>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-danger btn-block">Cari Jadwal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-6 col-12">
            <div class="col-12 mb-5">
                <div class="bg-danger  px-2 py-2 text-white rounded">
                    Silahkan Pilih Jadwal Pergi
                </div>
            </div>
            @foreach ($schedules as $schedule)
                <div class="col-12 mb-3">
                    <div class="card border-0 shadow-1 border-radius-20" >
                        <div class="card-body px-5">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5 class="font-weight-bold text-secondary">4 Saudara Trans</h5>
                                </div>
                                <div class="mb-2">
                                    <p class="text-danger small pl-3">Rp. {{number_format($schedule->price,2,',','.')}}/pax</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-4">
                                    <h4 class="text-secondary">{{substr($schedule->departure_time,0,-3)}}</h4>
                                    <p class="text-danger">{{$schedule->routeRef->cityDepartureRef->name}}</p>
                                </div>
                                <div class="col-lg-3 col-4">
                                    <p class="text-danger"><i class="fas fa-arrow-right"></i></p>
                                </div>
                                <div class="col-lg-3 col-4">
                                    <h4 class="text-secondary">{{substr($schedule->arrival_time,0,-3)}}</h4>
                                    <p class="text-danger">{{$schedule->routeRef->cityArrivalRef->name}}</p>
                                </div>
                                <div class="col-lg-3 border-left d-none d-none d-sm-block">
                                    <h4 class="text-secondary">Sisa Kursi</h4>
                                    <p class="text-danger">{{$schedule->remaining_seats}}</p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    @php
                                        $code = Str::random(20);
                                        $jsonSchedule = json_encode($schedule);
                                    @endphp
                                    @if ($schedule->remaining_seats != 0)
                                        <input type="hidden" name="scheduleId" value="{{$schedule->id}}">
                                        <input type="hidden" name="code" value="{{$code}}">
                                        <div class="d-block" id="schedule_{{$schedule->id}}" data-schedule="{{$jsonSchedule}}">
                                            <button type="button" onclick="chooseSchedule({{$schedule->id}})" class="btn btn-danger btn-block">Pilih</button>
                                        </div>
                                    @else
                                        <button type="button" disabled class="btn btn-secondary btn-block">Pilih</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-6 col-12">
            <div class="col-12 mb-5">
                <div class="bg-danger px-2 py-2 text-white rounded">
                    Silahkan Pilih Jadwal Pulang
                </div>
            </div>
            @foreach ($reverseSchedules as $reverseSchedule)
                <div class="col-12 mb-3">
                    <div class="card border-0 shadow-1 border-radius-20" >
                        <div class="card-body px-5">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5 class="font-weight-bold text-secondary">4 Saudara Trans</h5>
                                </div>
                                <div class="mb-2">
                                    <p class="text-green small pl-3">Rp. {{number_format($reverseSchedule->price,2,',','.')}}/pax</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-4">
                                    <h4 class="text-secondary">{{substr($reverseSchedule->departure_time,0,-3)}}</h4>
                                    <p class="text-green">{{$reverseSchedule->routeRef->cityDepartureRef->name}}</p>
                                </div>
                                <div class="col-lg-3 col-4">
                                    <p class="text-green"><i class="fas fa-arrow-right"></i></p>
                                </div>
                                <div class="col-lg-3 col-4">
                                    <h4 class="text-secondary">{{substr($reverseSchedule->arrival_time,0,-3)}}</h4>
                                    <p class="text-green">{{$reverseSchedule->routeRef->cityArrivalRef->name}}</p>
                                </div>
                                <div class="col-lg-3 border-left d-none d-none d-sm-block">
                                    <h4 class="text-secondary">Sisa Kursi</h4>
                                    <p class="text-green">{{$reverseSchedule->remaining_seats}}</p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    @php
                                        $code = Str::random(20);
                                        $jsonReverseSchedule = json_encode($reverseSchedule);
                                    @endphp
                                    @if ($reverseSchedule->remaining_seats != 0)
                                        <input type="hidden" name="reverseScheduleId" value="{{$reverseSchedule->id}}">
                                        <input type="hidden" name="code" value="{{$code}}">
                                        <div class="d-block" id="reverse-schedule_{{$reverseSchedule->id}}" data-rev-schedule="{{$jsonReverseSchedule}}">
                                            <button type="button" onclick="chooseReverseSchedule({{$reverseSchedule->id}})" class="btn btn-green btn-block">Pilih</button>
                                        </div>
                                    @else
                                        <button type="button" disabled class="btn btn-secondary btn-block">Pilih</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-12 mt-3">
            <div class="text-center mx-auto" style="width: 350px">
                <form action="{{route('landing.shuttle.reservation.pp.index')}}" method="get">
                    <input type="hidden" name="round_schedule_id" id="departure-schedule-inp">
                    <input type="hidden" name="trip_schedule_id" id="departure-revSchedule-inp">
                    <input type="submit" value="Pesan Sekarang" class="btn btn-danger rounded">
                </form>
            </div>
        </div>
    </div>
</div>


    
@endsection

@push('custom-script')
    <script>
        var lastScheduleId = "";
        var lastRevScheduleId = "";
        var lastSchedule = "";
        var lastRevSchedule = "";

        $(document).ready(function() {

            AOS.init();
            
            $('#date-travel').daterangepicker({
                locale: {
                format: 'YYYY-MM-DD'
                },    
                showDropdowns: true,
                autoApply: true,
                singleDatePicker: true,
                startDate: "{{$date}}",
                minDate: new Date(),
                maxDate: moment().add(30, 'days')
            });

            $('#date-home-travel').daterangepicker({
                locale: {
                format: 'YYYY-MM-DD'
                },    
                showDropdowns: true,
                autoApply: true,
                singleDatePicker: true,
                startDate: "{{$dateHome}}",
                minDate: new Date(),
                maxDate: moment().add(30, 'days')
            });
        });

        const chooseSchedule = (scheduleId) => {
            let schedule = $('#schedule_'+scheduleId).data('schedule');

            if (lastScheduleId != "" || lastScheduleId != null) {
                let lastButtonHtml = `<button type="button" onclick="chooseSchedule(${lastSchedule.id})" class="btn btn-danger btn-block">Pilih</button>`;
                $('#schedule_'+lastScheduleId).html(lastButtonHtml);
                $('#schedule_'+lastScheduleId).data("shcedule", lastSchedule);

                lastScheduleId = schedule.id;
                lastSchedule= schedule;

                let buttonHtml = `<button type="button" onclick="chooseSchedule(${schedule.id})" class="btn btn-primary btn-block"><i class="far fa-check-circle mr-2"></i> Terpilih</button>`;
                $('#departure-schedule-inp').val(schedule.id);
                $('#schedule_'+schedule.id).html(buttonHtml);
                $('#schedule_'+schedule.id).data( "schedule",schedule);

            } else {
                lastScheduleId = schedule.id;
                lastSchedule= schedule;

                let buttonHtml = `<button type="button" onclick="chooseSchedule(${schedule.id})" class="btn btn-primary btn-block"><i class="far fa-check-circle mr-2"></i> Terpilih</button>`;
                $('#departure-schedule-inp').val(schedule.id);
                $('#schedule_'+schedule.id).html(buttonHtml);
                $('#schedule_'+schedule.id).data( "schedule",schedule);
            }
        };

        const chooseReverseSchedule = (revScheduleId) => {
            let revSchedule = $('#reverse-schedule_'+revScheduleId).data('rev-schedule');

            if (lastRevScheduleId != "" || lastRevScheduleId != null) {
                let lastButtonHtml = `<button type="button" onclick="chooseReverseSchedule(${lastRevSchedule.id})" class="btn btn-green btn-block">Pilih</button>`;
                $('#reverse-schedule_'+lastRevScheduleId).html(lastButtonHtml);
                $('#reverse-schedule_'+lastRevScheduleId).data( "rev-schedule", lastRevSchedule);

                lastRevScheduleId = revSchedule.id;
                lastRevSchedule= revSchedule;

                let buttonHtml = `<button type="button" onclick="chooseReverseSchedule(${revSchedule.id})" class="btn btn-primary btn-block"><i class="far fa-check-circle mr-2"></i> Terpilih</button>`;
                $('#departure-revSchedule-inp').val(revSchedule.id);
                $('#reverse-schedule_'+revSchedule.id).html(buttonHtml);
                $('#reverse-schedule_'+revSchedule.id).data( "rev-schedule",revSchedule.id);

            } else {
                lastRevScheduleId = revSchedule.id;
                lastRevSchedule= revSchedule;

                let buttonHtml = `<button type="button" onclick="chooseReverseSchedule(${revSchedule.id})" class="btn btn-primary btn-block"><i class="far fa-check-circle mr-2"></i> Terpilih</button>`;
                $('#departure-revSchedule-inp').val(revSchedule.id);
                $('#reverse-schedule_'+revSchedule.id).html(buttonHtml);
                $('#reverse-schedule_'+revSchedule.id).data( "rev-schedule",revSchedule.id);
            }
        };

        
    </script>
@endpush