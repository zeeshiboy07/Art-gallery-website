<?php
session_start();
include("connect.php");
?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        margin-top: 0;
        color: #333;
        text-align: center;
    }
    form div {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    input[type="text"],
    input[type="email"],
    textarea,
    select {
        width: calc(100% - 22px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-top: 5px;
    }
    .error {
        color: red;
        font-size: 14px;
    }
    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
        width: 100%;
    }
    button:hover {
        background-color: #0056b3;
    }
    #output {
        margin-top: 20px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
    }
    #output h3 {
        margin-top: 0;
        color: #333;
    }
    #output p {
        margin: 5px 0;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Feedback Form</h2>
    <form id="feedbackForm">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
            <span id="nameError" class="error"></span>
        </div>
        <div>
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
            <span id="emailError" class="error"></span>
        </div>
        <div>
            <label for="feedbackType">Feedback Type:</label>
            <select id="feedbackType" name="feedbackType" required>
                <option value="">Select Feedback Type</option>
                <option value="General">General Feedback</option>
                <option value="Bug">Bug Report</option>
                <option value="Feature">Feature Request</option>
                <option value="Other">Other</option>
            </select>
            <span id="feedbackTypeError" class="error"></span>
        </div>
        <div>
            <label for="message">Feedback Message:</label>
            <textarea id="message" name="message" placeholder="Enter Your Feedback" required></textarea>
            <span id="messageError" class="error"></span>
        </div>
        <div>
            <label for="rating">Rating (out of 10):</label>
            <input type="number" id="rating" name="rating" placeholder="Enter Your Rating (Optional)" min="1" max="10">
            <span id="ratingError" class="error"></span>
        </div>
        <div>
            <button type="button" onclick="submitFeedbackForm()">Submit</button>
        </div>
    </form>
    <div id="output"></div>
</div>

<script>
function submitFeedbackForm() {
    var inputs = [
        { id: 'name', errorId: 'nameError', errorMsg: 'Please enter your name.' },
        { id: 'email', errorId: 'emailError', errorMsg: 'Please enter a valid email address.', validationFn: isValidEmail },
        { id: 'feedbackType', errorId: 'feedbackTypeError', errorMsg: 'Please select feedback type.' },
        { id: 'message', errorId: 'messageError', errorMsg: 'Please enter your feedback message.' },
    ];

    var isValid = true;
    inputs.forEach(function(input) {
        var inputValue = document.getElementById(input.id).value.trim();
        var errorSpan = document.getElementById(input.errorId);
        if (!inputValue) {
            isValid = false;
            errorSpan.textContent = input.errorMsg;
        } else if (input.validationFn && !input.validationFn(inputValue)) {
            isValid = false;
            errorSpan.textContent = input.errorMsg;
        } else {
            errorSpan.textContent = '';
        }
    });

    if (isValid) {
        var feedbackType = document.getElementById('feedbackType').value;
        var rating = document.getElementById('rating').value || 'Not Provided';

        var output = "<h3>Feedback Received!</h3>";
        output += "<p><strong>Name:</strong> " + document.getElementById('name').value.trim() + "</p>";
        output += "<p><strong>Email:</strong> " + document.getElementById('email').value.trim() + "</p>";
        output += "<p><strong>Feedback Type:</strong> " + feedbackType + "</p>";
        output += "<p><strong>Feedback Message:</strong> " + document.getElementById('message').value.trim() + "</p>";
        output += "<p><strong>Rating:</strong> " + rating + "</p>";
        document.getElementById('output').innerHTML = output;
    }
}

function isValidEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
</script>

</body>
</html>