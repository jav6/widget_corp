<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
$current_subject = find_subject_by_id($_GET["subject"]);
if (!$current_subject) {
	redirect_to("manage_content.php");
}

$id = $current_subject["id"];

$page_set = find_pages_for_subject($id);

if (mysqli_num_rows($page_set) > 0) {
	$_SESSION["message"] = "Can't delete subject with pages!";
    redirect_to("manage_content.php?subject={$id}");
}

$query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1;";

$result = mysqli_query($connection, $query);

if ($result && mysqli_affected_rows($connection)) {
	//success
	$_SESSION["message"] = "Subject delete.";
    redirect_to("manage_content.php");
}else{
	//failed
	$_SESSION["message"] = "Subject deletetion.";
    redirect_to("manage_content.php?subject=<?php echo $id;?>");
}
?>