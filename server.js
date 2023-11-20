// server.js

const http = require('http');
const path = require('path');
const fs = require('fs');
const { handleForm } = require('/var/www/enma.com/html/greetHandler'); // Asegúrate de que la ruta sea correcta

const server = http.createServer((req, res) => {
    res.end('¡Hola, mundo!');
});

const PORT = 3000;

server.listen(PORT, () => {
    console.log(`Servidor web en ejecución en http://localhost:${PORT}/`);
});