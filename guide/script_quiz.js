const startBtn = document.getElementById("start");
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

// IMPT DETERMINE QUESTIONS BEFORE THAT
let questions = [
    {
        question: "1. Which is the largest religious monument in the World?",
        answers: [
            { option: "Borobudur - Central Java, Indonesia", answer: false },
            { option: "Spring Temple Buddha - Henan, China", answer: false },
            { option: "Karnak Temple Complex - Luxor, Egypt", answer: false },
            { option: "Angkor Wat - Siem Reap, Cambodia", answer: true }
        ]
    },
    {
        question: "2. How many rooms does The Forbidden City in Beijing, China, contains?",
        answers: [
            { option: "20", answer: false },
            { option: "50", answer: false },
            { option: "600", answer: false },
            { option: "9000", answer: true }
        ]
    },
    {
        question: "3. Which country still has a reigning emperor?",
        answers: [
            { option: "Thailand", answer: false },
            { option: "Japan", answer: true },
            { option: "United Kingdom", answer: false },
            { option: "None left", answer: false }
        ]
    },
    {
        question: "4. Which kind of park does not exist in South Korea?",
        answers: [
            { option: "Elephant-themed park", answer: true },
            { option: "Toilet-themed park", answer: false },
            { option: "Sex-themed park", answer: false },
            { option: "Penis-themed park", answer: false }
        ]
    },
    {
        question: "5. What is the Vietnamese currency?",
        answers: [
            { option: "Rupee", answer: false },
            { option: "Dong", answer: true },
            { option: "Peso", answer: false },
            { option: "Lao kip", answer: false }
        ]
    }
]

function welcomeQuiz() {
    startBtn.onclick = () => {
        document.getElementById("restart").style.display = "none";
        document.getElementById("welcome-area").style.display="none";
        document.getElementById("question-area").style.display="inline";
        start();
    }
}

function start() {
    document.getElementById("restart").style.display="inline";

    currentQuestion = 0;
    questionText.innerHTML = questions[currentQuestion].question;
    // document.getElementById("questionImage").src = "hackanm.gif";
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
    optOneBtn.classList.remove('hide');
    optTwoBtn.classList.remove('hide');
    optThreeBtn.classList.remove('hide');
    optFourBtn.classList.remove('hide');
    score = 0;
    userScore.innerHTML = score;
    welcomeQuiz();
}

function next() {
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