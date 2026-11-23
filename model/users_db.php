<?php 
// Funcion similar la de get_product de ch05
// Recibe el nombre de usuario, devuelve sus datos o nada si no existe
function get_user($username) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

// Funcion similar a la de add_product de ch05
// Recibe nombre de usuario, email y hash de la contraseña; los inserta como un nuevo usuario en la tabla users
function add_user($username, $email, $password_hash) {
    global $db;
    $query = 'INSERT INTO users
                 (username, email, password_hash)
              VALUES
                 (:username, :email, :password_hash)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password_hash', $password_hash);
    $statement->execute();
    $statement->closeCursor();
}
?>