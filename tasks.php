<?php

require_once "includes/db.php";

$sql = "SELECT * FROM tasks";

$result = $conn->query($sql);

?>

<?php include "includes/header.php"; ?>

<h2>My Tasks</h2>

<?php while ($task = $result->fetch_assoc()) { ?>

    <div>
        <h3><?php echo $task["title"]; ?></h3>

        <p>
            Priority: <?php echo $task["priority"]; ?>
        </p>

        <p>
            Status: <?php echo $task["status"]; ?>
        </p>

        <p>
            Deadline: <?php echo $task["deadline"]; ?>
        </p>
        <form method="GET" action="edit-task.php">
             <input type="hidden" name="taskId"
                    value="<?php echo $task["id"]; ?>">
            <button type="submit">Edit Task</button>
        </form>
            <?php if ($task["status"] === "Pending") { ?>

            <form method="POST" action="complete-tasks.php">
                <input type="hidden" name="taskId" value="<?php echo $task["id"]; ?>">
                <button type="submit">Complete Task</button>
            </form>
            <?php } ?>
            <form method="POST" action="delete-task.php">
                <input type="hidden" name="taskId"
                    value="<?php echo $task["id"]; ?>">
                <button type="submit">Delete Task</button>
            </form>
                <hr>
            </div>

<?php } ?>

<?php include "includes/footer.php"; ?>