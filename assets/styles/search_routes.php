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

    #navbar{
        text-align: center;
        padding: 1.5rem 0;
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
        letter-spacing: 5px;
        transition: none;
    }


    /* Navbar Styling  - END*/

    #searched-route{
        margin-top: 4rem;
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
    #searched-result-item{
        background-color: white;
        padding: 1rem 0;
        text-align: center;
        border: 2px solid;
        width: 90%;
        margin: 0 auto;
        margin-bottom: 1rem;
        border-radius: 5px;
    }

    #searched-result-item > div{
        text-transform: uppercase;
    }


    #searched-result-item .arrow{
        color: blue;
    }

    #route-id{
        color: red;
        font-size: 1.3rem;
    }

    #cities{
        font-size: 12px;
        color: #0EF80A;
    }

    #cities .via{
        margin-right: 0.4rem;
        color: red;
    }

    #price{
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
        font-weight: bold;
    }

    #book-seat-btn{
        border-radius: 5px;
        background-color: #84F572;
        border: none;
        text-transform: inherit;
        font-weight: bold;
        padding: 0.5rem;
    }



    /* Tablet */
    @media only screen and (min-width: 784px){
        header{
            position: absolute;
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

        #searched-result-item{
            padding: 0;
            width: 70%;
            display: flex;
            justify-content: space-between;
        }

        #searched-result-item > * {
            border: 0 solid black;
            border-right-width: 2px;
            display: flex;
            align-items: center;
            padding: 0 0.5rem;
        }

        #searched-result-item > *:last-child{
            border-right-width: 0;
        }

        #searched-result-item > * > *:first-child{
            margin: 0;
        }

        #route-desc, #booking-desc{
            flex-direction: column;
        }

        #booking-desc{
            justify-content: space-around;
        }
        
        #route-desc{
            flex-grow: 1;
        }

        #main-route{
            padding-top: 2.4rem;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        
    }
</style>