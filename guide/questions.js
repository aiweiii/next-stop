var europe = [
    {
        question: "1. Which is the most visited attraction in Europe?",
        correct: 2, //please note: this is the index!
        answers: [
            {option:"Eiffel Tower, France", answer:false},
            {option:"Colosseum, Italy", answer: false },
            {option:"The Louvre, France", answer: true },
            {option:"Stonehenge, England", answer: false }
        ]
    },
    {
        question: "2. How many languages are spoken in Europe?",
        correct: 2,
        answers: [
            { option: "5", answer: false },
            { option: "50", answer: false },
            { option: "200", answer: true },
            { option: "More than 300", answer: false }
        ]
    },
    {
        question: "3. What is 'Cake' in Swedish?",
        correct: 2,
        answers: [
            { option: "Hej", answer: false },
            { option: "Snälla", answer: false },
            { option: "Tårta", answer: true },
            { option: "Båten", answer: false }
        ]
    },
    {
        question: "4. Which is the most visited country in the world?",
        correct: 1,
        answers: [
            { option: "France", answer: true },
            { option: "Spain", answer: false },
            { option: "United States", answer: false },
            { option: "Italy", answer: false }
        ]
    },
    {
        question: "5. Which name is NOT banned in Denmark?",
        correct: 3,
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
        correct: 3,
        answers: [
            { option: "Borobudur - Central Java, Indonesia", answer: false },
            { option: "Spring Temple Buddha - Henan, China", answer: false },
            { option: "Karnak Temple Complex - Luxor, Egypt", answer: false },
            { option: "Angkor Wat - Siem Reap, Cambodia", answer: true }
        ]
    },
    {
        question: "2. How many rooms does The Forbidden City in Beijing, China, contains?",
        correct: 3,
        answers: [
            { option: "20", answer: false },
            { option: "50", answer: false },
            { option: "600", answer: false },
            { option: "9000", answer: true }
        ]
    },
    {
        question: "3. Which country still has a reigning emperor?",
        correct: 1,
        answers: [
            { option: "Thailand", answer: false },
            { option: "Japan", answer: true },
            { option: "United Kingdom", answer: false },
            { option: "None left", answer: false }
        ]
    },
    {
        question: "4. Which kind of park does not exist in South Korea?",
        correct: 0,
        answers: [
            { option: "Elephant-themed park", answer: true },
            { option: "Toilet-themed park", answer: false },
            { option: "Sex-themed park", answer: false },
            { option: "Penis-themed park", answer: false }
        ]
    },
    {
        question: "5. What is the Vietnamese currency?",
        correct: 1,
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
        question: "1. How many states does Australia have?",
        correct: 3,
        answers: [
            { option: "Seven", answer: false },
            { option: "Six", answer: true },
            { option: "Eight", answer: false },
            { option: "Nine", answer: false }
        ]
    },
    {
        question: "2. What year did Australia get their first female prime minister?",
        correct: 3,
        answers: [
            { option: "2007", answer: false },
            { option: "2009", answer: false },
            { option: "2010", answer: true },
            { option: "2012", answer: false }
        ]
    },
    {
        question: "3. What constellation is depicted on the Australian flag?",
        correct: 1,
        answers: [
            { option: "The Southern Cross", answer: true },
            { option: "The Southern Diamond", answer: false },
            { option: "The Southern Stars", answer: false },
            { option: "The Southern Tip", answer: false }
        ]
    },
    {
        question: "4. Who is Australia's Head of State?",
        correct: 0,
        answers: [
            { option: "The Prime Minister", answer: false },
            { option: "The Queen", answer: true },
            { option: "The Governor-General", answer: false },
            { option: "The President", answer: false }
        ]
    },
    {
        question: "5. Which is the largest desert in Australia?",
        correct: 1,
        answers: [
            { option: "The Great Victorian Desert", answer: true },
            { option: "The Great Sandy Desert", answer: false },
            { option: "Simpson Desert", answer: false },
            { option: "Gibson Desert", answer: false }
        ]
    }
]

var america = [
    {
        question: "1. Before September 9, 1776, the United States of America was known as",
        correct: 3,
        answers: [
            { option: "United Colonies of Europe", answer: false },
            { option: "United Colonies of Britain", answer: false },
            { option: "Red Indian land", answer: false },
            { option: "United Colonies of America", answer: true }
        ]
    },
    {
        question: "2. Which is the largest National Park in terms of area in the United States?",
        correct: 3,
        answers: [
            { option: "Glacier Bay", answer: false },
            { option: "Wrangell–St. Elias", answer: true },
            { option: "Yellowstone", answer: false },
            { option: "Canyonlands", answer: false }
        ]
    },
    {
        question: "3. The first successful U.S. satellite launched into earth's orbit was",
        correct: 1,
        answers: [
            { option: "Sputnik", answer: false },
            { option: "Apollo 1", answer: false },
            { option: "Explorer 1", answer: true },
            { option: "GSLV 1", answer: false }
        ]
    },
    {
        question: "4. Towards the South, the United States has it's land border with which of these country?",
        correct: 0,
        answers: [
            { option: "Canada", answer: false },
            { option: "Mexico", answer: false },
            { option: "Cuba", answer: true },
            { option: "Colombia", answer: false }
        ]
    },
    {
        question: "5. Which of these is not a capital city?",
        correct: 1,
        answers: [
            { option: "Juneau", answer: false },
            { option: "Hartford", answer: false },
            { option: "Lansing", answer: false },
            { option: "Detroit", answer: true }
        ]
    }
]

