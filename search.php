<?php 
$message="";
if(isset($_GET["search"])){//isset check if something exists and not null
    $search = trim($_GET["search"]);
    if(empty($search)){
    $message="Please enter something to search.";
    }
    else{
    $message = "You searched for: " .$search;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Tasks</title>
</head>
<body>

    <h2>Search Tasks</h2>

    <p><?php echo $message; ?></p>

    <form method="GET">

        <label>Search:</label>
        <input type="text" name="search">

        <button type="submit">Search</button>

    </form>

</body>
</html>