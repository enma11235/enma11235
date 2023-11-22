// server.js

http = require('http');
path = require('path');
fs = require('fs');

server = http.createServer((req, res) => {
    recurso = req.url;
    ruta = path.join ('/var/www/enma.com/html', recurso);
    if (recurso == '/') {
        fs.readFile('index.html', (err, data) => {
            if (err) {
                res.end('error leyendo archivo');
            } else {
                res.end(data);
            }
        })
    } else {
        fs.readFile(ruta, (err, data) => {
            if (err) {
                res.end('error leyendo archivo')
            } else {
                res.end(data);
            }
        })
    }
})
    

PORT = 3000;

server.listen(PORT, () => {
    console.log(`Servidor web en ejecución en http://localhost:${PORT}/`);
});