var middleEast = [
    {
        question: "1. Which of the following countries is not a monarchy?",
        correct: 3,
        answers: [
            { option: "Yemen", answer: true },
            { option: "Bahrain", answer: false },
            { option: "Morocco", answer: false },
            { option: "United Arab Emirates", answer: false }
        ]
    },
    {
        question: "2. What is the largest ethnic group in the Middle East?",
        correct: 3,
        answers: [
            { option: "Turks", answer: false },
            { option: "Persians", answer: false },
            { option: "Kurds", answer: false },
            { option: "Arabs", answer: true }
        ]
    },
    {
        question: "3. What is the largest country on the Arabian peninsula?",
        correct: 1,
        answers: [
            { option: "Yemen", answer: false },
            { option: "Kuwait", answer: false },
            { option: "Oman", answer: false },
            { option: "Saudi Arabia", answer: true }
        ]
    },
    {
        question: "4. What country uses qanats to irrigate water underground?",
        correct: 0,
        answers: [
            { option: "Iraq", answer: false },
            { option: "Saudi Arabia", answer: false },
            { option: "Turkey", answer: false },
            { option: "Iran", answer: true }
        ]
    },
    {
        question: "5. What is the Middle East known as?",
        correct: 1,
        answers: [
            { option: "Crossroads of the World", answer: true },
            { option: "Asia-Africa", answer: false },
            { option: "Meeting Place", answer: false },
            { option: "Islam Land", answer: false }
        ]
    }
]

var centralAsia = [
    {
        question: "1. Which is the largest religious monument in the World?",
        correct: 3,
        answers: [
            { option: "Borobudur - Central Java, Indonesia", answer: false },
            { option: "Spring Temple Buddha - Henan, China", answer: false },
            { option: "Karnak Temple Complex - Luxor, Egypt", answer: false },
            { option: "Angkor Wat - Siem Reap, Cambodia", answer: true }
        ]
    },
    {
        question: "2. How many rooms does The Forbidden City in Beijing, China, contains?",
        correct: 3,
        answers: [
            { option: "20", answer: false },
            { option: "50", answer: false },
            { option: "600", answer: false },
            { option: "9000", answer: true }
        ]
    },
    {
        question: "3. Which country still has a reigning emperor?",
        correct: 1,
        answers: [
            { option: "Thailand", answer: false },
            { option: "Japan", answer: true },
            { option: "United Kingdom", answer: false },
            { option: "None left", answer: false }
        ]
    },
    {
        question: "4. Which kind of park does not exist in South Korea?",
        correct: 0,
        answers: [
            { option: "Elephant-themed park", answer: true },
            { option: "Toilet-themed park", answer: false },
            { option: "Sex-themed park", answer: false },
            { option: "Penis-themed park", answer: false }
        ]
    },
    {
        question: "5. What is the Vietnamese currency?",
        correct: 1,
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
        correct: 3,
        answers: [
            { option: "Borobudur - Central Java, Indonesia", answer: false },
            { option: "Spring Temple Buddha - Henan, China", answer: false },
            { option: "Karnak Temple Complex - Luxor, Egypt", answer: false },
            { option: "Angkor Wat - Siem Reap, Cambodia", answer: true }
        ]
    },
    {
        question: "2. How many rooms does The Forbidden City in Beijing, China, contains?",
        correct: 3,
        answers: [
            { option: "20", answer: false },
            { option: "50", answer: false },
            { option: "600", answer: false },
            { option: "9000", answer: true }
        ]
    },
    {
        question: "3. Which country still has a reigning emperor?",
        correct: 1,
        answers: [
            { option: "Thailand", answer: false },
            { option: "Japan", answer: true },
            { option: "United Kingdom", answer: false },
            { option: "None left", answer: false }
        ]
    },
    {
        question: "4. Which kind of park does not exist in South Korea?",
        correct: 0,
        answers: [
            { option: "Elephant-themed park", answer: true },
            { option: "Toilet-themed park", answer: false },
            { option: "Sex-themed park", answer: false },
            { option: "Penis-themed park", answer: false }
        ]
    },
    {
        question: "5. What is the Vietnamese currency?",
        correct: 1,
        answers: [
            { option: "Rupee", answer: false },
            { option: "Dong", answer: true },
            { option: "Peso", answer: false },
            { option: "Lao kip", answer: false }
        ]
    }
]