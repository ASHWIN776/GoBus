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

    #booking-results,
    #customer-results,
    #route,
    #bus-results
    {
        padding: 0 1rem;
    }

    #booking-results > div,
    #customer-results > div,
    #route > div,
    #bus-results > div
    {
        margin-bottom: 1rem;
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


    table{
        width: 90%;
    }

    #booking table{
        width: 100%;
    }

    table td, th{
        padding: 0.4rem 1rem;
        border: 1px solid;
    }

    table tr:nth-of-type(2n){
        background-color: white;
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
</style>