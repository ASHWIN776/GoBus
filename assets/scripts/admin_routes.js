const editForm = document.querySelectorAll(".editRouteForm");
const resultRows = document.querySelectorAll("tr");
const editBtns = document.querySelectorAll(".edit-button");
const deleteBtns = document.querySelectorAll(".delete-button");
const table = document.querySelector("table");

resultRows.forEach(row => 
    row.addEventListener("click", showEditForm)  
);

table.addEventListener("click", collapseForm);

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

function showEditForm(evt){
    
    if(evt.target.className.includes("edit-button"))
    {
        // Disable the button
        evt.target.disabled = true;
        evt.target.classList.add("disabled");

        const editRow = document.createElement("tr");
        editRow.innerHTML = `
        <td colspan="5">
            <form class="editRouteForm d-flex justify-content-between" action="${evt.target.dataset.link}">
                <input type="text" class="form-control" name="viaCities">
            

                <select name="time">
                    <option value="day">
                            Day
                    </option>
                    <option value="night">
                        Night    
                    </option>
                </select> 
            
                <input type="text" class="form-control cost" name="stepCost">        
           
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success btn-sm" name="edit">SUBMIT</button>
                    <button type="button" class="btn-close align-self-center"></button>
                </div>
            </form>
        </td>
    `;
    
    this.after(editRow);
    }
}


