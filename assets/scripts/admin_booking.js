// Required Constants
const routeJson = document.querySelector("#routeJson").value;
const customerJson = document.querySelector("#customerJson").value;
const seatJson = document.querySelector("#seatJson").value;

const routeData = JSON.parse(routeJson);
const customerData = JSON.parse(customerJson);
const seatData = JSON.parse(seatJson);
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];


console.log(routeData, customerData, seatData);


// Add Form Operations

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
  
  if(!suggestions)
    suggestions = `<span>No Search Results Found</span>`;
  
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

  let suggestions = routeData.filter(({route_cities}) =>   route_cities.match(regex))
  .map(({route_id, route_cities, route_dep_date, route_dep_time, route_step_cost}) => {
    const viaCities = route_cities.replace(regex, `<span class="hl">${this.value.toUpperCase()}</span>`);

    let route_date = route_dep_date.split("-");
    route_date[1] = months[parseInt(route_date[1])];
    route_date = route_date.reverse().join("-");
  
    return `<li id="routeSugg" data-id='${route_id}' data-deptiming='${route_dep_date}, ${route_dep_time}' data-stepcost='${route_step_cost}'>
    <span class="viaCities-span">${viaCities}</span>
    <span>${route_date}, ${route_dep_time}</span
    ></li>`
  })
  .join("");
  if(!suggestions)
    suggestions = `<span>No Search Results Found</span>`;

  this.nextElementSibling.innerHTML = suggestions;
}

function showSourceSuggestions(evt)
{
  const word = this.value;
  const routeSelected = document.querySelector("#routeSearch").dataset.id;

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
    const cityName = city.replace(regex, `<span class="hl">${this.value.toUpperCase()}</span>`);

    return `<li>${cityName}</li>`;
  })
  .join("");
  
  if(!suggestions)
    suggestions = `<span>No Search Results Found</span>`;
  
  this.nextElementSibling.innerHTML = suggestions;
}

function showDestinationSuggestions(evt)
{
  const word = this.value;
  const routeSelected = document.querySelector("#routeSearch").dataset.id;
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
  console.log(citiesArr.indexOf(sourceSelected));
  for(let i = 0; i < citiesArr.length; ++i)
    if(i > citiesArr.indexOf(sourceSelected))
      suggestions.push(citiesArr[i]);

  console.log(suggestions);
  suggestions = suggestions.filter(city => city.match(regex))
  .map(city => {
    const cityName = city.replace(regex, `<span class="hl">${this.value.toUpperCase()}</span>`);
    return `<li>${cityName}</li>`;
  }).join("");
  console.log(suggestions);

  if(!suggestions)
    suggestions = `<span>No Search Results Found</span>`;

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
    // Set the route_id & depDate
    const route_id = evt.target.dataset.id;
    const dep_timing = evt.target.dataset.deptiming;
    document.querySelector("#route_id").value = route_id;
    document.querySelector("#dep_timing").value = dep_timing;

    // Pass the route_id to the searchInput's dataset 
    searchInput.setAttribute("data-id", route_id);
    searchInput.setAttribute("data-deptiming", dep_timing);
    searchInput.setAttribute("data-stepcost", evt.target.dataset.stepcost);

    // If there are just 2 cities, then fix source and destination as the 1st and 2nd city respectively
    // Converting comma separated cities to an array
    const citiesArr = convertToArray(route_id);

    if(citiesArr.length === 2)
    {
      document.querySelector("#sourceSearch").value = citiesArr[0];
      document.querySelector("#destinationSearch").value = citiesArr[1];
    }
    // So that timing is avoided when selecting the route
      evt.target.innerText = evt.target.firstElementChild.innerText;

    // To Color the not Available Seats in this route
    const route_busNo = routeData.find(({route_id:id}) => {
      return id === route_id
    }).bus_no;

    console.log(seatData.find(({bus_no}) => 
    {
      console.log(bus_no, route_busNo);
     return bus_no === route_busNo;
    }));
    let seatsBooked = seatData.find(({bus_no}) => 
    {
      console.log(bus_no, route_busNo);
     return bus_no === route_busNo;
    }).seat_booked;

    // If already booked seats exists
    if(seatsBooked)
    {
      seatsBooked = seatsBooked.split(",");
      seatsBooked.forEach(seatNo => {
        const seat = document.querySelector(`#seat-${seatNo}`);
        seat.classList.add("notAvailable");
      })
    }
  }
  // This is default
  searchInput.value = evt.target.innerText;
  this.innerText = "";
}

