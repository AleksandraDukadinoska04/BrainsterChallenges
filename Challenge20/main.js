document.addEventListener('DOMContentLoaded', () => {
   
    const loadingDiv = document.querySelector('#loadingDiv');
    const welcomePage = document.querySelector('#welcomePage');
    const start = document.querySelector('#start');
    const quizDiv = document.querySelector('#quiz');
    const startOver = document.querySelector('#startOver');
    const questionElement = document.querySelector('#question');
    const answersElement = document.querySelector('#answers');
    const category = document.querySelector('#category');
    const completed = document.querySelector('#completed');
    const result = document.querySelector('#result');
    const scoreMsg = document.querySelector('#scoreMsg');
    const scoreElement = document.querySelector('#score');
    const restart = document.querySelector('#restart');


    // location.hash = "#welcomePage";
    let questionID = 0;
    let score = 0;
    let questions = [];

    function showLoading() {
        loadingDiv.style.display = 'flex';
        welcomePage.style.display = 'none';
        quizDiv.style.display = 'none';
        result.style.display = 'none';
    }

    function showWelcomePage() {
        welcomePage.style.display = 'block';
        welcomePage.classList.add('animate__animated');
        welcomePage.classList.add('animate__fadeIn');
        loadingDiv.style.display = 'none';
        quizDiv.style.display = 'none';
        result.style.display = 'none';
    }

    function showQuiz() {
        quizDiv.style.display = 'block';
        quizDiv.classList.add('animate__animated');
        quizDiv.classList.add('animate__fadeIn');
        loadingDiv.style.display = 'none';
        welcomePage.style.display = 'none';
        result.style.display = 'none';

    }

    function showResult() {
        result.style.display = 'block';
        result.classList.add('animate__animated');
        result.classList.add('animate__fadeIn');
        loadingDiv.style.display = 'none';
        welcomePage.style.display = 'none';
        quizDiv.style.display = 'none';
        window.location.hash = '#result';
        scoreElement.textContent = score + '/20';
        if(score === 20){
            restart.classList.add('btn-success') ;
            restart.textContent = 'Start Over';
            scoreMsg.textContent = 'Congratulations!'
            scoreMsg.classList.add('text-success');
        } else  {
            restart.classList.add('btn-danger');
            restart.textContent = 'Try Again';
            scoreMsg.textContent = 'Try better next time!'
            scoreMsg.classList.add('text-danger');
        }
    }

    async function fetchQuestions() {
        const fetchQ = await fetch('https://opentdb.com/api.php?amount=20');
        const data = await fetchQ.json();
        localStorage.setItem('quizQuestions', JSON.stringify(data.results));
        localStorage.setItem('questionID', questionID);
        localStorage.setItem('score', score);
        showWelcomePage();
    }

    function startQuiz() {
        questionID = 0;
        score = 0;
        localStorage.setItem('questionID', questionID);
        localStorage.setItem('score', score);
        showQuiz();
        showQuestion();
    }

    function showQuestion() {
        questions = JSON.parse(localStorage.getItem('quizQuestions'));
        if (questionID < questions.length) {
            const question = questions[questionID];
            questionElement.textContent = question.question;
            answersElement.innerHTML = '';

            const answers = [...question.incorrect_answers];
            answers.splice(Math.floor(Math.random() * (answers.length + 1)), 0, question.correct_answer);
            console.log(question.correct_answer);

            answers.forEach(answer => {
                const button = document.createElement('button');
                button.className = 'animate__animated animate__fadeIn btn btn-outline-dark mb-2';
                button.textContent = answer;
                button.addEventListener('click', () => selectAnswer(answer));
                answersElement.appendChild(button);
            });
            console.log(question.correct_answer);
            category.textContent = question.category;
            if(questionID !== 0){
            completed.textContent = `Completed: ${questionID}/20`;
            }
            window.location.hash = `question-${questionID + 1}`;

        } else {
            showResult();
        }
    }

    function selectAnswer(answer) {
        const question = questions[questionID];
        if (answer === question.correct_answer) {
            score++;
        }
        questionID++;
        localStorage.setItem('questionID', questionID);
        localStorage.setItem('score', score);
        showQuestion();
    }

    window.addEventListener('hashchange', () => {
        const hash = window.location.hash;
        if(hash === ''){
            showLoading();
            showWelcomePage();
        } else if (hash.startsWith('#question-')){
            const index = parseInt(hash.split('-')[1]) - 1;
            if (!isNaN(index) && index >= 0 && index < questions.length) {
                questionID = index;
                localStorage.setItem('questionID', questionID);
                showQuestion();
            }
        } else if(hash === '#result'){
            showResult();
        }

       
    });

    start.addEventListener('click', startQuiz);
    restart.addEventListener('click', () => {
        window.location.hash = '';
        localStorage.clear();
        location.reload();

    });

    startOver.addEventListener("click" , function(){
        window.location.hash = '';
        localStorage.clear();
        location.reload();

    })

    if(localStorage.getItem('quizQuestions')){
        questions = JSON.parse(localStorage.getItem('quizQuestions'));
        questionID = parseInt(localStorage.getItem('questionID'));
        score = parseInt(localStorage.getItem('score'));
        if(questionID === 0){
            showLoading();
            showWelcomePage();
        } else {
            showQuiz();
            showQuestion();
        }

    } else {
        showLoading();
        fetchQuestions();
    }


});
