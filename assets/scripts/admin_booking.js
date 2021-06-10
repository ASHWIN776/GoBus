// Selecting Seats
const seatDiagram = document.querySelector("#seatsDiagram");
const seatInputInput = document.querySelector("#seatInput");
seatDiagram.addEventListener("click", selectSeat);
let selected_id;

function selectSeat(evt)
{
  if(evt.target.nodeName == "TD" && !evt.target.className.includes("space"))
  {
    if(!selected_id || evt.target.dataset.name === selected_id)
    {
      selected_id = evt.target.dataset.name;
      evt.target.classList.toggle("selected");

      if(!evt.target.className.includes("selected"))
      {
        selected_id = "";
      }

      seatInput.value = selected_id || "";
    }
  }
}


// Add Form Operations
const routeJson = document.querySelector("#routeJson").value;
const customerJson = document.querySelector("#customerJson").value;
const seatJson = document.querySelector("#seatJson").value;

const routeData = JSON.parse(routeJson);
const customerData = JSON.parse(customerJson);
const seatData = JSON.parse(seatJson);

const bookingBody = document.body;

bookingBody.addEventListener("click", listenForSearches);

function listenForSearches(evt){
  if(evt.target.className.includes("searchInput"))
  {
    const searchInput = evt.target;
    const searchBox = searchInput.parentElement;
    const suggBox = searchInput.nextElementSibling;
    let suggestionFn;
    switch(searchInput.id)
    {
      case "cid":  suggestionFn = showCustomerSuggestions;
      break;
      
      case "routeSearch": suggestionFn = showRouteSuggestions;
      break;

      case "sourceSearch": suggestionFn = showSourceSuggestions;
      break;

      case "destinationSearch": suggestionFn = showDestinationSuggestions;
    }
    searchInput.addEventListener("input", suggestionFn);

    suggBox.addEventListener("click", lockSuggestion);
  }
}


function showCustomerSuggestions(evt)
{
  console.log("fired");
  const word = this.value;

  if(!word)
  {
    this.nextElementSibling.innerText = "";
    return;
  }

  const regex = new RegExp(word, "gi");
  let suggestions = customerData.filter(({customer_id}) =>
    customer_id.match(regex)
  )
  .map(({customer_id}) => {
    const customerID = customer_id.replace(regex, `<span class="hl">${this.value.toUpperCase()}</span>`);
    return `<li>${customerID}</li>`;
  }).join("");
  
  this.nextElementSibling.innerHTML = suggestions;
}


function showRouteSuggestions(evt)
{
  const word = this.value;

  if(!word)
  {
    this.nextElementSibling.innerText = "";
    return;
  }
  const regex = new RegExp(word, "gi");
  let suggestions = routeData.filter(({route_cities}) =>     route_cities.match(regex))
  .map(({route_cities}) => {
    const viaCities = route_cities.replace(regex, `<span class="hl">${this.value.toUpperCase()}</span>`);
    return `<li>${viaCities}</li>`
  })
  .join("");

  this.nextElementSibling.innerHTML = suggestions;
}

function showSourceSuggestions(evt)
{
  const word = this.value;
  const routeSelected = document.querySelector("#routeSearch").value;

  if(!word)
  {
    this.nextElementSibling.innerText = "";
    return;
  }
  const regex = new RegExp(word, "gi");

  // Converting comma separated cities to an array
  const citiesArr = convertToArray(routeSelected);
  /*
    1. last place cannot be a source, hence cannot be given in the suggestion
  */
  let suggestions = citiesArr.filter(city => 
    city.match(regex) && citiesArr.indexOf(city) !== citiesArr.length - 1)
  .map(city => {
    const cityName = city.replace(regex, `<span class="hl">${this.value.toUpperCase()}<span>`);

    return `<li>${cityName}</li>`;
  })
  .join("");
  
  this.nextElementSibling.innerHTML = suggestions;
}

function showDestinationSuggestions(evt)
{
  const word = this.value;
  const routeSelected = document.querySelector("#routeSearch").value;
  const sourceSelected = document.querySelector("#sourceSearch").value;

  if(!word)
  {
    this.nextElementSibling.innerText = "";
    return;
  }
  // Cities Array
  const citiesArr = convertToArray(routeSelected);

  const regex = new RegExp(word, "gi");
  let suggestions = [];

  // Inputs those  cities into suggestions array which comes after sourceSelected
  for(let i = 0; i < citiesArr.length; ++i)
    if(i > citiesArr.indexOf(sourceSelected))
      suggestions.push(citiesArr[i]);

  suggestions = suggestions.map(city => {
    const cityName = city.replace(regex, `<span class="hl">${this.value.toUpperCase()}</span>`);
    return `<li>${cityName}</li>`;
  })
  this.nextElementSibling.innerHTML = suggestions;
}


function lockSuggestion(evt)
{
  const searchInput = this.previousElementSibling;

  if(searchInput.id == "cid")
  {
    const customerName = document.querySelector("#cname");
    const customerPhone = document.querySelector("#cphone");
    const findCustomer = customerData.find(({customer_id}) => customer_id === evt.target.innerText);
    
    customerName.value = findCustomer.customer_name;
    customerPhone.value = findCustomer.customer_phone;
  }

  else if(searchInput.id === "routeSearch")
  {
    // If there are just 2 cities, then fix source and destination as the 1st and 2nd city respectively
    // Converting comma separated cities to an array
    const citiesArr = convertToArray(evt.target.innerText);
    if(citiesArr.length === 2)
    {
      document.querySelector("#sourceSearch").value = citiesArr[0];
      document.querySelector("#destinationSearch").value = citiesArr[1];
    }

  }
  // This is default
  searchInput.value = evt.target.innerText;
  this.innerText = "";
}

function convertToArray(routeSelected)
{
  // Converting comma separated cities to an array
  const arr = routeData
    .find(({route_cities}) => route_cities === routeSelected)
    .route_cities
    .split(",");
  return arr;
}