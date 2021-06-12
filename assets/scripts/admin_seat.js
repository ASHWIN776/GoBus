const busJson = document.querySelector("#busJson").value;
const busData = JSON.parse(busJson);
const seatDiagram = document.querySelector("#displaySeats");
let booked_seats = "";

if(seatDiagram)
{
    booked_seats = seatDiagram.dataset.seats;
}
if(booked_seats)
{
    // Color the taken seats as purple
    booked_seats = booked_seats.split(",");

    booked_seats.forEach(seatNo => {
        const seat = seatDiagram.querySelector(`#seat-${seatNo}`);
        seat.classList.add("notAvailable");
    });
}

const seatsBody = document.body;

seatsBody.addEventListener("click", listenforBusSearches);

function listenforBusSearches(evt){
    if(evt.target.className.includes("busnoInput"))
    {
        console.log("Fired");
        const searchInput = evt.target;
        const suggBox = searchInput.nextElementSibling;
        searchInput.addEventListener("input", showSuggestions);
        suggBox.addEventListener("click", selectSuggestion);
    }
}


function selectSuggestion(evt){
    if(evt.target.nodeName === "LI")
    {
        this.previousElementSibling.value = evt.target.innerText;
        this.innerText = "";
    }
}

function showSuggestions()
{
    const word = this.value;
    if(!word)
    {
        this.nextElementSibling.innerText = "";
        return;
    }

    const regex = new RegExp(word, "gi");

    let suggestions = busData.filter(({bus_no}) => {
        return bus_no.match(regex);
    }).map(({bus_no}) => {
        const bus_num = bus_no.replace(regex, `<span class="hl">${this.value.toUpperCase()}</span>`);;
        return `<li>${bus_num}</li>`;
    }).join("");

    this.nextElementSibling.innerHTML = suggestions;
}
