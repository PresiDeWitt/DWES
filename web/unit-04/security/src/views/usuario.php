<?php
// usuario.php - muestra datos del usuario autenticado
if (empty($_SESSION['user'])) {
    echo '<section><h2>No autenticado</h2><p>Accede con tu cuenta para ver esta página.</p></section>';
    return;
}

$pdo = getPdo();
$stmt = $pdo->prepare('SELECT id,name,email,role,phone_encrypted,created_at FROM users WHERE id = :id');
$stmt->execute([':id' => $_SESSION['user']['id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<section>
    <h2>Mi cuenta</h2>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Rol:</strong> <?php echo htmlspecialchars($user['role']); ?></p>
    <p><strong>Creado:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
    <?php if (!empty($user['phone_encrypted'])): ?>
        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars(decryptPhone($user['phone_encrypted'])); ?></p>
    <?php else: ?>
        <p><em>No tienes teléfono registrado.</em></p>
    <?php endif; ?>
    <p><a href="index.php?page=logout">Cerrar sesión</a></p>
</section>

