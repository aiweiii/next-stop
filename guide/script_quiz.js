const startBtn = document.getElementById("start");
const nextBtn = document.getElementById("next");
const restartBtn = document.getElementById("restart");
const optOneBtn = document.getElementById("option1");
const optTwoBtn = document.getElementById("option2");
const optThreeBtn = document.getElementById("option3");
const optFourBtn = document.getElementById("option4");
const userScore = document.getElementById("user-score");
const questionText = document.getElementById("question-text");

let currentQuestion = 0;
var score = 0;

startBtn.addEventListener('click', start)
restartBtn.addEventListener('click',restart)
nextBtn.addEventListener('click', next)

// IMPT DETERMINE QUESTIONS BEFORE THAT

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
    const regionChosen = document.getElementById("region").innerText;
    var questions = getQuestions(regionChosen);

    currentQuestion = 0;
    questionText.innerHTML = questions[currentQuestion].question;
    // document.getElementById("questionImage").src = "hackanm.gif";
    let correct_option =


    optOneBtn.innerText = questions[currentQuestion].answers[0].option;
    optOneBtn.onclick = () => {
        // if this option is true
        if (questions[currentQuestion].answers[0].answer) {
            // and if score is less than 5!
            if (score<5) {
                score++;
            }
        }
        userScore.innerHTML = score;
        if (currentQuestion<4) {
            next()
        }
    }
    optTwoBtn.innerHTML = questions[currentQuestion].answers[1].option;
    optTwoBtn.onclick = () => {
        if (questions[currentQuestion].answers[1].answer) {
            if (score < 5) {
                score++;
            }
        }
        userScore.innerHTML = score;
        if (currentQuestion < 4) {
            next()
        }
    }
    optThreeBtn.innerHTML = questions[currentQuestion].answers[2].option;
    optThreeBtn.onclick = () => {
        if (questions[currentQuestion].answers[2].answer) {
            if (score < 5) {
                score++;
            }
        }
        userScore.innerHTML = score;
        if (currentQuestion < 4) {
            next()
        }
    }
    optFourBtn.innerHTML = questions[currentQuestion].answers[3].option;
    optFourBtn.onclick = () => {
        if (questions[currentQuestion].answers[3].answer) {
            if (score < 5) {
                score++;
            }
        }
        userScore.innerHTML = score;
        if (currentQuestion < 4) {
            next()
        }
    }
}

function restart() {
    currentQuestion = 0;
    nextBtn.classList.remove('hide');
    optOneBtn.classList.remove('hide');
    optTwoBtn.classList.remove('hide');
    optThreeBtn.classList.remove('hide');
    optFourBtn.classList.remove('hide');
    score = 0;
    userScore.innerHTML = score;
    welcomeQuiz();
}

function next() {
    const regionChosen = document.getElementById("region").innerText;
    var questions = getQuestions(regionChosen);

    currentQuestion++;

    questionText.innerHTML = questions[currentQuestion].question;
    optOneBtn.innerHTML = questions[currentQuestion].answers[0].option;
    optOneBtn.onclick = () => {
        if (questions[currentQuestion].answers[0].answer) {
            if (score<5) {
                score++;
            }
        }
        userScore.innerHTML = score;
        if (currentQuestion<4) {
            next();
        }else{
            document.getElementById("question-area").style.display = "none";
            document.getElementById("submit-area").style.display = "inline";
        }
    }
    optTwoBtn.innerHTML = questions[currentQuestion].answers[1].option;
    optTwoBtn.onclick = () => {
        if (questions[currentQuestion].answers[1].answer) {
            if (score < 5) {
                score++;
            }
        }
        userScore.innerHTML = score;
        if (currentQuestion < 4) {
            next()
        } else {
            document.getElementById("question-area").style.display = "none";
            document.getElementById("submit-area").style.display = "inline";
        }
    }
    optThreeBtn.innerHTML = questions[currentQuestion].answers[2].option;
    optThreeBtn.onclick = () => {
        if (questions[currentQuestion].answers[2].answer) {
            if (score < 5) {
                score++;
            }
        }
        userScore.innerHTML = score;
        if (currentQuestion < 4) {
            next()
        } else {
            document.getElementById("question-area").style.display = "none";
            document.getElementById("submit-area").style.display = "inline";
        }
    }
    optFourBtn.innerHTML = questions[currentQuestion].answers[3].option;
    optFourBtn.onclick = () => {
        if (questions[currentQuestion].answers[3].answer) {
            if (score < 5) {
                score++;
            }
        }
        userScore.innerHTML = score;
        if (currentQuestion < 4) {
            next()
        } else {
            document.getElementById("question-area").style.display = "none";
            document.getElementById("submit-area").style.display = "inline";
        }
    }
}

welcomeQuiz();