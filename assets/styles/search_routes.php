<style>
    body{
    margin: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
    background-color: #F4F4F4;
    }

    *, *::after, *::before{
        box-sizing: inherit;
    }
    /* Navbar Styling  - START*/

    .alert{
        z-index: 3;
    }

    .alert li{
        font-weight: normal;
    }

    #noRoutes{
        background-color: black;
        color: white;
    }

    #navbar{
        text-align: center;
        padding: 0.4rem 0;
    }

    nav div, nav ul{
        margin-top: 1rem;
    }

    nav div:first-child{
        margin-top: 0;
    }

    nav > div a{
        display: block;
    }

    ul{
        list-style-type: none;
        padding: 0;
        margin-bottom: 0;
    }

    nav a{
        padding-bottom: 0.2rem;
        text-decoration: none;
        color: black;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* Overriding Bootstrap */
    nav a:hover{
        color: black;
    }

    nav a:not(.nav-logo):hover{
        text-decoration: underline;
    }

    .nav-logo{
        color: #207DFF;
        letter-spacing: 5px;
        transition: none;
    }

    .nav-scroll{
        position: fixed;
        background-color: white;
    }

    /* Navbar Styling  - END*/
    main{
        height: 85vh;
    }

    #searched-route{
        /* margin-top: 2rem; */
        margin-bottom: 2rem;
        background-color: black;
        color: white;
    }

    #result-num, 
    .arrow,
    #num-seats{
        font-weight: bold;
        color: red;
    }

    .arrow{
        display: inline-block;
        margin: 0 1rem;
    }

    #searched-route ul{
        height: 20vh;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }

    #searched-route ul li:first-child{
        align-self: flex-start;
        margin-left: 1rem;
    }

    #searched-route li{
        text-transform: uppercase;
    }

    #main-route{
        font-weight: bold;
    }

    /* Results Styling - START */
    .searched-result-item{
        background-color: white;
        padding: 1rem 0;
        text-align: center;
        border: 2px solid;
        border-radius: 5px;
        margin-bottom: 1rem;
    }

    .searched-container{
        margin: 0 auto;
        width: 90%;
    }

    .searched-result-item > div{
        text-transform: uppercase;
    }


    .searched-result-item .arrow{
        color: blue;
    }

    .route-id{
        color: red;
        font-size: 1.3rem;
    }

    .cities{
        font-size: 12px;
        color: #0EF80A;
    }

    .cities .via{
        margin-right: 0.4rem;
        color: red;
    }

    .price{
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
        font-weight: bold;
    }

    .book-seat-btn{
        border-radius: 5px;
        background-color: #84F572;
        border: none;
        text-transform: inherit;
        font-weight: bold;
        padding: 0.5rem;
    }

