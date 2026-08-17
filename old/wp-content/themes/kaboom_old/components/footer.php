</div>

<?php
foreach (glob("wp-content/themes/kaboom/assets/scripts/dist/*.js") as $js) {
    echo '<script src="/' . $js . '"></script>';
}

wp_footer();

?>

</body>
</html>