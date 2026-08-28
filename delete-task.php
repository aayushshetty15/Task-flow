<?php

require_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $taskId = $_POST["taskId"];

    $sql = "DELETE FROM tasks WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $taskId);

    $stmt->execute();
}

header("Location: tasks.php");
exit;
?>