<?php

require_once "includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $taskName = trim($_POST["taskName"]);
    $priority = $_POST["priority"];

    if (empty($taskName)) {
        $message = "Please enter a task name.";
    } else {

        $userId = 1;
        $status = "Pending";

        $sql = "INSERT INTO tasks (user_id, title, priority, status)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "isss",
            $userId,
            $taskName,
            $priority,
            $status
        );

        if ($stmt->execute()) {
            $message = "Task added successfully!";
        } else {
            $message = "Something went wrong.";
        }
    }
}
?>

<?php include "includes/header.php"; ?>

<h2>Add Task</h2>

<p><?php echo $message; ?></p>

<form method="POST">

    <label>Task Name:</label>
    <input type="text" name="taskName">

    <br><br>

    <label>Priority:</label>

    <select name="priority">
        <option value="High">High</option>
        <option value="Medium">Medium</option>
        <option value="Low">Low</option>
    </select>

    <br><br>

    <button type="submit">ADD TASK</button>

</form>

<?php include "includes/footer.php"; ?>
