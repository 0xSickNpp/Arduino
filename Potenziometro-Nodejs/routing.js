const express = require('express');
const url = require('url');
const fs = require('fs');
const path = require('path');
/////////////////////////////////////
var router = express.Router();
var last_value = 80;
const token = "TOKENTEST";
/////////////////////////////////////
router.get("/", (req, res) => {
	fs.readFile("html/index.html", (err, data) => {
		if (err) {
			console.log(err.stack);
			res.status(500).end("500 error. Internal error.");
		}else{
			res.contentType("text/html");
			res.send(data);
		}
	});
});

router.get("/style/:file", (req, res) => {
	fs.readFile("style/"+req.params.file, (err, data) => {
		if (err) {
			console.log(err.stack);
		}else{
			res.contentType("text/css");
			res.send(data);
		}
	});
});

router.get("/imgs/:file", (req, res) => {
	fs.readFile("imgs/"+req.params.file, (err, data) => {
		if (err) {
			console.log(err.stack);
		}else{
			res.contentType("image");
			res.send(data);
		}
	});
});

router.post("/api/add", (req, res) => {
	if (req.body.valore && req.body.token) {
		if(req.body.token == token){
			last_value = req.body.valore;
			res.send("OK\n");
		}else{
			res.status(301).end();
		}
	}else{
		res.status(301).send("No data received");
	}
});

router.all("/api/obt", (req, res) => {
	res.contentType("text/json");
	res.send("{\"valore\" : \"" + last_value + "\"}");
});

router.get("/js/:file", (req, res) => {
	fs.readFile("js/"+req.params.file, (err, data) => {
		if (err) {
			console.log(err.stack);
		}else{
			res.contentType("text/javascript");
			res.send(data);
		}
	});
});

router.get("/files/:file", (req, res) => {
	switch(req.params.file){
		case "arduino.ino": fs.readFile("files/Arduino.ino", (err, data) => {
			if (err) {
				console.log(err.stack);
				res.status(500).send();
			}else{
				res.contentType("document");
				res.send(data);
			}
		});
		break;
		case "python.py": fs.readFile("files/python.py", (err, data) => {
			if (err) {
				console.log(err.stack);
				res.status(500).send();
			}else{
				res.contentType("document");
				res.send(data);
			}
		});
		break; 
	}
});

router.get("/realtime", (req, res) => {
	fs.readFile("html/tempo_reale.html", (err, data) => {
		if (err) {
			console.log(err.stack);
			res.status(500).end("500 error. Internal error.");
		}else{
			res.contentType("text/html");
			res.send(data);
		}
	});
});

router.all("*", (req, res) => {
	res.status(404).end("404 error");
});
/////////////////////////////////////
module.exports = router;