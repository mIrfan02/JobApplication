document.addEventListener("DOMContentLoaded", function() {
    // Get the alert element
    var alert = document.getElementById('customAlert');
    
    // Set a timeout to hide the alert after 5 seconds
    setTimeout(function() {
        alert.style.display = 'none';
    }, 5000);
});