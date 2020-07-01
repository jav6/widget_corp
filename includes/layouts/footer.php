<div id="footer">Widget Corp, Created: <?php echo date("Y");?> - &copy;<span title="Mohammad Javidi">M.J</span></div>
</body>
</html>
<?php 
// 5. Close database connection
if (isset($connection)) {
	mysqli_close($connection);
}
 ?>