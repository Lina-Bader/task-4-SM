<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Voice to Text</title>
<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        background-color: #f0f0f0;
    }
    #startButton {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
    }
    #output {
        margin-top: 20px;
        width: 80%;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
</head>
<body>
    <button id="startButton">Start</button>
    <div id="output">Press the "Start" button and start speaking...</div>

    <script>
    document.getElementById('startButton').onclick = function() {
        const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'en-US';
        recognition.start();

        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            document.getElementById('output').innerText = transcript;
            saveToDatabase(transcript);
        };
    };

    function saveToDatabase(transcript) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "save_text.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log("Response from save_text.php: " + xhr.responseText);
                loadTextFromDatabase();
            } else {
                console.error("Failed to send request. Status: " + xhr.status);
            }
        };
        xhr.onerror = function() {
            console.error("Request error...");
        };
        xhr.send("text=" + encodeURIComponent(transcript));
    }

    function loadTextFromDatabase() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "get_text.php", true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById('output').innerHTML += "<br><br>Stored Text:<br>" + xhr.responseText;
            } else {
                console.error("Failed to fetch stored text. Status: " + xhr.status);
            }
        };
        xhr.send();
    }

    // Load stored text when the page loads
    window.onload = loadTextFromDatabase;
</script>

</body>
</html>
