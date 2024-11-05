const express = require('express');
const path = require('path');
const app = express();
const port = 3000;

// Middleware para servir arquivos estáticos (como HTML)
app.use(express.static('public'));

// Rota para a página dinâmica
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index.html')); 
});

app.get('/topico/:nome', (req,res) => {
    const nomeDoTopico = req.params.nome;
    res.json({nome: nomeDoTopico});


})

// Inicia o servidor
app.listen(port, () => {
    console.log(`Servidor rodando em http://localhost:${port}`);
});
