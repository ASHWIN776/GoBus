<style>
    body, html{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
    scroll-behavior: smooth;
    }

    *, *::after, *::before{
        box-sizing: inherit;
    }


    /* Overriding Bootstrap */
    nav a:hover{
        color: black;
    }
    nav{
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

    nav ul{
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

    nav a:not(.nav-logo):hover{
        text-decoration: underline;
    }

    .nav-logo{
        letter-spacing: 5px;
        transition: none;
    }


    #home{
        height: 70vh;
        background-image: url("assets/img/home-bg.jpg");
        background-size: cover;
        background-position: 0% 65%;;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #route-search-form{
        width: 50%;
        padding: 1rem 0.5rem;
        color: black;
        position: relative;
        z-index: 1;
    }

    #route-search-form::before{
        content: "";
        position: absolute;
        top: 0%;
        left: 0%;
        height: 100%;
        width: 100%;
        background-color: white;
        z-index: -1;
        opacity: 0.6;
    }


    #route-search-form h1{
        margin-top: 0;
        text-align: center;
        color: black;
    }

    form{
        padding: 0 0.5rem;
        font-weight: bold;
    }

    #route-search-form div{
        margin: 1rem 0;
    }

    form input, form textarea{
        border: 2px solid black;
        outline: none;
        width: 100%;
        font-size: inherit;
        border-radius: 5px;
    }


    #route-search-form form input{
        margin-top: 0.8rem;
    }


    #route-search-form form div:last-child{
        text-align: center;
    }

    form button{ 
        border:2px solid;
        padding: 0.3rem 0.7rem;
        font-weight: bolder;
        background-color: transparent;
        transition: background-color 800ms, color 800ms;
        border-radius: 4px;
    }

    form button:hover{
        background-color: #fff;
        color: #201E22;
        cursor: pointer;
    }

    #info-num{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    #info-num figure{
        flex-basis: 30%;
        padding: 2rem 0;
        text-align: center;
        border-radius: 5px;
    }

    #info-num figcaption{
        margin-top: 1rem;
        text-transform: uppercase;
    }

    #info-num .num{
        display: block;
        margin-bottom: 0.3rem;
        font-size: 1.2rem;
        font-weight: 800;
    }

    #pnr-enquiry{
        height: 80vh;
        background-image: url("assets/img/pnr-bg.jpg");
        background-size: cover;
        background-position: 50% 50%;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    #pnr-form{
        width: 100%;
        color: white;
        position: relative;
        z-index: 1;
    }

    #pnr-form::before{
        content: "";
        position: absolute;
        height: 100%;
        width: 100%;
        right: 0%;
        background-color: black;
        z-index: -1;
        opacity: 0.5;
    }

    #pnr-form input{
        width: 60%;
    }

    #pnr-form div{
        margin: 2rem 0;
    }

    #pnr-form button{
        font-weight: bold;
        padding: 0.3rem 1rem;
        text-transform: uppercase;
        border: 3px solid;
        color: #212529;
        background-color: white;
    }

    #pnr-form button:hover{
        color: #fff;
        background-color: #212529;
        cursor: pointer;
    }

    #about{
        text-align: center;
        padding: 3rem 0;
        background-color: #e5e5e5;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #about h1{
        margin: 0;
    }

    #about p{
        line-height: 26px;
    }

    #contact{
        background-color: black;
        color: white;
        padding: 3rem 0;
    }

    #contact-form{
        width: 60%;
        margin: 0 auto;
    }
    #contact-form h1{
        margin-top: 0;
        text-align: center;
    }

    #contact-form label{
        display: block;
        margin-bottom: 1rem;
    }

    #contact-form div{
        margin-top: 1rem;
    }


    footer{
        text-align: center;
        font-weight: bold;
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

        #home{
            height: 100vh;
            background-position: 40% 65%;
            background-attachment: fixed;
            display: block;
        }

            
        #route-search-form{
            position: absolute;
            top: 28%;
            right: 10%;
            width: 20rem;
            padding: 1rem 2rem;
        }


        #route-search-form h1{
            margin-top: 0;
            text-align: center;
        }

        form{
            padding: 0 0.5rem;
            font-weight: bold;
        }

        #route-search-form div{
            margin: 1rem 0;
        }

        #block{
            width: 100%;
        }


    }


    /* Desktops */
    @media only screen and (min-width: 992px){
        

        nav{
            width: 80%;
        }

        #home{
            background-position: 60% 65%;
        }


        #route-search-form{
            position: absolute;
            top: 22%;
            right: 15%;
            width: 25rem;
            padding: 2.5rem 2rem;
        }

        #block{
            width: 90%;
            margin: 0 auto;
        }

        #info-num figure{
            flex-basis: 15%;
        }

        #pnr-enquiry{
            height: 50vh;
        }

        #pnr-form{
            width: 50%;
        }

        #about{
            height: auto;
            padding: 2rem;
        }
        #about div{
            width: 50%;
        }

        #contact-form{
            width: 438px;
            margin: 0 auto;
        }
    }
</style>