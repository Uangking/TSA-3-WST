<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User - POS System</title>
</head>
<body>
    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('about') ?>">About</a>
        <a href="<?= site_url('customers') ?>">Customer Accounts</a>
        <a href="<?= site_url('users') ?>">User Accounts</a>
    </nav>

    <h1>New User</h1>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>
    <?php if ($errors !== []) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('users/new') ?>" method="post">
        <?= csrf_field() ?>
        <p>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" maxlength="50" required value="<?= esc(old('username')) ?>">
        </p>
        <p>
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" maxlength="100" required value="<?= esc(old('full_name')) ?>">
        </p>
        <button type="submit">Save User</button>
    </form>
    <p><a href="<?= site_url('users') ?>">Back to User Accounts</a></p>
</body>
</html>
