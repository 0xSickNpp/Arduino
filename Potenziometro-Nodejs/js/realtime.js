var leds_number = document.getElementById('leds-on');
var led0 = document.getElementById('led-0');
var led1 = document.getElementById('led-1');
var led2 = document.getElementById('led-2');
var led3 = document.getElementById('led-3');
var led4 = document.getElementById('led-4');

function getValues(){
	fetch("http://192.168.1.5:8000/api/obt").then(response => {
    	return response.json()
    }).then(data => {
    	let valore = data.valore;
    	lightsOn(valore);
    	console.log(valore);
    }).catch(error => console.log("Error"));
}

function lightsOn(value) {
	if (value > 0 && value <= 280) {
		led0.style.color = "red";
		led1.style.color = "";
		led2.style.color = "";
		led3.style.color = "";
		led4.style.color = "";
		leds_number.innerHTML= 1;
	}else if (value > 280 && value <= 450) {
		led0.style.color = "red";
		led1.style.color = "red";
		led2.style.color = "";
		led3.style.color = "";
		led4.style.color = "";
		leds_number.innerHTML = 2;
	}else if (value > 450 && value <= 640) {
		led0.style.color = "red";
		led1.style.color = "red";
		led2.style.color = "red";
		led3.style.color = "";
		led4.style.color = "";
		leds_number.innerHTML = 3;
	}else if (value > 640 && value <= 890) {
		led0.style.color = "red";
		led1.style.color = "red";
		led2.style.color = "red";
		led3.style.color = "red";
		led4.style.color = "";
		leds_number.innerHTML = 4;
	}else if (value > 890 && value <= 1023) {
		led0.style.color = "red";
		led1.style.color = "red";
		led2.style.color = "red";
		led3.style.color = "red";
		led4.style.color = "red";
		leds_number.innerHTML = 5;
	}else{
		led0.style.color = "";
		led1.style.color = "";
		led2.style.color = "";
		led3.style.color = "";
		led4.style.color = "";
		leds_number.innerHTML= "0 - Potrebbe esseci qualche problema...";
	}
}

setInterval(getValues, 700);
