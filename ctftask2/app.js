const express = require('express')
const app = express();
const port = process.env.PORT || 3000;
const path = require('path')

app.use(express.urlencoded({extended: true}))

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'))

app.get('/', (req, res) => {
    res.render('index')
})

app.get('/91:11',  async (req, res) => {
    const baseUrl = await 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/'
    res.render('first', {baseUrl})
})  

app.get('/91:11/vivillon', (req, res) => {
    res.render('vivillon')
})


app.listen(port, () => {
    console.log(`App listening port ${port}`);
})