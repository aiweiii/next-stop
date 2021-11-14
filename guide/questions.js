// creating an array and passing the number, questions, options, and answers
var europe = [
    {
        question: "1. Which is the most visited attraction in Europe?",
        answers: [
            {option:"Eiffel Tower, France", answer:false},
            {option:"Colosseum, Italy", answer: false },
            {option:"The Louvre, France", answer: true },
            {option:"Stonehenge, England", answer: false }
        ]
    },
    {
        question: "2. How many languages are spoken in Europe?",
        answers: [
            { option: "5", answer: false },
            { option: "50", answer: false },
            { option: "200", answer: true },
            { option: "More than 300", answer: false }
        ]
    },
    {
        question: "3. What is 'Cake' in Swedish?",
        answers: [
            { option: "Hej", answer: false },
            { option: "Snälla", answer: false },
            { option: "Tårta", answer: true },
            { option: "Båten", answer: false }
        ]
    },
    {
        question: "4. Which is the most visited country in the world?",
        answers: [
            { option: "France", answer: true },
            { option: "Spain", answer: false },
            { option: "United States", answer: false },
            { option: "Italy", answer: false }
        ]
    },
    {
        question: "5. Which name is NOT banned in Denmark?",
        answers: [
            { option: "Jakobp", answer: false },
            { option: "Monkey", answer: false },
            { option: "Pluto", answer: false },
            { option: "Lars", answer: true }
        ]
    }
]

var asia = [
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

// everything here onwards is not done!! just template only!

var australia = [
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

var america = [
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

var middleEast = [
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

var centralAsia = [
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

var africa = [
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