<?php


?>
<?php do_action( 'tw_widget_above_hook' ); ?>
    <section id="section-widgets" class="section widgets widgets-1">
        <div class="container">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
        </div>
    </section><!-- #home-widgets -->

<?php do_action( 'tw_widget_below_hook' ); ?>