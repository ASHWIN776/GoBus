// Selecting Seats





// Booking Operations
const routeItems = document.querySelectorAll(".searched-result-item");
const bookContainers = document.querySelectorAll(".bookContainer");

bookContainers.forEach(container => container.addEventListener("click", collapseForm));

routeItems.forEach(route => route.addEventListener("click", bookingForm));

function bookingForm(evt)
{
    if(evt.target.className.includes("book-seat-btn"))
    {
        const btn = evt.target;
        btn.disabled = true;
        btn.style.opacity = "0.5";

        const bookRow = btn.parentElement.parentElement.nextElementSibling;
        bookRow.classList.add("bookRow");

        bookRow.innerHTML = `
        <form class="bookForm" action="" method="POST">
        <!-- Seats Diagram -->
                <table class="seatsDiagram">
                    <tr>
                        <td class="seat-1" data-name="1">1</td>
                        <td class="seat-2" data-name="2">2</td>
                        <td class="seat-3" data-name="3">3</td>
                        <td class="seat-4" data-name="4">4</td>
                        <td class="seat-5" data-name="5">5</td>
                        <td class="seat-6" data-name="6">6</td>
                        <td class="seat-7" data-name="7">7</td>
                        <td class="seat-8" data-name="8">8</td>
                        <td class="seat-9" data-name="9">9</td>
                        <td class="seat-10" data-name="10">10</td>
                            </tr>
                    <tr>
                        <td class="seat-11" data-name="11">11</td>
                        <td class="seat-12" data-name="12">12</td>
                        <td class="seat-131" data-name="13">13</td>
                        <td class="seat-14" data-name="14">14</td>
                        <td class="seat-15" data-name="15">15</td>
                        <td class="seat-16" data-name="16">16</td>
                        <td class="seat-17" data-name="17">17</td>
                        <td class="seat-18" data-name="18">18</td>
                        <td class="seat-19" data-name="19">19</td>
                        <td class="seat-20" data-name="20">20</td>
                            </tr>
                    <tr>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            </tr>
                    <tr>
                        <td class="seat-21" data-name="21">21</td>
                        <td class="seat-22" data-name="22">22</td>
                        <td class="seat-23" data-name="23">23</td>
                        <td class="seat-24" data-name="24">24</td>
                        <td class="seat-25" data-name="25">25</td>
                        <td class="seat-26" data-name="26">26</td>
                        <td class="seat-27" data-name="27">27</td>
                        <td class="space">&nbsp;</td>
                        <td class="seat-28" data-name="28">28</td>
                        <td class="seat-29" data-name="29">29</td>
                            </tr>
                    <tr>
                        <td class="seat-30" data-name="30">30</td>
                        <td class="seat-31" data-name="31">31</td>
                        <td class="seat-32" data-name="32">32</td>
                        <td class="seat-33" data-name="33">33</td>
                        <td class="seat-34" data-name="34">34</td>
                        <td class="seat-35" data-name="35">35</td>
                        <td class="seat-36" data-name="36">36</td>
                        <td class="space">&nbsp;</td>
                        <td class="seat-37" data-name="37">37</td>
                        <td class="seat-38" data-name="38">38</td>
                    </tr>
                    <!-- Pass the seat selected from here -->
                    <input type="hidden" name="seat">
                </table>
                <div class="customer-details">
                    <div class="form-continued">
                        <div>
                            <input type="text" name="firstName" placeholder="First Name*">
                            <input type="text" name="lastName" placeholder="Last Name*">
                        </div>
                        <div>
                            <input type="text" name="phone" placeholder="Phone Number*">
                        </div>
                        <button class="signup-btn" type="submit" name="signup">BOOK</button>
                    </div>
                </div>
                <i class="fas fa-times close-btn"></i>
        </form>
        `;
    }
}

function collapseForm(evt)
{
    if(evt.target.className.includes("close-btn"))
    {
        const close = evt.target;
        console.dir(close);
        const bookForm = close.parentElement;
        const bookContainer = bookForm.parentElement;
        const bookBtn = bookContainer.previousElementSibling.children[4].children[1];
        bookBtn.disabled = false;
        bookBtn.style.opacity="1";

        bookContainer.classList.remove("bookRow");
        bookForm.remove();
    }
}