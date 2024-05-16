<?php
session_start();

// Check if form is submitted
if(isset($_POST['submit'])) {
    $userMsg = $_POST['user_msg'];
    
    // Add user message to session
    $_SESSION['chat_history'][] = "You: $userMsg";

    // Reply from bot (You can customize this part)
    $botMsg = "Bot: Hello! You said: $userMsg";

    // Add bot reply to session
    $_SESSION['chat_history'][] = $botMsg;
}

// Check if history button is clicked
if(isset($_POST['show_history'])) {
    // Display chat history and clear session
    if(isset($_SESSION['chat_history']) && !empty($_SESSION['chat_history'])) {
        foreach($_SESSION['chat_history'] as $message) {
            echo "<p>$message</p>";
        }
        // Clear chat history
        unset($_SESSION['chat_history']);
    } else {
        echo "<p>No chat history available.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Chatbox</title>
    <style>
        body {
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
}

#chat-box {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
    max-width: 400px;
    margin: 0 auto;
    border-radius: 5px;
    overflow-y: auto;
    height: 300px;
}

#chat-box p {
    margin: 5px 0;
}

form {
    text-align: center;
}

input[type="text"] {
    width: 40%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
    border: none;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>

<body>
    
    <h1>Simple PHP Chatbox</h1>

    <div id="chat-box">
        <?php
        // Display chat history
        if(isset($_SESSION['chat_history']) && !empty($_SESSION['chat_history'])) {
            foreach($_SESSION['chat_history'] as $message) {
                echo "<p>$message</p>";
            }
        } else {
            echo "<p>No chat history available.</p>";
        }
        ?>
    </div>

    <form method="post">
        <label for="user_msg">Enter your message:</label><br>
        <input type="text" id="user_msg" name="user_msg" required><br><br>
        <button type="submit" name="submit">Send</button>
    </form>

    <form method="post">
        <button type="submit" name="show_history">Show History</button>
    </form>
</body>
</html>
