const counters = document.querySelectorAll(".num");

counters.forEach(counter => {
    let target = +counter.dataset.target;
    let step = 100;
    let dec = parseInt((999 - target) / step);
    let i = 0;

    function updateCount()
    {   
        console.log(i++);
        if(i === 1000) return;
        const curr = +counter.innerText;
        console.log(curr, target);
        if(curr > target)
        {
            counter.innerText = curr - dec;
            setTimeout(updateCount, 5);
        }
        else counter.innerText = target;
    }

    setTimeout(updateCount,900);
});