<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url() ); ?>" _lpchecked="1">
	<fieldset>
		<input type="text" name="s" id="s" value="<?php _e('Search this site...','foodie-blog'); ?>" onblur="if (this.value == '') {this.value = '<?php _e('Search this site...','foodie-blog'); ?>';}" onfocus="if (this.value == '<?php _e('Search this site...','foodie-blog'); ?>') {this.value = '';}" >
		<input type="submit" value="<?php esc_attr_e( 'Search', 'foodie-blog' ); ?>" />
	</fieldset>
</form>
