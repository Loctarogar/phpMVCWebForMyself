<html>
<head>
</head>
<body>
<h2>Default Layout</h2>
<div>

    <?php if (isset($_SESSION['error'])) {; ?>
        <?php print_r($_SESSION['error']); unset($_SESSION['error']); ?>
    <?php }; ?>

    <?php if (isset($_SESSION['success'])) {; ?>
        <?php print_r($_SESSION['success']); unset($_SESSION['success']); ?>
    <?php }; ?>

</div>
<div><?php echo $content ?></div>

</body>
</html>