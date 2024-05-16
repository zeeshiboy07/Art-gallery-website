
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Artwork Submission Form</title>
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
    input[type="file"] {
        width: calc(100% - 20px);
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
    <h2>Artwork Submission Form</h2>
    <form id="artworkForm">
        <div>
            <label for="artworkTitle">Artwork Title:</label>
            <input type="text" id="artworkTitle" name="artworkTitle" placeholder="Enter Artwork Title" required>
            <span id="artworkTitleError" class="error"></span>
        </div>
        <div>
            <label for="artistName">Artist Name:</label>
            <input type="text" id="artistName" name="artistName" placeholder="Enter Artist Name" required>
            <span id="artistNameError" class="error"></span>
        </div>
        <div>
            <label for="artworkDescription">Artwork Description:</label>
            <textarea id="artworkDescription" name="artworkDescription" placeholder="Enter Artwork Description" required></textarea>
            <span id="artworkDescriptionError" class="error"></span>
        </div>
        <div>
            <label for="artworkMedium">Medium:</label>
            <select id="artworkMedium" name="artworkMedium" required>
                <option value="">Select Medium</option>
                <option value="Oil">Oil</option>
                <option value="Acrylic">Acrylic</option>
                <option value="Digital">Digital</option>
                <!-- Add more options here if needed -->
            </select>
            <span id="artworkMediumError" class="error"></span>
        </div>
        <div>
            <label for="artworkDimensions">Dimensions:</label>
            <input type="text" id="artworkDimensions" name="artworkDimensions" placeholder="Enter Artwork Dimensions (Height x Width in inches or cm)" required>
            <span id="artworkDimensionsError" class="error"></span>
        </div>
        <div>
            <label for="artworkPrice">Price:</label>
            <input type="number" id="artworkPrice" name="artworkPrice" placeholder="Enter Artwork Price" required>
            <span id="artworkPriceError" class="error"></span>
        </div>
        <div>
            <label for="artworkImage">Upload Image/File of Artwork:</label>
            <input type="file" id="artworkImage" name="artworkImage" required accept="image/*" style="margin-bottom: 5px;">
            <span id="artworkImageError" class="error"></span>
        </div>
        <div>
            <label for="artistBio">Artist Biography (Optional):</label>
            <textarea id="artistBio" name="artistBio" placeholder="Enter Artist Biography"></textarea>
            <span id="artistBioError" class="error"></span>
        </div>
        <div>
            <label for="contactEmail">Contact Email:</label>
            <input type="email" id="contactEmail" name="contactEmail" placeholder="Enter Your Email" required>
            <span id="contactEmailError" class="error"></span>
        </div>
        <div>
            <button type="button" onclick="submitArtworkForm()">Submit</button>
        </div>
    </form>
    <div id="output"></div>
</div>

<script>
function submitArtworkForm() {
    var inputs = [
        { id: 'artworkTitle', errorId: 'artworkTitleError', errorMsg: 'Please enter artwork title.' },
        { id: 'artistName', errorId: 'artistNameError', errorMsg: 'Please enter artist name.' },
        { id: 'artworkDescription', errorId: 'artworkDescriptionError', errorMsg: 'Please enter artwork description.' },
        { id: 'artworkMedium', errorId: 'artworkMediumError', errorMsg: 'Please select artwork medium.' },
        { id: 'artworkDimensions', errorId: 'artworkDimensionsError', errorMsg: 'Please enter artwork dimensions.' },
        { id: 'artworkPrice', errorId: 'artworkPriceError', errorMsg: 'Please enter a valid artwork price.' },
        { id: 'artworkImage', errorId: 'artworkImageError', errorMsg: 'Please upload artwork image.' },
        { id: 'contactEmail', errorId: 'contactEmailError', errorMsg: 'Please enter a valid contact email address.', validationFn: isValidEmail }
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
        var output = "<h3>Submission Details:</h3>";
        output += "<p><strong>Artwork Title:</strong> " + document.getElementById('artworkTitle').value.trim() + "</p>";
        output += "<p><strong>Artist Name:</strong> " + document.getElementById('artistName').value.trim() + "</p>";
        output += "<p><strong>Artwork Description:</strong> " + document.getElementById('artworkDescription').value.trim() + "</p>";
        output += "<p><strong>Medium:</strong> " + document.getElementById('artworkMedium').value + "</p>";
        output += "<p><strong>Dimensions:</strong> " + document.getElementById('artworkDimensions').value.trim() + "</p>";
        output += "<p><strong>Price:</strong> " + document.getElementById('artworkPrice').value.trim() + "</p>";
        output += "<p><strong>Artwork Image:</strong> " + document.getElementById('artworkImage').value.split('\\').pop() + "</p>";
        var artistBio = document.getElementById('artistBio').value.trim();
        if (artistBio !== '') {
            output += "<p><strong>Artist Biography:</strong> " + artistBio + "</p>";
        }
        output += "<p><strong>Contact Email:</strong> " + document.getElementById('contactEmail').value.trim() + "</p>";
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
