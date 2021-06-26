<div class="card" style="text-align: center; margin: 0 0 0 0;">
    <div class="row">
        <div class="col-sm-6 col-6">
            <h12 style="font-size:1.8rem;"><b>City</b>
            </h12>
        </div>
        <div class="col-sm-6 col-6">
            <h7 style="font-size:1.8rem;">name<h7>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-sm-6 col-6">
            <h13 style="font-size:1.8rem; font-family: 'Poppins';"><b>State</b>
            </h13>
        </div>
        <div class="col-sm-6 col-6">
            <h8 style="font-size:1.8rem; font-family: 'Poppins';">region</h8>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6 col-6">
            <h14 style="font-size:1.8rem;"><b>Temperature</b>
            </h14>
        </div>
        <div class="col-sm-6 col-6">
            <h9 style="font-size:1.8rem; ">Temperature</h9>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6 col-6">
            <h15 style="font-size:1.8rem;"><b>Date & Time</b>
            </h15>
        </div>
        <div class="col-sm-6 col-6">
            <h10 style="font-size:1.8rem; ">Date</h10>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6 col-6">
            <h16 style="font-size:1.8rem;"><b>Waether Humidity</b>
            </h16>
        </div>
        <div class="col-sm-6 col-6">
            <h11 style="font-size:1.8rem;">humidity</h6>
        </div>
    </div>

</div>
<script>
    window.addEventListener('load', function () {
        var lat, lng;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (pos) {
                console.log(pos);
                lat = pos.coords.latitude;
                lng = pos.coords.longitude;


                // api =
                //     `http://api.weatherapi.com/v1/current.json?key=36a9b23e1d544cbfa5d180736211404&q=+${lat},${lng}`;



                api =
                    `http://api.weatherapi.com/v1/current.json?key=36a9b23e1d544cbfa5d180736211404&q=+${lat-2.1386486},${lng-1.36048}`;


                // api =
                //     `http://api.weatherapi.com/v1/current.json?key=36a9b23e1d544cbfa5d180736211404&q=+${24.467776},${72.776079}`;


                fetch(api).then(function (res) {
                    return res.json();
                }).then(function (data) {
                    console.log(data);
                    console.log(data.current.temp_c);
                    console.log(data.location.name);
                    console.log(data.location.region);
                    console.log(data.current.last_updated);
                    console.log(data.current.humidity);

                    document.getElementsByTagName('h7')[0].innerHTML = data.location
                        .name;
                    document.getElementsByTagName('h8')[0].innerHTML = data.location
                        .region;

                    document.getElementsByTagName('h9')[0].innerHTML = data.current
                        .temp_c + " C";
                    document.getElementsByTagName('h10')[0].innerHTML = data.current
                        .last_updated;
                    document.getElementsByTagName('h11')[0].innerHTML = data.current
                        .humidity + "%";
                })

            });


        } else {
            console.log("Geolocation does not supported by this browser.");
        }



    })
</script>