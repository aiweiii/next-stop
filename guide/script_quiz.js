// if START button is triggered aka "Let's Go"
document.getElementById("start_btn").onclick = function() {
    let counter = 0;
    alert('yes start!');
    var regionSelected = document.getElementById('region').value;
    var questionList = generateQuestionList(regionSelected);
    showQuestion(questionList,0)
}

// getting questions and options from array
function showQuestion(questionObj,index) {

    let questionHTML =
        '<div class="card text-center border-primary" style="width: 100%;">'+
        '<div class="card-body">'+
        '<h5 class="card-title text-primary fs-3 fw-bold">' + questionObj[index].question+'</h5>'+
        '</div>'+
        '<ul class="list-group list-group-flush">'+
            '<li class="list-group-item">' + questionObj[index].options[0] + '</li>'+
            '<li class="list-group-item">' + questionObj[index].options[1] + '</li>'+
            '<li class="list-group-item">' + questionObj[index].options[2] + '</li>' +
            '<li class="list-group-item">' + questionObj[index].options[3] + '</li>' +
        '</ul>'+
        '<button class="btn btn-primary btn-lg col-6" id="next_btn">Next!</button>'+
        '</div>';

    document.getElementById("questionBody").innerHTML() = questionHTML;
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

// if NEXT button is triggered
document.getElementById("next_btn").onclick = () => {
    counter++;
    showQuestion(questionList,counter)
}