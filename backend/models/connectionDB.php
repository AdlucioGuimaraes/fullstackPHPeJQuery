<?php 
$mysqli = new mysqli ("localhost", "root", "root", "servidor");

if(mysqli_connect_errno()){
    echo 'Erro de conexão: '.$mysqli->error;
    exit(0);
}
try {
$sqlQueries = [
    "CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        nome VARCHAR(50),
        email VARCHAR(30),
        senha VARCHAR(80),
        tipo INT,
        adicional1 VARCHAR(30),
        adicional2 VARCHAR(30),
        adicional3 VARCHAR(30),
        adicional4 VARCHAR(30),
        adicional5 VARCHAR(30),
        biometria INT,
        created_at TIMESTAMP
    )",

    "CREATE TABLE IF NOT EXISTS cards (
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        usuario_id INT,
        acesso_unico INT,
        codigo_qr VARCHAR(150),
        status VARCHAR(30),
        created_at TIMESTAMP,
        FOREIGN KEY (usuario_id) REFERENCES users (id)
    )",

    "CREATE TABLE IF NOT EXISTS registers (
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        card_id INT,
        usuario_id INT,
        data_entrada VARCHAR(20),
        adicional1 VARCHAR(30),
        adicional2 VARCHAR(30),
        adicional3 VARCHAR(30),
        created_at VARCHAR(20),
        FOREIGN KEY (card_id) REFERENCES cards(id),
        FOREIGN KEY (usuario_id) REFERENCES users(id)
    )"
];

foreach ($sqlQueries as $query) {
    $mysqli->query($query);
    // Pode adicionar lógica para lidar com o sucesso ou erro
}

echo "Tabelas criadas com sucesso!";
} catch (PDOException $e) {
echo "Erro ao criar tabelas: " . $e->getMessage();
}

?>