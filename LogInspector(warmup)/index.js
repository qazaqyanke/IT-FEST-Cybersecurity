const express = require('express');
const app = express();
const port = process.env.PORT || 3000;
const path = require('path')
const bodyParser = require('body-parser')


app.use(bodyParser.json())
app.use(bodyParser.urlencoded())

app.use(bodyParser.urlencoded({extended: true}))

app.post('.admin', (req, res, e) => {
    e.preventDefault();
    console.log(req.body);
})

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'))

app.get('/', (req, res) => {
    res.render('index.ejs');
})

app.get('/admin', (req, res) => {
    res.send("The wrong way, darling, you've lost your way")
})

app.get('/views/admin', (req, res) => {
    res.render('admin.ejs')
})

app.listen(port, () => {
    console.log(`Port listening at ${port} port`);
})