const express = require('express');
const bodyParser = require('body-parser');
var router = require('./routing');
///////////////////////////////////////////
var app = express();
///////////////////////////////////////////
app.use(bodyParser.urlencoded({extended : true}));
app.use(bodyParser.json());
app.disable("x-powered-by");
///////////////////////////////////////////
app.use("/", router);
app.use("/api/add", router);
app.use("/api/obt", router);
app.use("/imgs/:img", router);
app.use("/style/:file", router);
app.use("*", router);
///////////////////////////////////////////
app.listen(8000, "0.0.0.0");