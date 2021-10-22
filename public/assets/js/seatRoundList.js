const callSeatRoundList = () => {
            let url = "/shuttle/reservation/seatlist/";
            
            $.ajax(
                {
                    url: url,
                    type: 'get', 
                    dataType: "JSON",
                    data: {
                        "scheduleId": roundScheduleId ,
                    },
                    success: function (response){
                        if(response.code == 200 && response.status == 1){
                            addSeatFilled(response.tickets);
                            renderSeats(response.vehicle.detail_ref);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                }
            });
        };

        const addSeatFilled = (tickets) =>{
            $.each(tickets, function (i, ticket) {
                seat_filled.push(parseInt(ticket.seat_number));
            });
        };

        const renderSeats = (seats) =>{
            let html = "";

            $.each(seats, function (i, seat) {
                if(seat.status == 0){
                    html += `<div class="col-3 mb-3">
                                <button class="button-seat btn btn-secondary p-0" data-number="${seat.number_of_seat}" id="btn_seat_round_${seat.number_of_seatt}" disabled style="width: 50px; height:50px">
                                    <i class="far fa-loveseat text-white text-center ml-1" id="icon_seat_${seat.number_of_seatt}" style="font-size: 30px"></i>
                                </button>
                            </div>`;
                }else if(seat_filled.indexOf(seat.number_of_seat) >= 0){
                    html += `<div class="col-3 mb-3">
                                <button class="button-seat btn btn-danger disabled p-0" data-number="${seat.number_of_seat}" id="btn_seat_round_${seat.number_of_seat}" style="width: 50px; height:50px">
                                    <i class="far fa-loveseat text-white text-center ml-1" id="icon_seat_round_${seat.number_of_seat}" style="font-size: 30px"></i>
                                </button>
                            </div>`;
                }else{
                    html += `<div class="col-3 mb-3">
                                <button class="button-seat btn btn-outline-danger p-0" onclick="chooseSeat(${seat.number_of_seat})" data-number="${seat.number_of_seat}" id="btn_seat_round_${seat.number_of_seat}" style="width: 50px; height:50px">
                                    <i class="far fa-loveseat text-center ml-1" id="icon_seat_round_${seat.number_of_seat}" style="font-size: 30px"></i>
                                </button>
                            </div>`;
                }
                
            });

            $('#seat-round-container').html(html);
        };

        const chooseSeat = (number_id) => {
            chooseButtonColor(number_id);
            chooseIconColor(number_id);
            addInputSeat(number_id);
            addTotalSeats();
           

            $('#btn_seat_round_'+number_id).attr("onclick",`removeSeat(${number_id})`);
        }

        const removeSeat = (number_id) => {
            removeButtonColor(number_id);
            removeIconColor(number_id);
            removeInputSeat(number_id);
            reduceTotalSeats();

            $('#btn_seat_round_'+number_id).attr("onclick",`chooseSeat(${number_id})`);
        }


        const chooseButtonColor = (number_id) => {
            $('#btn_seat_round_'+number_id).removeClass('btn-outline-danger');
            $('#btn_seat_round_'+number_id).addClass('btn-primary');
        }

        const chooseIconColor = (number_id) => {
            $('#icon_seat_round_'+number_id).addClass('text-white');
        }

        const removeButtonColor = (number_id) => {
            $('#btn_seat_round_'+number_id).removeClass('btn-primary');
            $('#btn_seat_round_'+number_id).addClass('btn-outline-danger');
            
        }

        const removeIconColor = (number_id) => {
            $('#icon_seat_round_'+number_id).removeClass('text-white');
        }

        const addTotalSeats = () => {
            total_seats = total_seats + 1;
            total_price = total_seats * parseInt(price);

            $('#total-seats-text').val(total_seats);
            $('#total-seats-inp').val(total_seats);
            $('#price-text').val("Rp. "+total_price);
            $('#price-inp').val(total_price);
        }

        const reduceTotalSeats = () => {
            total_seats = total_seats - 1;
            console.log(total_seats);
            total_price =  total_price - parseInt(price);

            $('#total-seats-text').val(total_seats);
            $('#total-seats-inp').val(total_seats);
            $('#price-text').val("Rp. "+total_price);
            $('#price-inp').val(total_price);
        }

        const addInputSeat = (number_id) => {
            let html = `<input type="hidden" name="seat_round_number[]" value="${number_id}" id="seat_inp_round_${number_id}">`;
            $('.input-seat').append(html);
        }

        const removeInputSeat = (number_id) => {
            $('#seat_inp_round_'+number_id).remove();
        };