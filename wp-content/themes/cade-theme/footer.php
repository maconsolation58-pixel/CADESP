<?php
/**
 * Le template pour afficher le pied de page.
 */
?>
    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-inner">
            <div class="footer-top">
                <div class="footer-column">
                    <?php get_template_part( 'template-parts/components/contact-info' ); ?>
                </div>
                <?php get_template_part( 'template-parts/layout/footer/footer-widgets' ); ?>
            </div>
            <div class="footer-bottom">
                <?php get_template_part( 'template-parts/layout/footer/social-links' ); ?>
                <?php get_template_part( 'template-parts/layout/footer/copyright' ); ?>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
