<!DOCTYPE html>
<html lang="en">

<head>
    <?= $page["style"]; ?>
</head>

<?= $page["header"]; ?>

<body>

    <main id="main">
        <?php $content; ?>
    </main>

    <?= $page["footer"]; ?>

</body>

<?= $page['script']; ?>

</html>