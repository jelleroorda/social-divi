<?php global $social_divi_available_icons; ?>

<ul class="et-social-icons">

<?php foreach ($social_divi_available_icons as $icon) : ?>
	<?php if ('on' === et_get_option("social_divi_{$icon['name']}_enabled", 'off')) : ?>
		<li class="et-social-icon social-divi-<?php echo $icon['name']; ?>">
			<a href="<?php echo esc_url(et_get_option("social_divi_{$icon['name']}_url", '#')); ?>" class="icon">
				<span><?php echo esc_html($icon['translated_name']); ?></span>
			</a>
		</li>
	<?php endif; ?>
<?php endforeach; ?>

</ul>