function convertToArray(routeSelected)
{
  // Converting comma separated cities to an array
  console.log(routeData);
  const arr = routeData
    .find(({route_id}) => {
      console.log(route_id,routeSelected);
      return route_id === routeSelected
    }).route_cities.split(",");

  return arr;
}


// Selecting Seats
const seatDiagram = document.querySelector("#seatsDiagram");
const seatInputInput = document.querySelector("#seatInput");
seatDiagram.addEventListener("click", selectSeat);
let selected_id; 

function selectSeat(evt)
{
  if(evt.target.nodeName == "TD" && !evt.target.className.includes("space") && !evt.target.className.includes("notAvailable"))
  {
    if(!selected_id || evt.target.dataset.name === selected_id)
    {
      selected_id = evt.target.dataset.name;
      evt.target.classList.toggle("selected");

      if(!evt.target.className.includes("selected"))
      {
        selected_id = "";
      }

      seatInput.value = selected_id;

      if(selected_id)
      {
        // Put a value for amount
        const sourceSelected = document.querySelector("#sourceSearch").value;
        const destSelected  = document.querySelector("#destinationSearch").value;
        const citiesArr = convertToArray(document.querySelector("#routeSearch").dataset.id);

        console.log(sourceSelected, destSelected, citiesArr);
        const stepCost = document.querySelector("#routeSearch").dataset.stepcost;

        const amount = (citiesArr.indexOf(destSelected) - citiesArr.indexOf(sourceSelected)) * parseInt(stepCost);
        console.log(citiesArr.indexOf(destSelected), citiesArr.indexOf(sourceSelected), stepCost);
        document.querySelector("#bookAmount").value = amount;
      }
    }
  }
}




// Table Operations
const resultRows = document.querySelectorAll("tr");
const editBtns = document.querySelectorAll(".edit-button");
const deleteBtns = document.querySelectorAll(".delete-button");
const table = document.querySelector("table");
const addRouteForm = document.querySelector("#addRouteForm");


resultRows.forEach(row => 
  row.addEventListener("click", editOrDelete)  
);

if(table)
{
  table.addEventListener("click", collapseForm);
}

function collapseForm(evt){
  if(evt.target.className.includes("btn-close")){
      const collapseRow = evt.target.parentElement.parentElement.parentElement.parentElement;

      // enable the edit button
      const editBtn = collapseRow.previousElementSibling.children[9].children[0];
      editBtn.disabled = false;
      editBtn.classList.remove("disabled");

      // Collapse the row
      collapseRow.remove();
  }
}

function editOrDelete(evt){
  
  if(evt.target.className.includes("edit-button"))
  {
      // Disable the button
      evt.target.disabled = true;
      evt.target.classList.add("disabled");

      const editRow = document.createElement("tr");
      editRow.innerHTML = `
      <td colspan="10">
          <form class="editRouteForm d-flex justify-content-between" action="${evt.target.dataset.link}" method="POST">

              <input type="hidden" name="id" value="${evt.target.dataset.id}">
              <input type="hidden" name="customer_id" value="${evt.target.dataset.customerid}">

              <input type="text" class="form-control" name="cname" value="${evt.target.dataset.name}">
            
              <input type="text" class="form-control cphone" name="cphone" value="${evt.target.dataset.phone}">        
         
              <div class="d-flex justify-content-between">
                  <button type="submit" class="btn btn-success btn-sm" name="edit">SUBMIT</button>
                  <button type="button" class="btn-close align-self-center"></button>
              </div>
          </form>
      </td>
  `;
  
  this.after(editRow);
  }
  // if delete button is clicked
  else if(evt.target.className.includes("delete-button"))
  {
      const deleteInput = document.querySelector("#delete-id");
      const deleteRouteId = document.querySelector("#delete-route-id");
      const deleteBookedSeat = document.querySelector("#delete-booked-seat");
      
      deleteBookedSeat.value = evt.target.dataset.bookedseat;
      deleteRouteId.value = evt.target.dataset.routeid;
      deleteInput.value = evt.target.dataset.id;
  }
}

