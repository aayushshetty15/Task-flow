<?php 
    // echo "Hello,My task management website is running.<br>";
    // echo "I am learning php";
    // $name="Aayush";
    // $age=21;
    // $task="Learn PHP";
    // echo "Hello, my name is $name and i am {$age} years old,<br>";
    // echo "I want to {$task}<br>";
    // $taskName="Build Task Manager";
    // $taskID=1;
    // $priority="Medium";
    // $isComplete=false;
    // echo "Task name: {$taskName}<br>";
    // echo "Task ID:{$taskID}<br>";
    // echo "Priority:{$priority}<br>";
    // if($isComplete){
    //     echo "Task Completed:True<br>";
    // }
    // else{
    //     echo "Task Completed:False<br>";
    // }
    // if($priority=="High"){
    //     echo "Urgent task<br>";
    // }
    // elseif($priority=="Medium"){
    //     echo "Important Task<br>";
    // }
    // else{
    //     echo "Normal Task<br>";
    // }
    // if($priority=="High" && $isComplete){
    //     echo "Great Job.You will be promoted<br>";
    // }
    // elseif($priority=="Medium" && !$isComplete){
    //     echo "Warning.Dont Repeat it again<br>";
    // }
    // elseif($priority=="Low" && !$isComplete){
    //     echo "Keep your resigntion letter on my table tomorrow<br>";
    // }
    // $age=19;
    // $isLoggedIn=false;
    // if($age>=18 && $isLoggedIn){
    //     echo "Logged in Successfully within the required age.<br>";
    // }elseif($age>=18 && !$isLoggedIn){
    //     echo "The user is not logged in.<br>";
    // }
    // else{
    //     echo "Age is below 18<br>";
    // }
    // $isLoggedIN=false;
    // $TaskCompleted=true;
    // if($isLoggedIN && !$TaskCompleted){
    //     echo "Edit the task<br>";
    // }
    // elseif(!$isLoggedIN && $TaskCompleted){
    //     echo "Please Login first<br>";
    // }
    // elseif(!$isLoggedIN){
    //     echo "Login first<br>";
    // }
    // $tasks=["Learn PHP","Learn MySQL","Build Task Manager"];
    // foreach ($tasks as $Task){
    //     echo "Task:" . $Task . "<br>";
    // }
    // $task=[
    //     "Name" => "Build Task Manager",
    //     "Priority" => "High",
    //     "Completed" => false,
    // ];
    // echo "Task:" . $task["Name"] ."<br>";
    // echo "Priority:" .$task["Priority"] ."<br>";
    // if($task["Completed"]){
    //      echo "Completed?:yes <br>";
    // }
    // else{
    //     echo "Completed?:pending <br>";
    // } 
    // $tasks=[ 
    //     [
    //         'name' => 'Learn PHP',
    //         'priority' => 'High',
    //         'completed' => false
    //     ],
    //     [
    //         'name' => 'Learn MySQL',
    //         'priority' => 'Medium',
    //         'completed' => true
    //     ],
    //     [
    //         'name' => 'Build Website',
    //         'priority' => 'High',
    //         'completed' => false
    //     ]
    // ];
    // foreach($tasks as $task){
    //     echo 'Tasks:' .$task['name'] ."<br>";
    //     echo 'Priority' .$task['priority'] .'<br>';
    //     if($task['completed']){
    //         echo "status:Completed<br>";
    //     }
    //     else{
    //         echo "Status:Incomplete<br>";
    //     }
    // echo "<hr>";
    // }
    // $tasks=[
    //     [
    //         "name" => "Learn PHP",
    //         "priority" => "High",
    //         "Completed" => false,
    //     ],
    //     [
    //         "name" => "Learn MySQL",
    //         "priority" => "Medium",
    //         "Completed" => true,
    //     ]
    // ];
    // foreach($tasks as $task){
    //     echo "Name:" .$task["name"] ."<br>";
    //     echo "Priority:" .$task["priority"] ."<br>";
    //     if($task["Completed"]){
    //         echo "Status:Complete<br>";
    //     }
    //     else{
    //         echo "Status:Pending<br>";
    //     }
    //     echo "<hr>";
    // }
    // function getPriorityMessage($priority){
    //     if($priority=="high"){
    //         return "urgent task";
    //     }
    //     elseif($priority=="medium"){
    //         return "Important task";
    //     }
    //     else{
    //         return "Normal task";
    //     }
    // }
    // echo getPriorityMessage("high") . "<br>";
    // echo getPriorityMessage("low") . "<br>";
    // echo getPriorityMessage("medium") . "<br>";
    // function createTaskMessage($taskName,$deadline){
    //     return "Task:" . $taskName . " | Deadline:" .$deadline; 
    // }
    // echo createTaskMessage("Learn PHP","August 30") ."<br>";
    $name="Aayush";
    $task="Learn PHP";
    $priority="High";
    $isCompleted=true;
    $tasks=[
        [
            'name'=>'Maths',
            'priority'=>'high',
            'completed'=>true,
        ],
        [
            'name'=>'Science',
            'priority'=>'Medium',
            'completed'=> false
        ],
        [
            'name'=>'Physics',
            'priority'=>'low',
            'completed'=>false,
        ]
    ];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
</head>
<body>
    <h1>Welcome <?php echo $name ?>!</h1>
    <p>current task: <?php echo $task ?></p>
    <p>Priority <?php echo $priority ?></p>
    <h2>Task Status:</h2>
    <?php if($isCompleted){ ?>
    <p>Task Completed! </p>
    <?php }else{ ?>
    <p>Task Pending! </p>
    <?php } ?>
    <h3>My Tasks</h3>
    <?php foreach($tasks as $task){ ?>
    <p>The Subject is: <?php echo $task["name"]; ?> </p> <p>and priority level is <?php echo $task["priority"]; ?></p>
    <p> Is the Task Completed: <?php if($task["completed"]) echo "Completed"; else{
        echo "Pending";}?> </p> <hr>
    <?php } ?>
</body>
</html>
