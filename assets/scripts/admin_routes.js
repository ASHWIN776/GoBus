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
        const editBtn = collapseRow.previousElementSibling.children[4].children[0];
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
        <td colspan="6">
            <form class="editRouteForm d-flex justify-content-between" action="${evt.target.dataset.link}" method="POST">

                <input type="hidden" name="id" value="${evt.target.dataset.id}">
                <input type="text" class="form-control" name="viaCities" value="${evt.target.dataset.cities}">

                <input type="date" class="form-control date" name="dep_date" value="${evt.target.dataset.date}">

                <input type="time" class="form-control time" name="dep_time" value="${evt.target.dataset.time}">  
                
            
                <input type="text" class="form-control cost" name="stepCost" value="${evt.target.dataset.cost}">        
           
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
        deleteInput.value = evt.target.dataset.id;
    }
}


// AddRouteForm
const busJsonInput = document.querySelector("#busJson");
const busJson = busJsonInput.value;
const searchBox = document.querySelector("#searchBus");
const searchInput = document.querySelector("#busno");
const suggBox = document.querySelector("#sugg");
// Here is the bus data to be shown in the add Modal
let data = JSON.parse(busJson);

searchInput.addEventListener("input", showSuggestions);
suggBox.addEventListener("click", selectSuggestion);

function selectSuggestion(evt){
    if(evt.target.nodeName === "LI")
    {
        searchInput.value = evt.target.innerText;
        suggBox.innerText = "";
    }
}

function showSuggestions()
{
    const word = this.value;

    if(!word)
    {
        suggBox.innerText = "";
        return;
    }

    const regex = new RegExp(word, "gi");

    let suggestions = data.filter(({bus_no}) => {
        return bus_no.match(regex);
    }).map(({bus_no}) => {
        const bus_num = bus_no.replace(regex, `<span class="hl">${this.value.toUpperCase()}</span>`);
        console.log(bus_num);
        return `<li>${bus_num}</li>`;
    }).join("");

    suggBox.innerHTML = suggestions;
}

