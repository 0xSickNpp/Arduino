var arduino_button = document.getElementById("ard-link");
var python_button = document.getElementById('pyth-link');

arduino_button.onclick = () => {
	window.location = "files/arduino.ino";
}

python_button.onclick = () => {
	window.location = "files/python.py";
}