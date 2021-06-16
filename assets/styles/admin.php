<style>
    body{
    margin: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
    background-color: white;
    }

    html{
        scroll-behavior: smooth;
    }

    *, *::after, *::before{
        box-sizing: inherit;
    }

    /* #navbar{
        background-color: black;
        color: white;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        position: fixed;
        z-index: 1;
        top: 0;
        width: 100%;
    }

    #navbar ul{
        list-style-type: none;
        padding: 0.4rem 0;
        margin: 0;
        display: flex;
    }

    .nav-item{
        margin: 0 0.3rem;
        display: flex;
        justify-content: center;
        align-items: center;
    } */

    #USER{
        color: #207DFF;
    }


    .adminDp{
        border-radius: 50%;
    }

    #welcome{
        background-color: white;
        /* border-bottom: 1px solid rgb(19, 18, 18); */
    }

    #welcome ul{
        display: flex;
        justify-content: space-between;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #welcome li{
        margin: 0 1rem;
        padding: 0.5rem 0;
    }

    #welcome li:first-child{
        font-weight: 800;
        font-size: 1.4rem;
    }

    #logout{
        padding: 0.3rem 0.7rem;
        background-color: #207DFF;
        font-weight: 600;
        outline: none;
        border: none;
        border-radius: 7px;
    }

    #logout a{
        color: white;
        text-decoration: none;
    }

    footer{
        border-top: 2px solid #e2e2e2;
        padding: 0.5rem 0;
        text-align: center;
        font-weight: bold;
    }

    footer p{
        margin: 0;
    }

    @media only screen and (min-width:1000px){
        #sidebar{
            text-align: center;
            background-color: #207DFF;
            color: white;
            width: 15%;
            position: fixed;
            top: 0%;
            padding-top: 1rem;
            z-index: 2;
            height: 100vh;
        }
        #sidebar h3{
            margin: 0.5rem 0;
        }

        #sidebar p{
            margin: 0;
        }

        #sidebar ul{
            margin-top: 2rem;
        }

        #options{
            list-style-type: none;
            text-align: left;
            padding-left: 0;
        }
        .option a{
            display: block;
            padding: 0.5rem;
            text-decoration: none;
            color: inherit;
        }

        .option a:hover{
            color: black;
            background-color: white;
        }

        #main-content{
            margin-left: 16%;
        }

        .info-box{
            flex-basis: 20%;
        }
    }
</style>