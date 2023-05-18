
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

  document.addEventListener('DOMContentLoaded', function() {
    // Get the current selected tab index from local storage
    var selectedTab = localStorage.getItem('selectedTab');
  
    // If there is a selected tab index, activate the corresponding tab and its content
    if (selectedTab) {
      var tabLink = document.querySelector(`a.nav-link[href="#v-tabs-${selectedTab}"]`);
      var tabContent = document.querySelector(`#v-tabs-${selectedTab}`);
      if (tabLink && tabContent) {
        tabLink.classList.add('active');
        tabLink.setAttribute('aria-selected', 'true');
        tabContent.classList.add('show', 'active');
      }
    }
  
    // Add event listener to store the selected tab index in local storage when a tab is clicked
    var tabLinks = document.querySelectorAll('a.nav-link');
    tabLinks.forEach(function(tabLink) {
      tabLink.addEventListener('click', function(event) {
        var tabIndex = event.target.getAttribute('href').split('-').pop();
        localStorage.setItem('selectedTab', tabIndex);
      });
    });
  });
  
