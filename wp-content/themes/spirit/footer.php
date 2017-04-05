<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Spirit
 * @since Spirit 1.0
 */
?>

<nav id="footer">
    <div class="container">
        <div class="pull-left fnav">
            <p>ALL RIGHTS RESERVED. COPYRIGHT © <?= date("Y").'.'; ?></p>
        </div>
        <div class="pull-right fnav">
            <ul class="footer-social">
                <?php dynamic_sidebar('footer') ?>

            </ul>
        </div>
    </div>
</nav>

<?php wp_footer(); ?>

</body>
</html>