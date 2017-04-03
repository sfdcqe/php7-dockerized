<?php echo 'Hello NE2W World'; ?>

<?php
  require __DIR__ . '/../app/src/app.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>PHP Demo</title>
<meta content="width=device-width, initial-scale=1" name="viewport" />
<link rel="stylesheet" href="css/application.css" />
</head>
<body>

<?php
include('../app/views/header.php');
include('../app/views/content.php');
include('../app/views/footer.php');
?>

</body>
</html>
