<style>
    body {
        background-color: #282828;
        font-family: Verdana, Arial, sans-serif;
        color: #c7c7c7;
        font-weight: bold;
    }

    .container {
        width: 60%;
        margin: 0 auto;
        padding: 2rem;
    }

    .logo {
        text-align: center;
        margin-bottom: 2rem;
    }

    .question {
        margin-bottom: 1rem;
    }

    .submit-btn {
        background-color: #4D2F5D;
        color: #FFFFFF;
        border: none;
        padding: 0.5rem 2rem;
        cursor: pointer;
        font-size: 1rem;
        margin-left: 8px;
        border-radius: 20px;
    }
    
    .input-wrapper {
        display: flex;
        align-items: center;
    }
    
    .question {
        display: flex;
        flex-direction: column;
    }

    input[type="text"], textarea {
        border-radius: 10px;
        background-color: #3c3c3c;
        font-size: 14px !important;
        color: #c7c7c7;
    }

    .submit-btn:hover {
        background-color: #6A407C;
    }

    /* Add new styles for MyBB forum thread-style box */
    .thread-style-box {
        background-color: #333;
        border: 1px solid rgb(59, 59, 59);
        border-radius: 5px;
        padding: 1rem;
    }

    .thread-header {
        background-color: #111;
        color: #c7c7c7;
        padding: 0.5rem;
        font-size: 1.2rem;
        border-radius: 3px;
        margin-bottom: 1rem;
    }

    .thread-content {
        padding: 1rem;
        background-color: #282828;
        border-radius: 3px;
    }
</style>

<div class="container">
    <div class="logo">
        <img src="https://hackforums.net/images/logo/Logo.Cyam.png" alt="Logo">
    </div>

    <div class="thread-style-box">
        <div class="thread-header">
            Capture The Flag!
        </div>
        <div class="thread-content">
            <div id="questions">
                <div class="question">
                    <label for="q1">Flag 1: Hidden in plain "site"</label>
                    <div class="input-wrapper">
                        <input type="text" id="q1">
                        <button class="submit-btn" onclick="submitAnswer(1, this)">Submit</button>
                        <button class="submit-btn" onclick="openInfoLink(1)">Information</button>
                    </div>
                </div>
                <div class="question">            
                    <label for="q2">Flag 2: Down the rabbit hole</label>
                    <div class="input-wrapper">
                        <input type="text" id="q2">
                        <button class="submit-btn" onclick="submitAnswer(2, this)">Submit</button>
                        <button class="submit-btn" onclick="openInfoLink(2)">Information</button>
                    </div>
                </div>
                <div class="question">            
                    <label for="q3">Flag 3: Hashing can be hard</label>
                    <div class="input-wrapper">
                        <input type="text" id="q3">
                        <button class="submit-btn" onclick="submitAnswer(3, this)">Submit</button>
                        <button class="submit-btn" onclick="openInfoLink(3)">Information</button>
                    </div>
                </div>        
                <!-- Add more questions in the same format -->
            </div>
            <button class="submit-btn" onclick="submitForm()">Finalize</button>
        </div>
    </div>
</div>

<script>
let answeredQuestions = [];

function submitAnswer(questionNumber, button) {
    const input = document.getElementById(`q${questionNumber}`);
    let correctAnswer;
    let message;

    if (questionNumber === 1) {
        correctAnswer = "hackforums";
    } else if (questionNumber === 2) {
        correctAnswer = "Omniscient";
    } else if (questionNumber === 3) {
        correctAnswer = "Mr. Robot";
    }

    if (input.disabled) {
        message = "You have already correctly answered this question.";
    } else if (input.value.toLowerCase() === correctAnswer.toLowerCase()) {
        message = "Correct!";
        input.disabled = true;
        button.style.backgroundColor = "green";
        answeredQuestions.push(questionNumber);
    } else {
        message = "Incorrect. Please try again.";
    }

    alert(message);
}

function answeredQuestionsToString() {
    return answeredQuestions.join(", ");
}

function submitForm() {
    if (answeredQuestions.length > 0) {
        const uid = prompt("Enter your UID:");
        if (uid) {
            const answered = encodeURIComponent(answeredQuestionsToString());
            window.location.href = `https://hackforums.net/private.php?action=send&uid=${uid}&subject=Completed+Questions&message=Questions+answers:+${answered}`;
        } else {
            alert("Please enter a valid UID.");
        }
    } else {
        alert("Please answer at least one question before submitting.");
    }
}

function openInfoLink(questionNumber) {
    let infoLink;

    if (questionNumber === 1) {
        infoLink = "https://example.com/info1";
    } else if (questionNumber === 2) {
        infoLink = "https://example.com/info2";
    } else if (questionNumber === 3) {
        infoLink = "https://example.com/info3";
    }

    if (infoLink) {
        window.open(infoLink, "_blank");
    }
}
</script>
