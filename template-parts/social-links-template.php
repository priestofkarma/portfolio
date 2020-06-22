<?php if( get_field('social_list', 'option') ):
    echo '<ul class="soc_links">'; ?>
    <?php while( the_repeater_field('social_list', 'option') ): ?>
    <li><a target="_blank" href="<?php the_sub_field('social_link'); ?>"><?php the_sub_field('social_icon'); ?></a></li>
<?php endwhile;
    echo '</ul>'; ?>
<?php endif; ?>