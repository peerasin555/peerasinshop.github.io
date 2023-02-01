<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 9, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + " วัน | " + hours + " ชั่วโมง | "
  + minutes + " นาที | " + seconds + " วินาที | ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>

<style>
.page-text-title {
    font-weight: 700;
    font-size: clamp(3rem,2.5vw,5rem);
    margin-bottom: 0;
    text-transform: uppercase;
    background: -webkit-linear-gradient(#56CCF2,#2F80ED);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.blockTitle {
    color: #fff;
    text-shadow: 0 0 2px rgba(255, 255, 255, 0.6);
    padding: 0 0 1rem 2.3rem;
    position: relative
}

.blockTitle::before {
    content: '';
    position: absolute;
    top: 8px;
    left: 8px;
    width: 1em;
    height: 1em;
    border: 4px solid #fe0000;
    border-bottom: transparent;
    border-left: transparent;
    transform: rotate(45deg)
}
.blockText {
    color: #fff;
    text-align: center
}
.time {
    text-shadow: 0 0 3px #fff;
    color: #fff;
    font-size: 2.3em;
    padding: 20px 0;

}

.time small {
    display: block;
    font-size: 18px
}

@media only screen and (max-width:575px) {
    .time {
        font-size: 2em
    }
    .time small {
        display: block;
        font-size: 12px
    }
}

.times small {
    display: block;
    font-size: 18px
}

@media only screen and (max-width:575px) {
    .times {
        font-size: 2em
    }
    .times small {
        display: block;
    }
}
.countdown {
    display: flex;
    justify-content: space-around;
    box-shadow: 0 0 10px rgba(0, 0, 0)inset;
    text-align: center;
    margin-bottom: 1em;
    border-radius: 1em
}




.texbo {
    text-shadow: 0 0 3px #fff;
    color: #fff;
    font-size: 1.9em;
    padding: 20px 0;

}

.texbo small {
    display: block;
    font-size: 18px
}

@media only screen and (max-width:575px) {
    .texbo {
        font-size: 2em
    }
    .texbo small {
        display: block;
        font-size: 12px
    }
}

.texbo small {
    display: block;
    font-size: 18px
}

@media only screen and (max-width:575px) {
    .texbo {
        font-size: 2em
    }
    .texbo small {
        display: block;
    }
}
.page-text-title {
    font-weight: 700;
    font-size: clamp(3rem,2.5vw,5rem);
    margin-bottom: 0;
    text-transform: uppercase;
    background: -webkit-linear-gradient(#fe0000,#fe0000);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 9, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + " วัน | " + hours + " ชั่วโมง | "
  + minutes + " นาที | " + seconds + " วินาที | ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>

<style>
.page-text-title {
    font-weight: 700;
    font-size: clamp(3rem,2.5vw,5rem);
    margin-bottom: 0;
    text-transform: uppercase;
    background: -webkit-linear-gradient(#56CCF2,#2F80ED);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.blockTitle {
    color: #fff;
    text-shadow: 0 0 2px rgba(255, 255, 255, 0.6);
    padding: 0 0 1rem 2.3rem;
    position: relative
}

.blockTitle::before {
    content: '';
    position: absolute;
    top: 8px;
    left: 8px;
    width: 1em;
    height: 1em;
    border: 4px solid #fe0000;
    border-bottom: transparent;
    border-left: transparent;
    transform: rotate(45deg)
}
.blockText {
    color: #fff;
    text-align: center
}
.time {
    text-shadow: 0 0 3px #fff;
    color: #fff;
    font-size: 2.3em;
    padding: 20px 0;

}

.time small {
    display: block;
    font-size: 18px
}

@media only screen and (max-width:575px) {
    .time {
        font-size: 2em
    }
    .time small {
        display: block;
        font-size: 12px
    }
}

.times small {
    display: block;
    font-size: 18px
}

@media only screen and (max-width:575px) {
    .times {
        font-size: 2em
    }
    .times small {
        display: block;
    }
}
.countdown {
    display: flex;
    justify-content: space-around;
    box-shadow: 0 0 10px rgba(0, 0, 0)inset;
    text-align: center;
    margin-bottom: 1em;
    border-radius: 1em
}




.texbo {
    text-shadow: 0 0 3px #fff;
    color: #fff;
    font-size: 1.9em;
    padding: 20px 0;

}

.texbo small {
    display: block;
    font-size: 18px
}

@media only screen and (max-width:575px) {
    .texbo {
        font-size: 2em
    }
    .texbo small {
        display: block;
        font-size: 12px
    }
}

.texbo small {
    display: block;
    font-size: 18px
}

@media only screen and (max-width:575px) {
    .texbo {
        font-size: 2em
    }
    .texbo small {
        display: block;
    }
}
.page-text-title {
    font-weight: 700;
    font-size: clamp(3rem,2.5vw,5rem);
    margin-bottom: 0;
    text-transform: uppercase;
    background: -webkit-linear-gradient(#fe0000,#fe0000);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.category-panel .category-details {
    width: 100%;
    padding: 10px 16px 6px;
    background: #000;
    background: linear-gradient(
0deg,rgba(0,0,0,0.95) 0%,rgba(0,0,0,0.9) 100%);
    border-radius: 5px;
}
.category-panel .category-details .category-name {
    width: 100%;
    font-weight: 500;
    font-size: 1.2rem;
}

.text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>
</style>