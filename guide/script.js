
function checkInput(input) {
    var verified = false;
    ['Univers', 'Campus', 'School', 'College'].forEach(word => {
        if (!verified && input.includes(word)) {
            verified = true;
            document.getElementById("instruction").style.display = "none";
            document.getElementById("instruction").style.cssText += 'height:0px !important';
            document.getElementById("instructionImage").style.display = "none";
            document.getElementById("instructionText").style.display = "none";
            document.getElementById("uni-info").style.display = "inline";
        }
    });

    if (verified == false) {
        document.getElementById("instruction").style.display = "inline";
        document.getElementById("instructionImage").style.display = "inline";
        document.getElementById("instructionText").style.display = "inline";
        document.getElementById("instructionImage").src = "img/lost.jpg";
        document.getElementById("instructionText").innerText = "Yikes! Seems like this isn't a University!";
        document.getElementById("uni-info").style.display = "none";
    }
}

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
        document.getElementById("start").style.display = "inline";
        return "Europe";
    } else if (["Hong Kong", "China", "India", "Indonesia", "Japan", "Philippines", "South Korea", "Taiwan", "Thailand"].includes(country)){
        document.getElementById("start").style.display = "inline";
        return "Asia";
    } else if (country == "Australia") {
        document.getElementById("start").style.display = "inline";
        return "Australia";
    } else if (["Canada", "USA", "Brazil", "Mexico", "Peru"].includes(country)) {
        document.getElementById("start").style.display = "inline";
        return "America";
    } else if (["Israel", "Turkey"].includes(country)) {
        document.getElementById("start").style.display = "inline";
        return "MiddleEast";
    } else if (["Kazakhstan"].includes(country)) {
        document.getElementById("start").style.display = "inline";
        return "CentralAsia";
    } else if (["South Africa"].includes(country)) {
        document.getElementById("start").style.display = "inline";
        return "Africa";
    } else {
        document.getElementById("start").style.display = "none";
        return "Oops! We didn't prepare any questions for this place!";
    }
}

function getDescription(google_name,country) {
    country = country[0].trim();
    var json_name;
    var description;
    var google_arr = google_name.replaceAll("&", "").replaceAll("-", "").replaceAll(",", "").replace("University","").replace("The","").replace("of","").split(" ").filter(e => e)
    var counter = 0;
    var highest_count = 0;
    var desc;

    fetch("../countries.json")
        .then(response => response.json()) // using json() method to EXTRACT json body content from Response object
        .then(data => {
            // anything you want to do with the data goes between these 2 brackets

            for (let index = 0; index < data.length; index++) {
                const uniObj = data[index];
                if (uniObj["Country"] == country) {
                    json_name = uniObj["University"];
                    json_name = json_name.split(" ");

                    // let compare = (google_arr, json_name) => google_arr.filter(v => json_name.includes(v)).length;
                    for (let i = 0; i < google_arr.length; i++) {
                        for (let j = 0; j < json_name.length; j++) {
                            if (json_name[j] == google_arr[i]) {
                                counter += 1
                            }
                        }
                    }

                    if (counter > highest_count) {
                        highest_count = counter;
                        description = uniObj["Description"];
                    }
                }

            }

            document.getElementById("desc").innerText = description;

            if (typeof(description) == "undefined"){
            document.getElementById("desc").innerText = 'Not a partner university.';
            }
        })
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
        checkInput(input.value);

        // Render University name
        document.getElementById("uniName").innerText = place.name;

        // Retrieve University's Country's Region and tags it to 'region' tag
        let countryChosen = input.value.split(",").slice(-1);
        document.getElementById("region").innerText = getRegion(countryChosen);

        // Retrieve University's Description and tag it to the 'desc' tag
        var google_name = document.getElementById("uniName").innerText;
        getDescription(google_name,countryChosen);

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
        infowindowContent.children.namedItem("place-address").textContent =
            place.formatted_address;
        infowindow.open(map, marker);


        // Render University description
        search_students();

        // restart quiz
        restart()

        photoUrl = place.photos[0].getUrl({ maxWidth: 1200, maxHeight: 1200 });
        document.getElementById('image').src = photoUrl;

    });
}