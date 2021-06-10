const seatDiagram = document.querySelector("#displaySeats");
let booked_seats = seatDiagram.dataset.seats;
if(booked_seats)
{
    // Color the taken seats as purple
    booked_seats = booked_seats.split(",");

    booked_seats.forEach(seatNo => {
        const seat = seatDiagram.querySelector(`#seat-${seatNo}`);
        seat.style.backgroundColor = "purple";
    });
}