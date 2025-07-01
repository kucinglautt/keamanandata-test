<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        .container {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            margin: 15px 0 0 0;
            text-align: center;
        }
        ul.errors {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            list-style-type: none;
        }
        .note {
            font-size: 0.9em;
            color: #555;
            margin-top: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit User</h1>

    <a class="back-link" href="<?= base_url('users') ?>">&larr; Back to User List</a>

    <?php if(session()->getFlashdata('errors')): ?>
        <ul class="errors">
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= base_url('users/update/' . $user['user_id']) ?>" method="post">
        <?= csrf_field() ?>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= esc($user['username']) ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= esc($user['email']) ?>" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Leave blank to keep current password">
        <div class="note">Leave password blank if you don't want to change it</div>

        <label for="role">Role</label>
        <select id="role" name="role" required>
            <?php
            // Define the enum role options here or pass from controller
            $roles = ['Admin',  'User']; // Example roles — replace with your enum values
            foreach ($roles as $roleOption):
                $selected = ($user['role'] === $roleOption) ? 'selected' : '';
            ?>
                <option value="<?= esc($roleOption) ?>" <?= $selected ?>><?= ucfirst($roleOption) ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn">Update User</button>
    </form>
</div>

</body>
</html>