<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

$count_session = new Session('counter.txt');
$count = $count_session->count();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Counter</title>
</head>
<body>
    <div class="container">
        <h1>Session Counter</h1>
        <p>This page has been loadedasdsa <strong><?php echo $count; ?></strong> times in this session.</p>
        <p><a href="index.php">Refresh</a></p>
    </div>
</body>
</html>
