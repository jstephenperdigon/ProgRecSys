// Get the Resend OTP button
var resendOTPButton = document.getElementById('resend-otp');

// Set the countdown duration in seconds
var countdownDuration = 30;

// Function to start the countdown
function startCountdown() {
  // Disable the Resend OTP button
  resendOTPButton.disabled = true;

  // Check if the countdown value is already stored in localStorage
  var storedCountdown = localStorage.getItem('resendOTPCountdown');

  if (storedCountdown) {
    // Retrieve the countdown value from localStorage
    var countdown = parseInt(storedCountdown, 10);
  } else {
    // Set the initial countdown value
    var countdown = countdownDuration;
  }

  // Update the button text with the initial countdown value
  resendOTPButton.textContent = 'Resend OTP (' + countdown + ')';

  // Decrement the countdown value every second
  var countdownInterval = setInterval(function() {
    countdown--;

    // Update the button text with the updated countdown value
    resendOTPButton.textContent = 'Resend OTP (' + countdown + ')';

    // Check if the countdown has reached 0
    if (countdown <= 0) {
      // Enable the Resend OTP button
      resendOTPButton.disabled = false;
      resendOTPButton.textContent = 'Resend OTP';

      // Clear the countdown interval
      clearInterval(countdownInterval);

      // Remove the countdown value from localStorage
      localStorage.removeItem('resendOTPCountdown');
    } else {
      // Store the countdown value in localStorage
      localStorage.setItem('resendOTPCountdown', countdown);
    }
  }, 1000);
}

// Start the countdown when the page loads
startCountdown();
