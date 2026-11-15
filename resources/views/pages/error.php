<div class="container">

    <h1>500</h1>

    <p><?= htmlspecialchars($message) ?></p>

    <?php if (! empty($debug)): ?>
        <p><small>Details were written to <code>storage/logs/app.log</code>.</small></p>
    <?php endif; ?>

    <p><a href="?page=home">&larr; Back to home</a></p>

</div>
