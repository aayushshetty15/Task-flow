<?php
$message="";
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $taskName = trim($_POST["taskName"]);//use var_dump=$taskName and check the difference
    $priority = $_POST["priority"];

    if(empty($taskName)){
        $message="please enter a task name";
    }
    else{
        $message="Task added:" .$taskName . "| Priority: " .$priority;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
</head>
<body>
    <h2>Add Task</h2>
    <?php echo $message; ?>
    <form method="POST">
    <label>Task Name:</label>
    <input type="text" name="taskName"><!--after submitting it becomes $_POST["taskName"]-->

    <br><br>

    <label>Priority:</label>

    <select name="priority"><!--after submitting it becomes $_POST["priority"]-->
        <option value="High">High</option>
        <option value="Medium">Medium</option>
        <option value="Low">Low</option>
    </select>

    <br><br>

    <button type="submit">ADD TASK</button>

</form>
</body>
</html>
