<?php

require_once "includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $taskName = trim($_POST["taskName"]);
    $priority = $_POST["priority"];
    $deadline = $_POST["deadline"];

    if (empty($taskName)) {

        $message = "Please enter a task name.";

    } elseif (empty($deadline)) {

        $message = "Please select a deadline.";

    } else {

        $userId = 1;
        $status = "Pending";

        $sql = "INSERT INTO tasks 
                (user_id, title, priority, status, deadline)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "issss",
            $userId,
            $taskName,
            $priority,
            $status,
            $deadline
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

<main>

    <h2>Add Task</h2>

    <?php if (!empty($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>

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

        <label>Deadline:</label>
        <input type="date" name="deadline">

        <br><br>

        <button type="submit">Add Task</button>

    </form>

</main>

<?php include "includes/footer.php"; ?>