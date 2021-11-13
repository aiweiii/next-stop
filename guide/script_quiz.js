var start_btn = document.getElementById("start_btn");
// var next_btn = document.getElementById("next_btn");
// var option_list = document.getElementById("option_list");

// if START button is triggered aka "Let's Go"
start_btn.onclick = function() {
    alert('yes start!');
    var regionSelected = document.getElementById('region').innerText; //"Europe"
    var questionList = generateQuestionList(regionSelected);
    showQuestion(questionList,0)
}

// getting questions and options from array
function showQuestion(questionObj, index) {

    let questionHTML =
    '<div class="card text-center border-primary" style="width: 100%;">' +
        '<div class="card-body">' +
            '<h5 class="card-title text-primary fs-3 fw-bold">' + questionObj[index].question + '</h5>' +
        '</div>'+
        '<ul class="list-group list-group-flush">' +
            '<li class="list-group-item">' + questionObj[index].options[0] + '</li>' +
            '<li class="list-group-item">' + questionObj[index].options[1] + '</li>' +
            '<li class="list-group-item">' + questionObj[index].options[2] + '</li>' +
            '<li class="list-group-item">' + questionObj[index].options[3] + '</li>' +
        '</ul>' +
        '<button class="btn btn-primary btn-lg col-6" id="next_btn">Next!</button>' +
    '</div>';

    console.log(typeof questionObj[index].options[0]);
    console.log(questionObj[index].options[0]);

    document.getElementById("info-box").remove();
    document.getElementById("quiz-box").innerHTML = questionHTML;

    for (let i = 0; i < 4; i++) {
        questionObj[index].options[i].setAttribute("onclick","optionSelected(this)")
    }
}

function generateQuestionList(region) {
    var regionQuestions;
    if (region == "Europe") {
        regionQuestions = europeQuestions;
    } else if (region == "Asia") {
        regionQuestions = asiaQuestions;
    } else if (region == "Australia") {
        regionQuestions = australiaQuestions;
    } else if (region == "America") {
        regionQuestions = americaQuestions;
    } else if (region == "MiddleEast") {
        regionQuestions = middleeastQuestions;
    } else if (region == "CentralAsia") {
        regionQuestions = centralasiaQuestions;
    } else if (region == "Africa") {
        regionQuestions = africaQuestions;
    }

    return regionQuestions;
}

function optionSelected(answer) {

}

var counter = 0;

// if NEXT button is triggered
// next_btn.onclick = function () {
//     counter++;
//     showQuestion(questionList, counter)
// }