alert("test 5")

function isUniApproved(input,university) {
    university = university.split(" ");
    validity = [];
    validity.length = university.length;

    input = input.split(',')
    first_part = input[0];
    second_part = input[1];

    for (let i = 0; i < university.length; i++) {
        const word = university[i];
        if (first_part.includes(word)) {
            validity[i] = true
        } else {
            validity[i] = false
        }
    }

    true_count = 0;
    false_count = 0;
    validity.forEach(bool => {
        if (bool === true) {
            true_count += 1
        }else{
            false_count += 1
        }
    });

    if (true_count >= (validity.length/2)) {
        console.log('true')
        return true
    }else{
        console.log('false')
        return false
    }
}

function initMap() {
    let inputVal = document.getElementById("pac-input").value;

    const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -33.8688, lng: 151.2195 },
        zoom: 13,
    });
    let input = document.getElementById("pac-input");

    const autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo("bounds", map);
    // Specify just the place data fields that you need.
    autocomplete.setFields(["place_id", "geometry", "formatted_address", "name", "photos"]);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");

    infowindow.setContent(infowindowContent);

    const marker = new google.maps.Marker({ map: map });

    marker.addListener("click", () => {
        infowindow.open(map, marker);
    });
    autocomplete.addListener("place_changed", () => {
        infowindow.close();

        fetch("../countries.json")
            .then(response => response.json()) // using json() method to EXTRACT json body content from Response object
            .then(data => {
                // anything you want to do with the data goes between these 2 brackets
                data.forEach(obj => {
                    if (isUniApproved(inputVal, obj["University"])==true) {
                        console.log('this uni exist in this term')
                    }
                });
            })
        inputVal = inputVal.split(",")[0]
        document.getElementById("uniName").innerText = inputVal

        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }

        // Set the position of the marker using the place ID and location.
        marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location,
        });
        marker.setVisible(true);
        infowindowContent.children.namedItem("place-name").textContent = place.name;
        infowindowContent.children.namedItem("place-id").textContent =
            place.place_id;
        infowindowContent.children.namedItem("place-address").textContent =
            place.formatted_address;
        infowindow.open(map, marker);

        photoUrl = place.photos[0].getUrl({ maxWidth: 1000, maxHeight: 1000 });
        document.getElementById('image').src = photoUrl;

    });
}