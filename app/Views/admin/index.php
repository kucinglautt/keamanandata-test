<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('CSS/dasboard.css'); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>admin Dashboard</title>

</head>
<body>

    <!-- Logo di tengah atas -->
    <div class="logo-container">
        <img src="<?= base_url('image/Evotkom.png'); ?>" alt="Logo" class="logo">
    </div>

    <!-- Dashboard wrapper -->
    <div class="dashboard-wrapper">
        <h2>admin</h2>
        <p>Halo</p>

        <a href="<?= base_url('User/user_list'); ?>" class="btn">Go User List</a>
        <a href="<?= base_url('Candidates/create'); ?>" class="btn">Create Candidate</a>
        <a href="<?= base_url('admin/candidate_list'); ?>" class="btn">View Candidates</a>
        <a href="<?= base_url('Auth/logout'); ?>" class="btn logout">Logout</a>
    </div>

</body>
</html>

