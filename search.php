<?php 

require_once "includes/db.php";

$message = "";
$result = null;

if (isset($_GET["search"])) {

    $search = trim($_GET["search"]);

    if (empty($search)) {

        $message = "Please enter something to search.";

    } else {

        $sql = "SELECT * FROM tasks WHERE title LIKE ?";

        $stmt = $conn->prepare($sql);

        $searchTerm = "%" . $search . "%";

        $stmt->bind_param("s", $searchTerm);

        $stmt->execute();

        $result = $stmt->get_result();

        $message = "Search results for: " . $search;
    }
}

?>

<?php include "includes/header.php"; ?>

<main>

    <h2>Search Tasks</h2>

    <?php if (!empty($message)) { ?>

        <p><?php echo $message; ?></p>

    <?php } ?>

    <form method="GET">

        <label>Search:</label>

        <input 
            type="text" 
            name="search"
            placeholder="Enter task name"
        >

        <br><br>

        <button type="submit">
            Search
        </button>

    </form>


    <?php if ($result !== null) { ?>

        <?php if ($result->num_rows > 0) { ?>

            <h3>Matching Tasks</h3>

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

                </div>

            <?php } ?>

        <?php } else { ?>

            <p>No matching tasks found.</p>

        <?php } ?>

    <?php } ?>

</main>

<?php include "includes/footer.php"; ?>