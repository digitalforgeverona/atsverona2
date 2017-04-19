<?php
	if (   ! is_active_sidebar( 'sidebar-1'  )
		&& ! is_active_sidebar( 'sidebar-2' )
		&& ! is_active_sidebar( 'sidebar-3'  )
		&& ! is_active_sidebar( 'sidebar-4'  )
	)
	return;

?>
<?php 
$footer_widget_col = 'col-md-3';
if (asalah_option('asalah_footer_three')) {
	$footer_widget_col = 'col-md-4';
}
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<div id="first_footer" class="widget_area <?php echo $footer_widget_col; ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
<div id="second_footer" class="widget_area <?php echo $footer_widget_col; ?>">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
<div id="third_footer" class="widget_area <?php echo $footer_widget_col; ?>">
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
</div>
<?php endif; ?>

<?php if (!asalah_option('asalah_footer_three')): ?>
	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div id="fourth_footer" class="widget_area <?php echo $footer_widget_col; ?>">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div>
	<?php endif; ?>
<?php endif; ?>