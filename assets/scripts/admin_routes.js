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
        const collapseRow = evt.target.parentElement.parentElement.parentElement;

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
        <td colspan="2">
            <input type="text" class="form-control" name="viaCities">
        </td>
        <td>
            <select name="time">
                <option value="day">
                        Day
                </option>
                <option value="night">
                    Night    
                </option>
            </select> 
    </td>
    <td>
        <input type="text" class="form-control" name="stepCost">        
    </td>
    <td>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success btn-sm" name="submit">SUBMIT</button>
            <button type="button" class="btn-close align-self-center"></button>
        </div>
    </td>`;
    
    this.after(editRow);
    }
}


