<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #555;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin: 2px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #b02a37;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 10px;
        }
        h1 {
            text-align: center;
        }
        .top-actions {
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>User List</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <p style="color:green; text-align:center;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <div class="top-actions">
        <a href="<?= base_url('create/user') ?>" class="btn">Create User</a>
        <a href="<?= base_url('admin/index') ?>" class="btn">Kembali kehalaman Admin</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>password</th>
                <th>Email</th>
                <th>Role</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($users) && is_array($users)): ?>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?= esc($user['user_id']) ?></td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['password']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['role']) ?></td>
                    <td>
                        <a href="<?= base_url('users/edit/' . $user['user_id']) ?>" class="btn">Edit</a>
                        <form action="<?= base_url('users/delete/' . $user['user_id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
