<style>
    *{
    font-family: Montserrat;
    }
    
    #signupForm{
        width: 60%;
        margin: 0 auto;
        text-align: center;
        padding-bottom: 1.5rem;
    }

    form{
        text-align: left;
        width: 80%;
        margin: 0 auto;
    }

    form > div{
        margin: 2rem 0;
    }

    form input{
        width: 100%;
        padding:0.5rem 1rem;
        border-radius: 4px;
        font-weight: bold;
    }

    form > div:first-child{
        display: flex;
        justify-content: space-between;
    }

    form > div:first-child input{
        flex-basis: 47%;
    }

    form span{
        font-size: 0.8rem;
    }

    #signup-btn{
        border-radius: 5px;
        font-family: Montserrat;
        font-weight: bold;
        background-color: black;
        color: white;
        display: block;
        width: 100%;
        margin: 0 auto;
        padding: 0.5rem 0;
    }

    @media only screen and (min-width: 1000px)
    {
        #add-admin{
            display: flex;
        }

        #add-admin > div{
            flex-basis: 50%;
            height: calc(100vh - 50px);
        }

        #add-admin > div:first-child{
            display: flex;
            align-items: center;
        }

        #add-admin > div:last-child{
            background-image: url("../assets/img/signup.png");
            background-position: 50% 60%;
        }

        form{
            width: 100%;
        }
    }
</style>