/* Seats Diagram Styling */
    .seatsDiagram td
    {
        padding: 0.3rem;
        text-align: center;
        margin: 0.3rem;
        width: 50px;
        border: 3px solid transparent;
        display: inline-block;
        background-color: #efefef;
        border-radius: 5px;
    }


    .seatsDiagram  td.selected{
        background-color: greenyellow;
        -webkit-animation-name: rubberBand;
        animation-name: rubberBand;
        animation-duration: 300ms;
        animation-fill-mode: both;
    }

    .seatsDiagram td.notAvailable
    {
        color: white;
        background-color: purple;
    }

    .seatsDiagram td:not(.space,.notAvailable):hover{
        cursor: pointer;
        border-color:greenyellow;
    }

    .seatsDiagram .space{
        background-color: white;
        border: none;
    }

    .bookRow{
        border: 2px solid;
        background-color: white;
        border-radius: 5px;
        padding: 0.5rem;
        margin-bottom: 2rem;
    }

    .bookForm{
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }

    .seatsDiagram, 
    .customer-details{
        width: 640px;   
        max-width: 100%;
    }

    .form-continued{
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 90%;
        margin: 0 auto;
    }
    
    .form-continued > *{
        margin: 1rem 0;
    }
    
    .bookForm input{
        width: 100%;
        padding: 0.3rem;
        border-radius: 4px;
        font-weight: bold;
    }


    .bookForm .form-continued > div:first-child{
        display: flex;
        justify-content: space-between;
    }

    .bookForm .form-continued > div:first-child input{
        flex-basis: 47%; 
    }

    .bookForm .book-btn{
        border-radius: 5px;
        font-family: Montserrat;
        font-weight: bold;
        background-color: black;
        color: white;
        display: block;
        padding: 0.5rem 0;
    }

    .close-btn{
        position: absolute;
        top: 0%;
        right: 0.3%;
    }

    .close-btn:hover{
        color: #6c757d;
    }

    .busNo{
        font-size: 1.2rem;
        padding-top: 1rem;
        text-align: center;
        font-weight: bold;
        color: #9a031e;
    }


    footer{
        /* background-color: black;
        color: white; */
        border-top: 2px solid #e2e2e2;
        padding: 0.5rem 0;
        text-align: center;
        font-weight: bold;
    }

    #searched-route{
        margin-bottom: 2rem;
    }
   
    footer p{
        margin: 0;
    }
    @-webkit-keyframes rubberBand {
        0% {
            -webkit-transform: scale3d(1, 1, 1);
                    transform: scale3d(1, 1, 1);
        }

        30% {
            -webkit-transform: scale3d(1.25, 0.75, 1);
                    transform: scale3d(1.25, 0.75, 1);
        }

        40% {
            -webkit-transform: scale3d(0.75, 1.25, 1);
                    transform: scale3d(0.75, 1.25, 1);
        }

        50% {
            -webkit-transform: scale3d(1.15, 0.85, 1);
                    transform: scale3d(1.15, 0.85, 1);
        }

        65% {
            -webkit-transform: scale3d(.95, 1.05, 1);
                    transform: scale3d(.95, 1.05, 1);
        }

        75% {
            -webkit-transform: scale3d(1.05, .95, 1);
                    transform: scale3d(1.05, .95, 1);
        }

        100% {
            -webkit-transform: scale3d(1, 1, 1);
                    transform: scale3d(1, 1, 1);
        }
        }

        @keyframes rubberBand {
        0% {
            -webkit-transform: scale3d(1, 1, 1);
                    transform: scale3d(1, 1, 1);
        }

        30% {
            -webkit-transform: scale3d(1.25, 0.75, 1);
                    transform: scale3d(1.25, 0.75, 1);
        }

        40% {
            -webkit-transform: scale3d(0.75, 1.25, 1);
                    transform: scale3d(0.75, 1.25, 1);
        }

        50% {
            -webkit-transform: scale3d(1.15, 0.85, 1);
                    transform: scale3d(1.15, 0.85, 1);
        }

        65% {
            -webkit-transform: scale3d(.95, 1.05, 1);
                    transform: scale3d(.95, 1.05, 1);
        }

        75% {
            -webkit-transform: scale3d(1.05, .95, 1);
                    transform: scale3d(1.05, .95, 1);
        }

        100% {
            -webkit-transform: scale3d(1, 1, 1);
                    transform: scale3d(1, 1, 1);
        }
        }

        .rubberBand {
        -webkit-animation-name: rubberBand;
                animation-name: rubberBand;
        }

    /* Tablet */
    @media only screen and (min-width: 784px){
        header{
            position: fixed;
            display: block;
            top: 0;
            width: 100%;
            z-index: 1;
        }
        nav{
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin: 0 auto;
            padding-top: 1rem;
        }

        nav > div{
            display: flex;
            align-items: center;
            flex-grow: 1;
            justify-content: center;
        }

        nav ul{
            display: flex;
            flex-grow: 1;
            justify-content: center;
        }

        nav div, nav ul{
            margin-top: 0;
        }
        
        nav a{
            border-bottom: 2px solid transparent;
            margin: 0 1rem;
            transition: border-color 800ms;
            border-radius: 2px;
        }

        nav a:not(.nav-logo):hover{
            border-color: black;
            text-decoration: none;
        }

    }

    /* Desktops */
    @media only screen and (min-width: 992px){
        nav, #searched-route{
            width: 80%;
        }

        #searched-route{
            margin: 4rem auto 2rem auto;
        }

        #searched-route ul{
            flex-direction: row;
            justify-content: space-between;
        }

        #searched-route ul li:first-child{
            align-self: center;
            margin: 0;
            margin-left: 1rem;
        }

        #searched-route li:last-child{
            flex-basis: 17.5%;
            text-align: right;
            margin-right: 1rem;
        }

        .searched-container{
            width: 70%;
        }
        .searched-result-item{
            padding: 0;
            display: flex;
            justify-content: space-between;
        }


        .searched-result-item > * {
            border: 0 solid black;
            border-right-width: 2px;
            display: flex;
            align-items: center;
            padding: 0 0.5rem;
        }

        .searched-result-item > *:last-child{
            border-right-width: 0;
        }

        .searched-result-item > * > *:first-child{
            margin: 0;
        }

        .route-desc, .booking-desc{
            flex-direction: column;
        }

        .booking-desc{
            justify-content: space-around;
        }
        
        .route-desc{
            flex-grow: 1;
        }

        .main-route{
            padding-top: 2.4rem;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .bookForm{
            display: flex;
            flex-direction: row; 
        }

        .customer-details{
            width: auto;
        }
    }

</style>