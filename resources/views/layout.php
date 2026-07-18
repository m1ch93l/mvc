<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle ?? 'My Site' ?></title>

    <!-- css and js -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- display the navigation -->
    <?php include 'partials/navbar.php'; ?>

    <!-- display the main content -->
    <main>
        <?php include $viewFile; ?>
    </main>

    <!-- display the content at the bottom -->
    <?php include 'partials/footer.php'; ?>
</body>

</html>