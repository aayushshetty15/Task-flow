<?php

require_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $taskId = $_POST["taskId"];
    $taskName = trim($_POST["taskName"]);
    $priority = $_POST["priority"];
    $status = $_POST["status"];

    $sql = "UPDATE tasks 
            SET title = ?, priority = ?, status = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssi",
        $taskName,
        $priority,
        $status,
        $taskId
    );

    $stmt->execute();

    header("Location: tasks.php");
    exit;
}


if (isset($_GET["taskId"])) {

    $taskId = $_GET["taskId"];

    $sql = "SELECT * FROM tasks WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $taskId);

    $stmt->execute();

    $result = $stmt->get_result();

    $task = $result->fetch_assoc();
}

?>
<?php include "includes/header.php"; ?>

<h2>Edit Task</h2>

<?php if (isset($task)) { ?>

   <form method="POST">

    <input type="hidden" name="taskId"
           value="<?php echo $task["id"]; ?>">

    <label>Task Name:</label>
    <input type="text" name="taskName"
           value="<?php echo $task["title"]; ?>">

    <br><br>

    <label>Priority:</label>

    <select name="priority">
        <option value="High"
            <?php if ($task["priority"] === "High") echo "selected"; ?>>
            High
        </option>

        <option value="Medium"
            <?php if ($task["priority"] === "Medium") echo "selected"; ?>>
            Medium
        </option>

        <option value="Low"
            <?php if ($task["priority"] === "Low") echo "selected"; ?>>
            Low
        </option>
    </select>

    <br><br>

    <label>Status:</label>

    <select name="status">
        <option value="Pending"
            <?php if ($task["status"] === "Pending") echo "selected"; ?>>
            Pending
        </option>

        <option value="Completed"
            <?php if ($task["status"] === "Completed") echo "selected"; ?>>
            Completed
        </option>
    </select>

    <br><br>

    <button type="submit">Update Task</button>

</form>

<?php } ?>

<?php include "includes/footer.php"; ?>