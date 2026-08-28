<?php 
$message="";
if(isset($_GET["search"])){//isset check "Search" something exists and not null
    $search = trim($_GET["search"]);
    if(empty($search)){
    $message="Please enter something to search.";
    }
    else{
    $message = "You searched for: " .$search;
    }
}
?>
<?php include "includes/header.php"; ?>

    <h2>Search Tasks</h2>

    <p><?php echo $message; ?></p>

    <form method="GET">

        <label>Search:</label>
        <input type="text" name="search">

        <button type="submit">Search</button>

    </form>

<?php include "includes/footer.php"; ?>