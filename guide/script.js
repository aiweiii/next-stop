
function search_students() {
    // console.log('yea clicked');
    var uni = document.getElementById("uniName").innerHTML;
    // uni = "University of Vienna";

    document.getElementById("students_uni").innerHTML = '';

    // debug
    // console.log(uni);

    const url = 'get_studentsAPI.php?university=' + uni;
    // console.log(url);
    axios.get(url)
        .then(response => {
            var result = response.data
            // console.log(result)

            document.getElementById("students_uni_header").innerText = "Students exchanging in this University or Area"

            if (result.length == 0){
                document.getElementById("null_students").innerText = 'No students exchange here.';
            }

            for (user of result) {
                document.getElementById("null_students").innerText = '';
                document.getElementById("students_uni").innerHTML += `<li>${user}</li>`
            }


        })
        .catch(error => {
            // process error object
            console.log('error')
        });
}

function getRegion(country) {
    country = country[0].trim();
    if (["Austria", "Belgium", "Czech Republic", "Denmark", "Finland", "France", "Germany", "Iceland", "Ireland", "Italy", "Lithuania", "Netherlands", "Norway", "Poland", "Russia", "Spain", "Sweden", "Switzerland", "UK"].includes(country)) {
        return "Europe";
    } else if (["Hong Kong", "China", "India", "Indonesia", "Japan", "Philippines", "South Korea", "Taiwan", "Thailand"].includes(country)){
        return "Asia";
    } else if (country == "Australia") {
        return "Australia";
    } else if (["Canada", "USA", "Brazil", "Mexico", "Peru"].includes(country)) {
        return "America";
    } else if (["Israel", "Turkey"].includes(country)) {
        return "MiddleEast";
    } else if (["Kazakhstan"].includes(country)) {
        return "CentralAsia";
    } else if (["South Africa"].includes(country)) {
        return "Africa";
    } else {
        return "Oops! We didn't prepare any questions for this place!"
    }
}

function initMap() {
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

        // Google Maps start retrieving place details
        const place = autocomplete.getPlace();

        // Render University name
        document.getElementById("uniName").innerText = place.name;

        // Retrieve University's Country's Region and tags it to region tag
        let countryChosen = input.value.split(",").slice(-1);
        document.getElementById("region").innerText = getRegion(countryChosen);

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


        // Render University description
        search_students();

        photoUrl = place.photos[0].getUrl({ maxWidth: 1200, maxHeight: 1200 });
        document.getElementById('image').src = photoUrl;

    });
}