<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Candidate</title>
</head>
<body>

<h1>Edit Candidate</h1>

<a href="<?= base_url('admin/candidate_list') ?>">Back to Candidate List</a>

<?php if(session()->getFlashdata('success')): ?>
    <p><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<form action="<?= base_url('candidates/update/' . $candidate['kadidat_id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= esc($candidate['nama']) ?>" required>
    </div>
    
    <div>
        <label for="bio">Description:</label>
        <textarea id="bio" name="bio" required><?= esc($candidate['bio']) ?></textarea>
    </div>
    
    <div>
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo">
        <p>Current Photo:</p>
        <?php if (!empty($candidate['photo'])): ?>
            <img src="<?= base_url('uploads/' . $candidate['photo']) ?>" width="100" alt="Candidate Photo">
        <?php else: ?>
            <img src="<?= base_url('uploads/default.png') ?>" width="100" alt="Default Photo">
        <?php endif; ?>
    </div>
    
    <div>
        <button type="submit">Update Candidate</button>
    </div>
</form>

<div class="footer-link">
    <a href="<?= base_url('admin/index'); ?>">← Kembali ke Admin</a>
</div>

</body>
</html>
