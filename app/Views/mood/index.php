<h2><?= esc($title) ?></h2>

<?php ;if (! empty($news) && is_array($news)): ?>

    <?php foreach ($mood as $mood_item): ?>

        <h3><?= esc($mood_item['title']) ?></h3>

        <div class="main">
            <?= esc($mood_item['body']) ?>
        </div>
        <p><a href="/mood/<?= esc($mood_item['slug'], 'url') ?>">add moods</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No mood</h3>

    <p>Unable to find any.</p>

<?php endif ?>