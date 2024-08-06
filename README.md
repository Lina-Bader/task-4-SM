# task-4-SM

Description 
This project provides a basic web interface to convert spoken words to text using the Web Speech API and store the converted text in a MySQL database. It includes scripts to handle database connections, process speech recognition results, and retrieve stored text from the database.
Files
1.	index.php: This is the main web interface that provides a button to start speech recognition and a display area for the recognized text.
2.	save_text.php: This script processes the recognized text and saves it to the database.
3.	get_text.php: This script retrieves the saved text from the database and displays it.
4.	dbh.inc.php: This script establishes a connection to the MySQL database.



Usage
•	Open the index.php file in your web browser.
•	Click the "Start" button to begin speech recognition.
•	Speak into your microphone. The recognized text will be displayed on the page.
•	The recognized text will be automatically saved to the database.
•	The saved text will be loaded and displayed on the page each time it is loaded.
