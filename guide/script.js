function initGoogle() {
    var location = {
        lat: 1.357107,
        lng: 103.8194992
    }

    var options = {
        center: location,
        zoom: 12,
        mapId: '48f8e6a60c8de5e0'
    }

    map = new google.maps.Map(document.getElementById('map'), options);

    autocomplete = new google.maps.places.Autocomplete(document.getElementById("input"), {
        fields: ['geometry', 'name'],
        type: ['university']
    })

    autocomplete.addListener("place_changed", () => {
        const place = autocomplete.getPlace();
        const marker = new google.maps.Marker({
            position: place.geometry.location,
            title: place.name,
            map: map
        });
        map.panTo(marker.getPosition())

    })
}

function buttonClicked() {
    var uni = document.getElementById("input").value

    // event handler: send an async request to the openweather webpage (in our case is json file?)
    let universities = fetch("countries.json")
        .then(response => response.json())
        .then(data => {
            // anything you want to do with the data goes between these 2 brackets
            console.log(data)
        })
}
