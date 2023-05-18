



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
  
// JavaScript code to fade out the alert after 3 seconds
document.addEventListener('DOMContentLoaded', function() {
  var alertElement = document.querySelector('.alert');
  setTimeout(function() {
    alertElement.classList.remove('show');
    alertElement.classList.add('fade');
  }, 2000);
});

function deleteRecord(id) {
  if (confirm("Are you sure you want to delete this record?")) {
      // Send an AJAX request to delete the record
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
              if (xhr.status === 200) {
                  // Check the response and display a success message
                  if (xhr.responseText.trim() === "success") {
                      alert("Record deleted successfully.");
                      // Refresh the page to update the table
                      location.reload();
                  } else {
                      alert("Failed to delete the record.");
                  }
              } else {
                  // Display an error message if the request fails
                  alert("Error: " + xhr.status);
              }
          }
      };
      // Send the ID as a parameter to the PHP script
      xhr.send("delete_id=" + encodeURIComponent(id));
  }
}

function showEditModal(element) {
  var id = element.getAttribute("data-id");
  var question = element.getAttribute("data-question");
  var answer = element.getAttribute("data-answer");
  var option1 = element.getAttribute("data-option1");
  var option2 = element.getAttribute("data-option2");
  var option3 = element.getAttribute("data-option3");
  var option4 = element.getAttribute("data-option4");

  document.getElementById("editId").value = id;
  document.getElementById("editQuestion").value = question;
  document.getElementById("editAnswer").value = answer;
  document.getElementById("editOption1").value = option1;
  document.getElementById("editOption2").value = option2;
  document.getElementById("editOption3").value = option3;
  document.getElementById("editOption4").value = option4;

  var editModal = new bootstrap.Modal(document.getElementById("editModal"));
  editModal.show();
}
