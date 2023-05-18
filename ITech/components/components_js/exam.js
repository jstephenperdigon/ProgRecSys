const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

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

  // Select elements
  const timer = document.getElementById('timer');

  // Set initial values
  let time = JSON.parse(localStorage.getItem('quizTime')) || 3600;
  let intervalId;
  updateTimerDisplay(time);
  
  // Start the timer
  intervalId = setInterval(() => {
    time--;
    updateTimerDisplay(time);
    localStorage.setItem('quizTime', JSON.stringify(time));
    if (time === 0) {
      clearInterval(intervalId);
      alert('Time is up!');
      localStorage.removeItem('quizTime');
    }
  }, 1000);
  
  function updateTimerDisplay(time) {
    const hours = Math.floor(time / 3600);
    const minutes = Math.floor((time % 3600) / 60);
    const seconds = time % 60;
    timer.textContent = `${padZeroes(hours)}:${padZeroes(minutes)}:${padZeroes(seconds)}`;
  }
  
  function padZeroes(num) {
    return num.toString().padStart(2, '0');
  }

 /* var radioButtons = document.querySelectorAll("input[type='radio']");

radioButtons.forEach(function(radioButton) {
  radioButton.addEventListener("click", function(event) {
    var clickedRadio = event.target;

    // Uncheck all other radio buttons
    radioButtons.forEach(function(radio) {
      if (radio !== clickedRadio) {
        radio.checked = false;
      }
    });
  });
}); */


