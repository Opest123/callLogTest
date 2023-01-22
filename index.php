<?php include 'db.php'; ?>
<?php include 'create_log_headers.php'; ?>
<?php echo file_get_contents("view/header.html.php"); ?>
<?php include "./view/call_logs.html.php"; ?>
<?php echo file_get_contents("view/footer.html.php"); ?>