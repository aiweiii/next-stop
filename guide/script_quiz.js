
const restartBtn = document.getElementById("restart");
const nextBtn = document.getElementById("next");
const optOneBtn = document.getElementById("option1");
const optTwoBtn = document.getElementById("option2");
const optThreeBtn = document.getElementById("option3");
const optFourBtn = document.getElementById("option4");
const userScore = document.getElementById("user-score");
const questionText = document.getElementById("question-text");

let currentQuestion = 0;
var score = 0;

restartBtn.addEventListener('click',restart)
nextBtn.addEventListener('click',next)

// IMPT DETERMINE QUESTIONS BEFORE THAT
let questions = [
    {
        question: "Which is the most visited attraction in Europe?",
        answers: [
            { option: "Eiffel Tower, France", answer: false },
            { option: "Colosseum, Italy", answer: false },
            { option: "The Louvre, France", answer: true },
            { option: "Stonehenge, England", answer: false }
        ]
    },
    {
        question: "How many languages are spoken in Europe?",
        answers: [
            { option: "5", answer: false },
            { option: "50", answer: false },
            { option: "200", answer: true },
            { option: "More than 300", answer: false }
        ]
    },
    {
        question: "3rd question?",
        answers: [
            { option: "5", answer: false },
            { option: "10", answer: false },
            { option: "200", answer: true },
            { option: "More than 300", answer: false }
        ]
    },
    {
        question: "4th question",
        answers: [
            { option: "5", answer: false },
            { option: "30", answer: false },
            { option: "200", answer: true },
            { option: "More than 300", answer: false }
        ]
    },
    {
        question: "5th question",
        answers: [
            { option: "5", answer: false },
            { option: "last", answer: false },
            { option: "200", answer: true },
            { option: "More than 300", answer: false }
        ]
    }
]

function quizWelcome() {

}

function beginQuiz() {
    currentQuestion = 0;
    questionText.innerHTML = questions[currentQuestion].question;
    optOneBtn.innerHTML = questions[currentQuestion].answers[0].option;
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
    beginQuiz();
}

function next() {
    currentQuestion++;
    if (currentQuestion>=4) {
        // hide the NEXT button?
        nextBtn.classList.add('hide');
    }

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


beginQuiz();