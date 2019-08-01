<?php
$search_style_type = cs_get_option('search_type');
?>
<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform" >
	<p>
		<input type="text" name="s" id="s" placeholder="<?php esc_attr_e('Search...','havnor'); ?>" />
		<input type="submit" id="searchsubmit" class="button-primary" value="" />
		<?php if($search_style_type === 'post_type_search'){ ?>
		<input type="hidden" name="post_type" value="">
		<?php } ?>
	</p>
</form>
<?php
