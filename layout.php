<!-- layout.php -->
<?php
// Set default title if not defined
$pageTitle = $pageTitle ?? "SmileCare Dental Clinic";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $pageTitle; ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="/assets/libs/bootstrap-5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/libs/font-awesome/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/libs/font-awesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- extra style -->
    <?php if (isset($extraStyle)) echo $extraStyle; ?>
</head>

<body>
    <!-- Header -->
    <?php include_once 'includes/navbar.php'; ?>
    <!-- Main Content -->
    <div class="content">
        <?php echo $content; ?>
    </div>
    <!-- Footer -->
    <?php include_once 'includes/footer.php'; ?>
    <!-- Scripts -->
    <script src="/assets/libs/bootstrap-5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/font-awesome/js/all.min.js"></script>
    <!-- extra script -->
    <?php if (isset($extraScript)) echo $extraScript; ?>
</body>

</html>