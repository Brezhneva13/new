<?php
session_start();
include 'db.php'; // Подключаем базу данных

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Получаем всех клиентов
$stmt = $pdo->query("SELECT * FROM clients");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h2>Clients</h2>
        <a href="add-client.php" class="btn btn-primary mb-3">Add Client</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($client['name']); ?></td>
                        <td><?php echo htmlspecialchars($client['email']); ?></td>
                        <td><?php echo htmlspecialchars($client['phone']); ?></td>
                        <td>
                            <a href="edit-client.php?id=<?php echo $client['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete-client.php?id=<?php echo $client['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</body>
</html>
