alert("alert 11")

// function isUniApproved(input,university) {
//     university = university.split(" ");
//     validity = [];
//     validity.length = university.length;

//     input = input.split(',')
//     first_part = input[0];
//     second_part = input[1];

//     for (let i = 0; i < university.length; i++) {
//         const word = university[i];
//         if (first_part.includes(word)) {
//             validity[i] = true
//         } else {
//             validity[i] = false
//         }
//     }

//     true_count = 0;
//     false_count = 0;
//     validity.forEach(bool => {
//         if (bool === true) {
//             true_count += 1
//         }else{
//             false_count += 1
//         }
//     });

//     if (true_count >= (validity.length/2)) {
//         console.log('true')
//         return true
//     }else{
//         console.log('false')
//         return false
//     }
// }

// function compareArr(arr,uniArr) {

//     var tfArr = Array.from({ length: uniArr.length }, (v, i) => false)

//     for (let i = 0; i < uniArr.length; i++) {
//         let word = arr[i];
//         if (uniArr.includes(word)) {
//             tfArr[i] = true;
//         }
//     }
//     const count = tfArr.filter(Boolean).length;
//     return count
// }

function fetchUniFromJson(input) {
    // input is a STRING from Google: "Aarhus University, School of Business and Social Sciences, Fuglesangs Allé, Aarhus Municipality, Denmark"
    input = input.split(",");
    var nameArr = input[0] + input[1];
    var nameArr = nameArr.replaceAll("&", "").replaceAll("-", "").replaceAll(",", "").split(" ").filter(e => e); // Aarhus University, School of Business and Social Sciences
    var country = input; //check if it will return \n
    var highestCount = 0;
    var mostAccurateStr = [];

    fetch("countries.json")
        .then(response => response.json()) // using json() method to EXTRACT json body content from Response object
        .then(data => {
            // anything you want to do with the data goes between these 2 brackets
            data.forEach(obj => {
                console.log(obj)
                if (obj["Country"] == country) {

                    var currUni = obj["University"];
                    // direct check on string
                    if (currUni.includes(input[0]) || currUni.includes(input[1])) {
                        return currUni
                    }
                    // //compare FIRST ARRAY with SECOND ARRAY's number of 'TRUE' and pick the arr with the higher number of 'TRUE'
                    // const firstCount = compareArr(firstArr, currUniArr);
                    // const secondCount = compareArr(secondArr, currUniArr);

                    // if (firstCount>=secondCount && firstCount>highestCount) {
                    //     // if it's equal, just take the first one
                    //     mostAccurateArr = firstArr;
                    // } else if (secondCount >= firstCount && secondCount > highestCount) {
                    //     mostAccurateArr = secondArr;
                    // }
                }

            });
        })
}

function search_students() {
    // console.log('yea clicked');
    var uni = document.getElementById("uniName").innerHTML;
    // uni = "University of Vienna";

    // debug
    // console.log(uni);

    const url = 'get_studentsAPI.php?university=' + uni
    // console.log(url);
    axios.get(url)
        .then(response => {
            var result = response.data
            // console.log(result)

            document.getElementById("students_uni_header").innerText = "Students entering this uni"
            for (user of result) {
                document.getElementById("students_uni").innerHTML += `<li>${user}</li>`
            }

        })
        .catch(error => {
            // process error object
            console.log('error')
        });
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

        // Render University name
        let inputVal = document.getElementById("pac-input").value;
        let uni = fetchUniFromJson(inputVal)
        document.getElementById("uniName").innerText = uni;

        // Render University description
        search_students();

        // Google Maps start retrieving place details
        const place = autocomplete.getPlace();
        document.getElementById("uniName").innerText = uni;

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

        photoUrl = place.photos[0].getUrl({ maxWidth: 1200, maxHeight: 1200 });
        document.getElementById('image').src = photoUrl;

    });
}