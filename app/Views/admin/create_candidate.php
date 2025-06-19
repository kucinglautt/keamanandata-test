<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Candidate</title>
    <link rel="stylesheet" href="<?= base_url('CSS/c_candidate.css') ?>">
</head>
<body>

<div class="logo-container">
    <img src="<?= base_url('image/Evotkom.png') ?>" alt="Logo" class="logo">
</div>

<div class="form-wrapper">
    <h2>Create Candidate</h2>

    <form action="<?= base_url('Candidates/store') ?>" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <label for="name">Candidate Name</label>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div class="input-group">
            <label for="description">Description</label>
            <textarea name="bio" id="bio" rows="4" required></textarea>
        </div>

        <div class="input-group">
            <label for="photo">Upload Photo</label>
            <input type="file" name="photo" id="photo" accept="image/*" required>
        </div>

        <button type="submit" class="btn">Submit</button>
    </form>
</div>
<div class="footer-link">
            <a href="<?= base_url('admin/index'); ?>">← Kembali ke Admin</a>
        </div>

</body>
</html>
