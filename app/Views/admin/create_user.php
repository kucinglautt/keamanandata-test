<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create akun user</title>
</head>
<body>
    <h2>create</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red;"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <form action="/auth/registerProcess" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="email" name="email" placeholder="email" required>
        <select name="role" required>
            <option value="">Select Role</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
        <button type="submit">Create</button>
    </form>
</body>
</html>