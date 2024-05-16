<?php
session_start();

// Verificar si se proporciona un ID de producto válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = $_GET['id'];

    // Agregar el ID del producto al carrito de compras del usuario
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    $_SESSION['carrito'][] = $productId;

    // Devolver una respuesta HTTP 200 (OK) si todo está bien
    http_response_code(200);
} else {
    // Si no se proporciona un ID de producto válido, devolver un error
    http_response_code(400);
}

?>
