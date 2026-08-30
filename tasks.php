<?php

require_once "includes/db.php";

$status = "";

if (isset($_GET["status"])) {
    $status = $_GET["status"];
}

$priority = "";

if (isset($_GET["priority"])) {
    $priority = $_GET["priority"];
}

if ($status === "Pending" || $status === "Completed") {

    $sql = "SELECT * FROM tasks WHERE status = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $status);

    $stmt->execute();

    $result = $stmt->get_result();

} elseif (
    $priority === "High" ||
    $priority === "Medium" ||
    $priority === "Low"
) {

    $sql = "SELECT * FROM tasks WHERE priority = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $priority);

    $stmt->execute();

    $result = $stmt->get_result();

} else {

    $sql = "SELECT * FROM tasks";

    $result = $conn->query($sql);
}

?>

<?php include "includes/header.php"; ?>

<main>

    <h2>My Tasks</h2>

    <div class="filters">

        <h3>Status</h3>

        <a href="tasks.php">All Tasks</a>

        <a href="tasks.php?status=Pending">
            Pending
        </a>

        <a href="tasks.php?status=Completed">
            Completed
        </a>

        <h3>Filter by Priority</h3>

        <a href="tasks.php?priority=High">
            High
        </a>

        <a href="tasks.php?priority=Medium">
            Medium
        </a>

        <a href="tasks.php?priority=Low">
            Low
        </a>

    </div>

    <?php while ($task = $result->fetch_assoc()) { ?>

        <div class="task-card">

            <h3>
                <?php echo $task["title"]; ?>
            </h3>

            <p>
                <strong>Priority:</strong>
                <?php echo $task["priority"]; ?>
            </p>

            <p>
                <strong>Status:</strong>
                <?php echo $task["status"]; ?>
            </p>

            <p>
                <strong>Deadline:</strong>
                <?php echo $task["deadline"]; ?>
            </p>


            <!-- EDIT TASK -->

            <form method="GET" action="edit-task.php">

                <input
                    type="hidden"
                    name="taskId"
                    value="<?php echo $task["id"]; ?>"
                >

                <button type="submit" class="edit-btn">
                    Edit Task
                </button>

            </form>


            <!-- COMPLETE TASK -->

            <?php if ($task["status"] === "Pending") { ?>

                <form method="POST" action="complete-tasks.php">

                    <input
                        type="hidden"
                        name="taskId"
                        value="<?php echo $task["id"]; ?>"
                    >

                    <button type="submit" class="complete-btn">
                        Complete Task
                    </button>

                </form>

            <?php } ?>


            <!-- DELETE TASK -->

            <form method="POST" action="delete-task.php">

                <input
                    type="hidden"
                    name="taskId"
                    value="<?php echo $task["id"]; ?>"
                >

                <button type="submit" class="delete-btn">
                    Delete Task
                </button>

            </form>

        </div>

    <?php } ?>

</main>

<?php include "includes/footer.php"; ?>