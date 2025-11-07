<?php
// Helpers simples para Security

function getUsers()
{
    // Usuarios predefinidos
    return [
        ['id' => 1, 'name' => 'Admin', 'email' => 'admin@example.com', 'password' => 'admin123', 'role' => 'admin'],
        ['id' => 2, 'name' => 'Editor', 'email' => 'editor@example.com', 'password' => 'editor123', 'role' => 'editor'],
        ['id' => 3, 'name' => 'Usuario', 'email' => 'user@example.com', 'password' => 'user123', 'role' => 'usuario'],
    ];
}

function findUser($email)
{
    foreach (getUsers() as $u) {
        if ($u['email'] === $email) return $u;
    }
    return null;
}
