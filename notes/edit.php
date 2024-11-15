<?php 
    require_once('includes/db.php');
    require_once('includes/functions.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $title = prep_input($_POST['title']);
        $content = prep_input($_POST['content']);
        $important = prep_input($_POST['important']);
        $id = prep_input($_POST['id']);

        $sql = "UPDATE notes SET ";
        $sql .= "title = '" . $title . "', ";
        $sql .= "content = '" . $content . "', ";
        $sql .= "important = '" . $important . "' ";
        $sql .= "WHERE id ='" . $note['id'] . "' ";
        $sql .= "LIMIT 1";

       if (mysqli_query($conn, $sql)) {
           header("Location: index.php");
       }

    }

    if (!isset($_GET['id'])) {
        header("Location: index.php");
    }
    $id = $_GET['id'];f
    $sql = "SELECT * FROM notes WHERE id='" . $id . "' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $note = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Notes App</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <header>
                Notes App
    </header>

    <div class="titleDiv">
            <div class="backLink"><a class="nav-link" href="index.php"> Home</a></div>
            <div class="head">New Note</div>
    </div>
    <form action="edit.php" method="post">     
            <input type="hidden" name="id" value=<?php echo $note['id']; ?>
            <span class="label">Title</span>
            <input type="text" name="title" value=<?php echo $note['title']; ?> />
            
            <span class="label">Content</span>
            <textarea name="content"><?php echo $note['content']; ?> </textarea>

            <div class="chkgroup">
                <span class="label-in">Important</span>
                <input type="hidden" name="important" value="0" />
                <input type="checkbox" name="important" value="1" <?php if ($note['important']) {echo "checked";} ?>/>
            </div>
            
        <input type="submit" />
</html>
