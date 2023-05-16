
/* Add question form submission handling --> */

var addQuestionForm = document.getElementById("add-question-form");

addQuestionForm.addEventListener('submit', function(event) {
  event.preventDefault();

  // Get form values
  var questionText = document.getElementById("question-text").value;
  var answerA = document.getElementById("answer-a").value;
  var answerB = document.getElementById("answer-b").value;
  var answerC = document.getElementById("answer-c").value;
  var answerD = document.getElementById("answer-d").value;
  var correctAnswer = document.getElementById("correct-answer").value;

  // Send form data to server
  fetch('/add-question', {
    method: 'POST',
    body: JSON.stringify({
      questionText: questionText,
      answers: [answerA, answerB, answerC, answerD],
      correctAnswer: correctAnswer
    }),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => {
    // Handle server response
    if (response.ok) {
      alert("Question added successfully!");
    } else {
      alert("Error adding question.");
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
});



/* Back Prevent */
if (window.history && window.history.pushState) {
    window.history.pushState('forward', null, './');
    $(window).on('popstate', function() {
      window.history.pushState('forward', null, './');
    });
  }