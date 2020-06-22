<div class="m_2_benef_wrap">
	<div class="m_2_benef_img lazy" data-bg="url(<?php echo get_field('skills_img', 'option') ?>)"></div>
    <?php while (the_repeater_field('my_skills', 'option')): ?>
		<!--контент-->
		<div class="m_2_benef_item">
		<span><?php the_sub_field('skill_icon', 'option'); ?>
            <?php the_sub_field('skill_title', 'option'); ?></span>
			<p><?php the_sub_field('skill_excerpt', 'option'); ?></p>
		</div>

    <?php endwhile; ?>
	</ul>
</div>

