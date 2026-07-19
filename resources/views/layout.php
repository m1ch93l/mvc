<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'My Site' ?></title>
</head>

<style>
.nav {
    display: flex;
    background-color: gray;
    padding-top: 20px;
    padding-bottom: 20px;
}

.justify-content-center {
    justify-content: center;
}

.nav-link {
    display: inline;
    margin-right: 20px;
    margin-right: 20px;
    padding: 10px;
    color: white;
    text-decoration: none;
}

.nav-link:hover {
    background-color: blue;
    color: white;
    margin-right: 20px;
    margin-right: 20px;
    padding: 10px;
    border-radius: 15px;
}

.active {
    background-color: blue;
    border-radius: 15px;
}

.fixed-bottom {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;

    /* Centering the content */
    display: flex;
    justify-content: center;
    align-items: center;

    /* Optional: Add background color & padding so it doesn't overlap text invisibly */
    background-color: #d4cfcf;
    padding: 1px 0;
}

@media screen and (max-width: 450px) {
    .fixed-bottom {
        background-color: #890101;
    }
}
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