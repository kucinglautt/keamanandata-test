<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polling</title>
</head>
<body>
    <h1>Polling</h1>
    <div id="polls">
        <?php if (!empty($polls)): ?>
            <?php foreach ($polls as $poll): ?>
                <h2><?php echo $poll['question']; ?></h2>
                <form action="<?php echo base_url('polls/' . $poll['id'] . '/vote'); ?>" method="post">
                    <?php if (!empty($poll['candidates'])): ?>
                        <?php foreach ($poll['candidates'] as $candidate): ?>
                            <div>
                                <input type="radio" name="candidate_id" value="<?php echo $candidate['id']; ?>" required>
                                <label><?php echo $candidate['nama']; ?></label>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No candidates available for this poll.</p>
                    <?php endif; ?>
                    <input type="hidden" name="user_id" value="<?php echo session()->get('userId'); ?>">
                    <button type="submit">Vote</button>
                </form>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No polls available.</p>
        <?php endif; ?>
    </div>
</body>
</html>