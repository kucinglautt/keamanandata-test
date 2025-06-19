<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Candidate List</title>
</head>
<body>

<h1>Candidate List</h1>

<a href="<?= base_url('Candidates/create') ?>">Create New Candidate</a>

<?php if(session()->getFlashdata('success')): ?>
    <p><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Description</th>
            <th>Vote</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if (isset($candidates) && !empty($candidates)): ?>
        <?php foreach($candidates as $candidate): ?>
            <tr>
                <td>
                    <?php if (!empty($candidate['photo'])): ?>
                        <img src="<?= base_url('uploads/' . $candidate['photo']) ?>" width="100" alt="Candidate Photo">
                    <?php else: ?>
                        <img src="<?= base_url('uploads/default.png') ?>" width="100" alt="Default Photo"> <!-- Default image if no photo -->
                    <?php endif; ?>
                </td>
                <td><?= esc($candidate['nama']) ?></td>
                <td><?= esc($candidate['bio']) ?></td>
                <td><?= esc($candidate['vote']) ?></td>
                <td>
                <a href="<?= base_url('candidates/edit/' . $candidate['kadidat_id']) ?>">Edit</a>|
                    <form action="<?= base_url('candidates/delete/' . $candidate['kadidat_id'] ) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No candidates found.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<div class="footer-link">
            <a href="<?= base_url('admin/index'); ?>">← Kembali ke Admin</a>
        </div>

</body>
</html>