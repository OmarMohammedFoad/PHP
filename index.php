<?php
$config = require __DIR__ . '../cofig.php';

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($name)) {
        $errors['name'] = 'Name is required.';
    } elseif (strlen($name) > $config['max_name_length']) {
        $errors['name'] = 'Name must be less than ' . $config['max_name_length'] . ' characters.';
    }


    if (empty($email)) {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }

    // Validate message
    if (empty($message)) {
        $errors['message'] = 'Message is required.';
    } elseif (strlen($message) > $config['max_message_length']) {
        $errors['message'] = 'Message must be less than ' . $config['max_message_length'] . ' characters.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)): ?>
    <h2><?= htmlspecialchars($config['thank_you_message']) ?></h2>
    <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Message:</strong> <?= nl2br(htmlspecialchars($message)) ?></p>
<?php else: ?>
    <?php if (!empty($errors)): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"><br><br>

        <label>Message:</label><br>
        <textarea name="message"><?= htmlspecialchars($message) ?></textarea><br><br>

        <button type="submit">Send</button>
    </form>
<?php endif; ?>
</body>
</html>
