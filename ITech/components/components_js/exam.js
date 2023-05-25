const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    submitForm();
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

function submitForm() {
  // Get the selected radio inputs
  const selectedInputs = document.querySelectorAll(
    ".form-step-active input[type='radio']:checked"
  );

  // Prepare the data to be sent to the server
  const data = {
    answers: [],
  };

  selectedInputs.forEach(function (input) {
    const answer = {
      questionId: input.id, // Assuming the radio button's ID represents the question ID
      ChoiceID: input.value,
      optionName: input.dataset.value,
    };

    data.answers.push(answer);
  });

  // Create a new XMLHttpRequest object
  const xhr = new XMLHttpRequest();

  // Define the request method, URL, and asynchronous flag
  xhr.open("POST", "./query/ControllerExamination.php", true);

  // Set the request header
  xhr.setRequestHeader("Content-Type", "application/json");

  // Define the callback function for handling the response
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Request was successful, handle the response
        // ...
      } else {
        // Request encountered an error, handle the error
        // ...
      }
    }
  };

  // Convert the data to JSON and send the request
  xhr.send(JSON.stringify(data));
}

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}

const timer = document.getElementById("timer");
let time = JSON.parse(localStorage.getItem("quizTime")) || 3600;
let intervalId;
updateTimerDisplay(time);

intervalId = setInterval(() => {
  time--;
  updateTimerDisplay(time);
  localStorage.setItem("quizTime", JSON.stringify(time));
  if (time === 0) {
    clearInterval(intervalId);
    alert("Time is up!");
    localStorage.removeItem("quizTime");
  }
}, 1000);

function updateTimerDisplay(time) {
  const hours = Math.floor(time / 3600);
  const minutes = Math.floor((time % 3600) / 60);
  const seconds = time % 60;
  timer.textContent = `${padZeroes(hours)}:${padZeroes(
    minutes
  )}:${padZeroes(seconds)}`;
}

function padZeroes(num) {
  return num.toString().padStart(2, "0");
}

var radioButtons = document.querySelectorAll("input[type='radio']");

radioButtons.forEach(function (radioButton) {
  radioButton.addEventListener("click", function (event) {
    var clickedRadio = event.target;

    // Uncheck all other radio buttons in the same group
    var radioGroup = document.getElementsByName(clickedRadio.name);
    radioGroup.forEach(function (radio) {
      if (radio !== clickedRadio) {
        radio.checked = false;
      }
    });
  });
});

// Disable previous button on the first question
if (prevBtns.classList.contains("disabled")) {
  prevBtns.addEventListener("click", function (event) {
    event.preventDefault();
  });
}

// Enable/disable previous button based on the current question
nextBtns.forEach(function (button, index) {
  button.addEventListener("click", function () {
    prevBtns.classList.remove("disabled");
    if (index === 0) {
      prevBtns.classList.add("disabled");
    }
  });
});
