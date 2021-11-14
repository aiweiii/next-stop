const startBtn = document.getElementById("start");
const nextBtn = document.getElementById("next");
const restartBtn = document.getElementById("restart");
const endBtn= document.getElementById("end");
const optOneBtn = document.getElementById("option1");
const optTwoBtn = document.getElementById("option2");
const optThreeBtn = document.getElementById("option3");
const optFourBtn = document.getElementById("option4");
const userScore = document.getElementById("user-score");
const questionText = document.getElementById("question-text");

var currentQuestion = 0;
var score = 0;

startBtn.addEventListener('click', start);
restartBtn.addEventListener('click',restart);
nextBtn.addEventListener('click', next);
endBtn.addEventListener('click', end);

function getQuestions(region) {
    if (region == "Europe") {
        return europe;
    } else if (region == "Asia") {
        return asia;
    } else if (region == "Australia") {
        return australia;
    } else if (region == "America") {
        return america;
    } else if (region == "MiddleEast") {
        return middleEast;
    } else if (region == "CentralAsia") {
        return centralAsia;
    } else if (region == "Africa") {
        return africa;
    }
}

function welcomeQuiz() {
    startBtn.onclick = () => {
        document.getElementById("welcome-area").style.display="none";
        document.getElementById("question-area").style.display="inline";
        start();
    }
}

function start() {
    for (let i = 1; i < 5; i++) {
        document.getElementById("option" + i).disabled = false;
    }
    for (let i = 1; i < 5; i++) {
        document.getElementById("option" + i).setAttribute("class", "list-group-item list-group-item-action list-hover");
    }
    document.getElementById("restart").style.display = "inline";
    const regionChosen = document.getElementById("region").innerText;
    var questions = getQuestions(regionChosen);

    questionText.innerHTML = questions[currentQuestion].question;
    // document.getElementById("questionImage").src = "hackanm.gif";
    let correct_option = questions[currentQuestion].correct;

    optOneBtn.innerText = questions[currentQuestion].answers[0].option;
    optOneBtn.onclick = () => {
        if (correct_option==0) {
            score++;
            document.getElementById("option1").setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        } else {
            document.getElementById("option1").setAttribute("class", "bg-danger p-2 text-dark bg-opacity-25")
            var number = correct_option+1;
            document.getElementById("option"+number).setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        }
        for (let i = 1; i < 5; i++) {
            document.getElementById("option" + i).disabled = true;
        }
        userScore.innerHTML = score;
        document.getElementById("next").style.display = "inline";

    }
    optTwoBtn.innerHTML = questions[currentQuestion].answers[1].option;
    optTwoBtn.onclick = () => {
        if (correct_option == 1) {
            score++;
            document.getElementById("option2").setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        } else {
            document.getElementById("option2").setAttribute("class", "bg-danger p-2 text-dark bg-opacity-25")
            var number = correct_option + 1;
            document.getElementById("option" + number).setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        }
        for (let i = 1; i < 5; i++) {
            document.getElementById("option" + i).disabled = true;
        }
        userScore.innerHTML = score;
        document.getElementById("next").style.display = "inline";
    }
    optThreeBtn.innerHTML = questions[currentQuestion].answers[2].option;
    optThreeBtn.onclick = () => {
        if (correct_option == 2) {
            score++;
            document.getElementById("option3").setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        } else {
            document.getElementById("option3").setAttribute("class", "bg-danger p-2 text-dark bg-opacity-25")
            var number = correct_option + 1;
            document.getElementById("option" + number).setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        }
        for (let i = 1; i < 5; i++) {
            document.getElementById("option" + i).disabled = true;
        }
        userScore.innerHTML = score;
        document.getElementById("next").style.display = "inline";
    }
    optFourBtn.innerHTML = questions[currentQuestion].answers[3].option;
    optFourBtn.onclick = () => {
        if (correct_option == 3) {
            score++;
            document.getElementById("option4").setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        } else {
            document.getElementById("option4").setAttribute("class", "bg-danger p-2 text-dark bg-opacity-25")
            var number = correct_option + 1;
            document.getElementById("option" + number).setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        }
        for (let i = 1; i < 5; i++) {
            document.getElementById("option" + i).disabled = true;
        }
        userScore.innerHTML = score;
        document.getElementById("next").style.display = "inline";
    }


}

