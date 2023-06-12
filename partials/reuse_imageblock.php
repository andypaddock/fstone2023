 <div class="image-link-block tile">
     <?php
        $image = get_sub_field('image');
        $link = get_sub_field('link');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
     <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
         <?php echo wp_get_attachment_image($image, 'large'); ?></a>
     <a class="text-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
         <h3 class="heading-1"><?php echo esc_html($link_title); ?></h3>
     </a>
     <?php endif; ?>
 </div>