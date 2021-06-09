<style>
    *{
    font-family: Montserrat;
    }

    #booking #head, 
    #customer #head,
    #route #head,
    #seat #head,
    #bus #head
    {
        display: flex;
        justify-content: space-between;
        padding-top: 1rem;
    }


    #head #search{
        display: flex;
        align-items: center;
    }

    #search #wrapper{
        border: 2px solid black;
        border-radius: 20px;
        background-color: white;
        padding: 0.1rem 0.5rem;
    }

    #wrapper input{
        border: none;
        font-size: 17px;
        outline: none;
    }

    #wrapper a{
        color: #8B8989;

    }

    #wrapper a:hover{
        color: black;

    }

    #booking,
    #customer,
    #route,
    #bus,
    #seat
    {
        padding: 0 1rem;
    }

    #booking-results > div,
    #customer-results > div,
    #route-results > div,
    #bus-results > div
    {
        margin-bottom: 0.5rem;
    }

    #booking-results button,
    #customer-results button,
    #route button,
    #bus-results button
    {
        padding: 0.3rem 1rem;
        border-radius: 5px;
    }

    .button{
        border: none;
        font-weight: bold;
        text-transform: uppercase;
    }

    #filter-button, 
    #add-button{
        background-color: black;
        color: white;
    }

    #route table{
        width: 100%;
    }

    #bus table{
        width: 50%;
    }

    #booking table{
        width: 100%;
    }

    table td, th{
        padding: 0.4rem 1rem;
        border: 1px solid;
    }

    table button{
        color: white;
    }

    .edit-button{
        background-color: #4370E2;
    }

    .delete-button{
        background-color: #EF0000;
    }

    .disabled{
        opacity: 0.5;
    }

    .editRouteForm input{
        margin: 0 1rem; 
    }

    .editRouteForm input.cost{
        flex-basis: 15%;
    }

    .editRouteForm input.time,
    .editRouteForm input.date,
    .editRouteForm > div.searchBus{
        flex-basis: 40%;
    }

    .editRouteForm input.busnoInput{
        width: 100%;
        margin: 0;
    }

    #noRoutes,
    #noCustomers{
        background-color: black;
        color: white;
    }

    /* For seat.html */
    #main form{
        display: flex;
        padding: 0 1rem;
    }

    #main form input, 
    #main form button{
        margin: 0;
        padding: 0.4rem  1rem;
        font-size: 1.1rem;
    }

    #main form input{
        border-radius: 5px 0px 0px 5px;
        outline: none;
        border: 2px solid grey;
    }

    #main form button{
        background-color: black;
        color: white;
        border: none;
        border-radius: 0px 5px 5px 0px;
    }

    .hl{
        background-color: #79ff9c; 
    }

    .editRouteForm .searchBus{
        margin: 0 1rem;
    }

    .searchBus{
        position: relative;
    }

    .sugg{
        background-color: white;
        position: absolute;
        margin-top: 0.4rem;
        width:100%;
        border-radius: 5px;
        max-height: 114px;
        overflow: auto;
    }

    .editRouteForm .sugg{
    }

    .sugg li{
        border: solid #b0b0b0;
        border-width: 0 2px 2px 2px;
        border-radius: 5px;
        list-style-type: none;
        padding: 0.35rem 0.8rem;
    }

    .sugg li:first-child{
        border-top-width: 2px;
    }
    .sugg li:hover{
        cursor: pointer;
        background-color: #b0b0b0;
    }
</style>