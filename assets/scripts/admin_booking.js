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
    searchInput.addEventListener("input", showCustomerSuggestions);

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
    console.log(findCustomer);
    
    customerName.value = findCustomer.customer_name;
    customerPhone.value = findCustomer.customer_phone;
  }
  searchInput.value = evt.target.innerText;
  this.innerText = "";
}