function restart() {
    currentQuestion = 0;
    score = 0;

    userScore.innerHTML = score;
    nextBtn.style.display = 'none';
    restartBtn.style.display = 'none';
    endBtn.style.display = 'none';
    document.getElementById("question-area").style.display = "none";
    document.getElementById("submit-area").style.display = "none";
    document.getElementById("welcome-area").style.display = "inline";
    welcomeQuiz();
}

function end() {
    // nextBtn.classList.add('hide');
    // optOneBtn.classList.add('hide');
    // optTwoBtn.classList.add('hide');
    // optThreeBtn.classList.add('hide');
    // optFourBtn.classList.add('hide');

    restartBtn.style.display = 'none';
    nextBtn.style.display = 'none';
    endBtn.style.display = 'none';
    document.getElementById("question-area").style.display = "none";
    document.getElementById("submit-area").style.display = "inline";
}

function next() {
    currentQuestion++;

    for (let i = 1; i < 5; i++) {
        document.getElementById("option" + i).disabled = false;
    }
    if (currentQuestion == 4) {
        document.getElementById("next").style.display = "none";
    }
    for (let i = 1; i < 5; i++) {
        document.getElementById("option" + i).setAttribute("class", "list-group-item list-group-item-action list-hover");
    }

    const regionChosen = document.getElementById("region").innerText;
    var questions = getQuestions(regionChosen);
    let correct_option = questions[currentQuestion].correct;

    questionText.innerHTML = questions[currentQuestion].question;
    optOneBtn.innerHTML = questions[currentQuestion].answers[0].option;
    optOneBtn.onclick = () => {
        if (correct_option == 0) {
            score++;
            document.getElementById("option1").setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        } else {
            document.getElementById("option1").setAttribute("class", "bg-danger p-2 text-dark bg-opacity-25")
            var number = correct_option + 1;
            document.getElementById("option" + number).setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        }
        for (let i = 1; i < 5; i++) {
            document.getElementById("option" + i).disabled = true;
        }
        userScore.innerHTML = score;
        if (currentQuestion==4) {
            document.getElementById("end").style.display = "inline";
        }
    }
    optTwoBtn.innerHTML = questions[currentQuestion].answers[1].option;
    optTwoBtn.onclick = () => {
        if (correct_option == 1) {
            score++;
            document.getElementById("option2").setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        } else {
            document.getElementById("option2").setAttribute("class", "bg-danger p-2 text-dark bg-opacity-25")
            var number = correct_option + 1;
            document.getElementById("option" + number).setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        }
        for (let i = 1; i < 5; i++) {
            document.getElementById("option" + i).disabled = true;
        }
        userScore.innerHTML = score;
        if (currentQuestion == 4) {
            document.getElementById("end").style.display = "inline";
        }
    }
    optThreeBtn.innerHTML = questions[currentQuestion].answers[2].option;
    optThreeBtn.onclick = () => {
        if (correct_option == 2) {
            score++;
            document.getElementById("option3").setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        } else {
            document.getElementById("option3").setAttribute("class", "bg-danger p-2 text-dark bg-opacity-25")
            var number = correct_option + 1;
            document.getElementById("option" + number).setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        }
        for (let i = 1; i < 5; i++) {
            document.getElementById("option" + i).disabled = true;
        }
        userScore.innerHTML = score;
        if (currentQuestion == 4) {
            document.getElementById("end").style.display = "inline";
        }
    }
    optFourBtn.innerHTML = questions[currentQuestion].answers[3].option;
    optFourBtn.onclick = () => {
        if (correct_option == 3) {
            score++;
            document.getElementById("option4").setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        } else {
            document.getElementById("option4").setAttribute("class", "bg-danger p-2 text-dark bg-opacity-25")
            var number = correct_option + 1;
            document.getElementById("option" + number).setAttribute("class", "bg-success p-2 text-dark bg-opacity-25")
        }
        for (let i = 1; i < 5; i++) {
            document.getElementById("option" + i).disabled = true;
        }
        userScore.innerHTML = score;
        if (currentQuestion == 4) {
            document.getElementById("end").style.display = "inline";
        }
    }


}

welcomeQuiz();