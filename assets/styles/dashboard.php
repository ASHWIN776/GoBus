<style>
    #main-content h3{
        padding-left: 1rem;
        margin-bottom: 0;
        text-transform: uppercase;
    }

    #status, #user, #admin{
        display: flex;
        flex-wrap: wrap;
    }

    .info-box{
        padding: 0.3rem 1rem;
        border-left: 4px solid;
        margin: 1rem;
        flex-basis: 45%;
        border-radius: 5px;
        box-shadow: 7px 7px 4px rgba(0, 0, 0, 0.25);
        background-color: white;
    }

    .heading{
        display: flex;
        justify-content: space-between;
    }
    .heading h5{
        color: white;
        text-align: center;
        padding: 0.5rem 1rem;
        flex-basis: 70%;
        border-radius: 7px;
        margin: 0.5rem 0;
    }

    .info-box p{
        margin: 0;
    }

    .info-content{
        margin-bottom: 1rem;
    }

    .info-content .num{
        font-size: 1.5rem;
    }

    .info-box a{
        display: block;
        text-align: right;
        text-decoration: none;
        font-weight: bold;
    }
    /* START-hardcoding */
    #Booking{
        border-color: #6393EF;
    }

    #Booking h5{
        background-color: #6393EF;
    }
    #Booking a{
        color: #6393EF;
    }

    #Bus {
        border-color: #84F572;
    }

    #Bus h5{
        background-color: #84F572;
    }

    #Bus a{
        color: #84F572;
    }

    #Route{
        border-color: #F54061;
    }

    #Route h5{
        background-color: #F54061;
    }

    #Route a{
        color: #F54061;
    }

    #Seat{
        border-color: #A66314;
    }

    #Seat h5{
        background-color: #A66314;
    }

    #Seat a{
        color: #A66314;
    }

    #Customer{
        border-color: #2D2B28;
    }

    #Customer h5{
        background-color: #2D2B28;
    }

    #Customer a{
        color: #2D2B28;
    }

    #Admin{
        border-color: #C6DE33;
    }

    #Admin h5{
        background-color: #C6DE33;
    }

    #Admin a{
        color: #C6DE33;
    }
    /* END-hardcoding */


    #admin .info-box{
        text-align: center;
        padding: 1rem 0;
        border: none;
    }

    #admin h4{
        margin: 0.5rem 0;
    }

    #admin img{
        border-radius: 50%;
    }


    @media only screen and (min-width:1000px){
        #main-content{
            flex-grow: 1;
        }

        .info-box{
            flex-basis: 20%;
        }

        #admin .info-box{
            flex-basis: 15%;
        }
    }
</style>