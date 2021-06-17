


const counters = document.querySelectorAll(".counter");

window.addEventListener("scroll", styleNav);

function styleNav()
{
    // Adding styles to navbar while scroll
    document.querySelector("header").classList.toggle("nav-scroll", window.scrollY > 0);
    
    // Animation Counter
    if(window.scrollY > 0)
    {
        counters.forEach(counter => {
            let target = +counter.dataset.target;
            let step = 100;
            let dec = parseInt((999 - target) / step);
            
            function updateCount()
            {
                const curr = +counter.innerText;
                if(curr > target)
                {
                    counter.innerText = curr - dec;
                    setTimeout(updateCount, 5);
                }
                else counter.innerText = target;
            }
            setTimeout(updateCount,900);
        })
        
    }
}

// Routes 

// Selecting all search boxes
const searchBox  = document.querySelectorAll(".searchQuery");
const routeForm = document.querySelector("#route-search-form");

const stateEndpoint = "https://raw.githubusercontent.com/hiiamrohit/Countries-States-Cities-database/master/states.json";
const cityEndpoint = "https://raw.githubusercontent.com/ASHWIN776/Countries-States-Cities-database/master/indiaCities.json";

let stateData;
let cityData;
let stateId;

async function getStatesData()
{
    try{
        const response = await fetch(stateEndpoint);
        stateData = await response.json();
        stateData = stateData.states;
        stateData = stateData.filter(({country_id}) => country_id === "101");
    }
    catch(e)
    {
        console.log("Data cannot be extracted", e);
    }
}

async function getCitiesData()
{
    try{
        const response = await fetch(cityEndpoint);
        cityData = await response.json();
        cityData = cityData.cities;
    }
    catch(e)
    {
        console.log("Data cannot be extracted", e);
    }
}

getStatesData();
getCitiesData();




routeForm.addEventListener("click", searchForms);

function searchForms(evt)
{
    let showSuggestions;
    if(evt.target.className.includes("searchInput"))
    {
        const searchInput = evt.target;
        const id = evt.target.id;
        const suggBox = searchInput.nextElementSibling;

        switch(id)
        {
            case "source_state": showSuggestions = showStates;
            break;

            case "source": showSuggestions = showCities;
            break;

            case "destination_state": showSuggestions = showStates;
            break;

            case "destination": showSuggestions = showCities;
        }

        searchInput.addEventListener("input", showSuggestions);

        suggBox.addEventListener("click", selectSuggestion);
    }
}


function showStates()
{

    const word = this.value;
    const regex = new RegExp( word ,"gi");
    const suggBox = this.nextElementSibling;

    if(!word){
        suggBox.innerHTML = "";
        return;
    }

    let suggestions = stateData.filter(({name}) => name.match(regex))
    .map(({name:state, id}) => {
        const stateName = state.replace(regex, `<span class="hl">${word}</span>`)
        return `<li data-id="${id}">${stateName}</li>`;
    })
    .join("");

    suggBox.innerHTML = suggestions;
    
}

function showCities()
{   
    console.log("Cities Input clicked");
    
    const word = this.value;
    const regex = new RegExp( word ,"gi");
    const suggBox = this.nextElementSibling;

    if(!word){
        suggBox.innerHTML = "";
        return;
    }

    let suggestions = cityData.filter(({name}) => name.match(regex))
    .map(({name:city, id}) => {
        const cityName =  city.replace(regex, `<span class="hl">${word}</span>`)
        return `<li data-id="${id}">${cityName}</li>`;
    })
    .join("");

    suggBox.innerHTML = suggestions;
    suggBox.addEventListener("click", selectSuggestion)
}


function selectSuggestion(evt)
{
    if(evt.target.nodeName === "LI")
    {   
        console.dir(evt.target);
        this.previousElementSibling.value = evt.target.innerText;

        this.innerHTML = "";


        if(this.previousElementSibling.id === "destination_state" || this.previousElementSibling.id === "source_state")
        {   
            stateId = evt.target.dataset.id;
            console.log(stateId);
            cityData = cityData.filter(({state_id}) => state_id === stateId);
            console.log(cityData);
        }
    }
}

// Booking Deletion
const deleteBtn = document.querySelector("#deleteBooking");

if(deleteBtn)
{
    deleteBtn.addEventListener("click", deleteBooking);
}

const deleteForm = document.querySelector("#delete-form");

function deleteBooking()
{
    deleteForm.elements.id.value = this.dataset.pnr;
    deleteForm.elements.booked_seat.value = this.dataset.seat;
    deleteForm.elements.bus.value = this.dataset.bus;
}