document.addEventListener('DOMContentLoaded', function() {
    var dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(function(dropdown) {
        var trigger = dropdown.querySelector('a');
        var dropdownContent = dropdown.querySelector('.dropdown-content');

        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            dropdownContent.classList.toggle('show');
        });

        window.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target)) {
                dropdownContent.classList.remove('show');
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var feedbackForm = document.getElementById('feedback-form');

    feedbackForm.addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(feedbackForm);

        fetch('/submit-feedback', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                alert('Feedback submitted successfully!');
                feedbackForm.reset();
            } else {
                alert('Failed to submit feedback. Please try again later.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while submitting feedback.');
        });
    });
});
const fs = require('fs');

// Handle POST request to /submit-feedback
app.post('/submit-feedback', (req, res) => {
    const { name, email, feedback } = req.body;

    // Save feedback data to a file
    const feedbackData = { name, email, feedback };
    const jsonData = JSON.stringify(feedbackData);

    fs.appendFile('feedbackData.json', jsonData + '\n', (err) => {
        if (err) {
            console.error('Error saving feedback data:', err);
            res.sendStatus(500); // Internal Server Error
        } else {
            console.log('Feedback data saved successfully:', feedbackData);
            res.sendStatus(200); // OK
        }
    });
});
