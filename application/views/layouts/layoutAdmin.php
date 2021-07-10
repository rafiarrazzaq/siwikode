<!DOCTYPE html>
<html lang="en">

<head>
    <?= $page["style"]; ?>
</head>

<?= $page["headerAdmin"]; ?>

<body>

    <main id="main">
        <?php $content; ?>
    </main>

    <?= $page["footer"]; ?>

</body>

<?= $page['script']; ?>

</html>