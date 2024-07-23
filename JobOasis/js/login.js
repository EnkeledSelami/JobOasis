// Wait for the document to fully load
document.addEventListener('DOMContentLoaded', function() {
    // Get the signup/login prompt element
    var signupLoginPrompt = document.getElementById('signupLoginPrompt');
    
    // Show the signup/login prompt when any of the links are clicked
    var links = document.querySelectorAll('#nav a');
    links.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        signupLoginPrompt.style.display = 'block'; // Show the signup/login prompt
      });
    });
    
    // Hide the signup/login prompt when the close button is clicked
    var closeButton = document.getElementById('closeButton');
    closeButton.addEventListener('click', function() {
      signupLoginPrompt.style.display = 'none'; // Hide the signup/login prompt
    });
  });
  