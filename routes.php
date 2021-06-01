<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes Search Page</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS -->
    <?php require 'assets/styles/search_routes.php'?>
</head>
<body>
    <header>
        <nav id="navbar">
            <div>
                <a href="#" class="nav-item nav-logo">Logo</a>
                <a href="#" class="nav-item">Gallery</a>
            </div>
            <ul>
                <li><a href="#" class="nav-item">Home</a></li>
                <li><a href="#about" class="nav-item">About</a></li>
                <li><a href="#contact" class="nav-item">Contact</a></li>
            </ul>
            <div>
                <a href="#" class="login nav-item"><i class="fas fa-sign-in-alt" style="margin-right: 0.4rem;"></i>Login</a>
                <a href="#pnr-enquiry" class="pnr nav-item">PNR Enquiry</a>
            </div>
        </nav>
    </header>
    <main id="container">
        <section id="searched-route">
            <ul>
                <li class="searched-route-item" id="">Total Results : <span id="result-num">100</span></li>
                <li class="searched-route-item">Trivandrum <span class="arrow">&rarr;</span> Ernakulam
                <li class="searched-route-item" id="date">29/05/2021</li>
            </ul>
        </section>
        <section id="searched-results">
            <div id="searched-result-item">
                <div id="route-id">
                    <p>Route ID</p>
                </div>
                <div id="timing">
                    <p>00:53 <span class="arrow">&rarr;</span>  06:23</p>
                </div>
                <div id="route-desc">
                    <p id="main-route">
                        <span id="source-route">Trivandrum</span> 
                        <span class="arrow">&rarr;</span> 
                        <span id="dest-route">
                            Ernakulam
                        </span>
                    </p>
                    <p id="cities">
                        <span class="via">Via</span> KLM, ALP, EKM, TSR
                     </p>
                </div>
                <div id="seats-desc">
                    <div>
                        <span id="num-seats">
                        30
                    </span> seats
                    </div>
                </div>
                <div id="booking-desc">
                    <p id="price"><i class="fas fa-rupee-sign"></i> 100</p>
                    <button id="book-seat-btn">
                        Select Seats
                    </button>
                </div>
            </div>
            <div id="searched-result-item">
                <div id="route-id">
                    <p>Route ID</p>
                </div>
                <div id="timing">
                    <p>00:53 <span class="arrow">&rarr;</span>  06:23</p>
                </div>
                <div id="route-desc">
                    <p id="main-route">
                        <span id="source-route">Trivandrum</span> 
                        <span class="arrow">&rarr;</span> 
                        <span id="dest-route">
                            Ernakulam
                        </span>
                    </p>
                    <p id="cities">
                        <span class="via">Via</span> KLM, ALP, EKM, TSR
                     </p>
                </div>
                <div id="seats-desc">
                    <div>
                        <span id="num-seats">
                        30
                    </span> seats
                    </div>
                </div>
                <div id="booking-desc">
                    <p id="price"><i class="fas fa-rupee-sign"></i> 100</p>
                    <button id="book-seat-btn">
                        Select Seats
                    </button>
                </div>
            </div> <div id="searched-result-item">
                <div id="route-id">
                    <p>Route ID</p>
                </div>
                <div id="timing">
                    <p>00:53 <span class="arrow">&rarr;</span>  06:23</p>
                </div>
                <div id="route-desc">
                    <p id="main-route">
                        <span id="source-route">Trivandrum</span> 
                        <span class="arrow">&rarr;</span> 
                        <span id="dest-route">
                            Ernakulam
                        </span>
                    </p>
                    <p id="cities">
                        <span class="via">Via</span> KLM, ALP, EKM, TSR
                     </p>
                </div>
                <div id="seats-desc">
                    <div>
                        <span id="num-seats">
                        30
                    </span> seats
                    </div>
                </div>
                <div id="booking-desc">
                    <p id="price"><i class="fas fa-rupee-sign"></i> 100</p>
                    <button id="book-seat-btn">
                        Select Seats
                    </button>
                </div>
            </div> <div id="searched-result-item">
                <div id="route-id">
                    <p>Route ID</p>
                </div>
                <div id="timing">
                    <p>00:53 <span class="arrow">&rarr;</span>  06:23</p>
                </div>
                <div id="route-desc">
                    <p id="main-route">
                        <span id="source-route">Trivandrum</span> 
                        <span class="arrow">&rarr;</span> 
                        <span id="dest-route">
                            Ernakulam
                        </span>
                    </p>
                    <p id="cities">
                        <span class="via">Via</span> KLM, ALP, EKM, TSR
                     </p>
                </div>
                <div id="seats-desc">
                    <div>
                        <span id="num-seats">
                        30
                    </span> seats
                    </div>
                </div>
                <div id="booking-desc">
                    <p id="price"><i class="fas fa-rupee-sign"></i> 100</p>
                    <button id="book-seat-btn">
                        Select Seats
                    </button>
                </div>
            </div> <div id="searched-result-item">
                <div id="route-id">
                    <p>Route ID</p>
                </div>
                <div id="timing">
                    <p>00:53 <span class="arrow">&rarr;</span>  06:23</p>
                </div>
                <div id="route-desc">
                    <p id="main-route">
                        <span id="source-route">Trivandrum</span> 
                        <span class="arrow">&rarr;</span> 
                        <span id="dest-route">
                            Ernakulam
                        </span>
                    </p>
                    <p id="cities">
                        <span class="via">Via</span> KLM, ALP, EKM, TSR
                     </p>
                </div>
                <div id="seats-desc">
                    <div>
                        <span id="num-seats">
                        30
                    </span> seats
                    </div>
                </div>
                <div id="booking-desc">
                    <p id="price"><i class="fas fa-rupee-sign"></i> 100</p>
                    <button id="book-seat-btn">
                        Select Seats
                    </button>
                </div>
            </div> <div id="searched-result-item">
                <div id="route-id">
                    <p>Route ID</p>
                </div>
                <div id="timing">
                    <p>00:53 <span class="arrow">&rarr;</span>  06:23</p>
                </div>
                <div id="route-desc">
                    <p id="main-route">
                        <span id="source-route">Trivandrum</span> 
                        <span class="arrow">&rarr;</span> 
                        <span id="dest-route">
                            Ernakulam
                        </span>
                    </p>
                    <p id="cities">
                        <span class="via">Via</span> KLM, ALP, EKM, TSR
                     </p>
                </div>
                <div id="seats-desc">
                    <div>
                        <span id="num-seats">
                        30
                    </span> seats
                    </div>
                </div>
                <div id="booking-desc">
                    <p id="price"><i class="fas fa-rupee-sign"></i> 100</p>
                    <button id="book-seat-btn">
                        Select Seats
                    </button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>