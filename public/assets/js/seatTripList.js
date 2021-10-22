const callSeatTripList = () => {
    let url = "/shuttle/reservation/seatlist/";
    
    $.ajax(
        {
            url: url,
            type: 'get', 
            dataType: "JSON",
            data: {
                "scheduleId": tripScheduleId ,
            },
            success: function (response){
                if(response.code == 200 && response.status == 1){
                    console.log(response);
                    addSeatTripFilled(response.tickets);
                    renderSeatsTrip(response.vehicle.detail_ref);
                }
            },
            error: function(xhr) {
                console.log(xhr);
        }
    });
};

const addSeatTripFilled = (tickets) =>{
    $.each(tickets, function (i, ticket) {
        seat_filledTrip.push(parseInt(ticket.seat_number));
    });
};

const renderSeatsTrip = (seats) =>{
    let html = "";

    $.each(seats, function (i, seat) {
        if(seat.status == 0){
            html += `<div class="col-3 mb-3">
                        <button class="button-seat btn btn-secondary p-0" data-number="${seat.number_of_seat}" id="btn_seat_trip_${seat.number_of_seat}" disabled style="width: 50px; height:50px">
                            <i class="far fa-loveseat text-white text-center ml-1" id="icon_seat_trip_${seat.number_of_seat}" style="font-size: 30px"></i>
                        </button>
                    </div>`;
        }else if(seat_filledTrip.indexOf(seat.number_of_seat) >= 0){
            html += `<div class="col-3 mb-3">
                        <button class="button-seat btn btn-danger disabled p-0" data-number="${seat.number_of_seat}" id="btn_seat_trip_${seat.number_of_seat}" style="width: 50px; height:50px">
                            <i class="far fa-loveseat text-white text-center ml-1" id="icon_seat_trip_${seat.number_of_seat}" style="font-size: 30px"></i>
                        </button>
                    </div>`;
        }else{
            html += `<div class="col-3 mb-3">
                        <button class="button-seat btn btn-outline-danger p-0" onclick="chooseSeatTrip(${seat.number_of_seat})" data-number="${seat.number_of_seat}" id="btn_seat_trip_${seat.number_of_seat}" style="width: 50px; height:50px">
                            <i class="far fa-loveseat text-center ml-1" id="icon_seat_trip_${seat.number_of_seat}" style="font-size: 30px"></i>
                        </button>
                    </div>`;
        }
        
    });

    $('#seat-trip-container').html(html);
};

const chooseSeatTrip = (number_id) => {
    chooseButtonTripColor(number_id);
    chooseIconTripColor(number_id);
    addInputSeatTrip(number_id);
    addTotalSeatsTrip();
   

    $('#btn_seat_trip_'+number_id).attr("onclick",`removeSeatTrip(${number_id})`);
}

const removeSeatTrip = (number_id) => {
    removeButtonTripColor(number_id);
    removeIconTripColor(number_id);
    removeInputSeatTrip(number_id);
    reduceTotalSeatsTrip();

    $('#btn_seat_trip_'+number_id).attr("onclick",`chooseSeatTrip(${number_id})`);
}


const chooseButtonTripColor = (number_id) => {
    $('#btn_seat_trip_'+number_id).removeClass('btn-outline-danger');
    $('#btn_seat_trip_'+number_id).addClass('btn-primary');
}

const chooseIconTripColor = (number_id) => {
    $('#icon_seat_trip_'+number_id).addClass('text-white');
}

const removeButtonTripColor = (number_id) => {
    $('#btn_seat_trip_'+number_id).removeClass('btn-primary');
    $('#btn_seat_trip_'+number_id).addClass('btn-outline-danger');
    
}

const removeIconTripColor = (number_id) => {
    $('#icon_seat_trip_'+number_id).removeClass('text-white');
}

const addTotalSeatsTrip = () => {
    total_seats = total_seats + 1;
    total_price = total_seats * parseInt(price);

    $('#total-seats-text').val(total_seats);
    $('#total-seats-inp').val(total_seats);
    $('#price-text').val("Rp. "+total_price);
    $('#price-inp').val(total_price);
}

const reduceTotalSeatsTrip = () => {
    total_seats = total_seats - 1;
    console.log(total_seats);
    total_price =  total_price - parseInt(price);

    $('#total-seats-text').val(total_seats);
    $('#total-seats-inp').val(total_seats);
    $('#price-text').val("Rp. "+total_price);
    $('#price-inp').val(total_price);
}

const addInputSeatTrip = (number_id) => {
    let html = `<input type="hidden" name="seat_trip_number[]" value="${number_id}" id="seat_inp_trip_${number_id}">`;
    $('.input-seat').append(html);
}

const removeInputSeatTrip = (number_id) => {
    $('#seat_inp_trip_'+number_id).remove();
};