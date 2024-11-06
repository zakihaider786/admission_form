// Add form validation or other JS functionality as needed
document.querySelector('#admissionLink').addEventListener('click', function() {
    // Show loading spinner for 3 seconds
    document.querySelector('#loader').style.display = 'block';

    // Wait for 3 seconds before showing the form
    setTimeout(function() {
        document.querySelector('#loader').style.display = 'none'; // Hide loader
        document.querySelector('#admission').style.display = 'block'; // Show the admission form
    }, 3000); // 3 seconds delay
});

// Add form submission handling (this remains the same as before)
document.querySelector('#admissionForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Show the loading spinner
    document.querySelector('#loader').style.display = 'block';
    
    // Simulate a delay (e.g., for server processing)
    setTimeout(function() {
        // Hide the loading spinner after form submission
        document.querySelector('#loader').style.display = 'none';

        // Show a success message or redirect
        alert("Application Submitted Successfully!");
        
        // Optionally, reset the form
        document.querySelector('#admissionForm').reset();
    }, 2000); // Simulate 2 seconds delay
});
