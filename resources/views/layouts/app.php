<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'My Site' ?></title>
</head>

<style>
    <?php include $cssFile; ?>
</style>

<body>
    <!-- display the navigation bar -->
    <?php include 'partials/navbar.php'; ?>

    <!-- display the main content -->
    <main>
        <?php include $viewFile; ?>
    </main>

    <!-- display the footer content at the bottom -->
    <?php include 'partials/footer.php'; ?>
</body>

</html>