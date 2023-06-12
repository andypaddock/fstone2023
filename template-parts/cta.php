<div class="call-to-action">
    <div class="links">
        <div class="links--main"> <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
        <?php $link_type = get_sub_field('link_type'); if ($link_type === 'double'):?>
        <div class="links--second"> <?php 
$linktwo = get_sub_field('link_two');
if( $linktwo ): 
    $linktwo_url = $linktwo['url'];
    $linktwo_title = $linktwo['title'];
    $linktwo_target = $linktwo['target'] ? $linktwo['target'] : '_self';
    ?>
            <a class="button" href="<?php echo esc_url( $linktwo_url ); ?>"
                target="<?php echo esc_attr( $linktwo_target ); ?>"><?php echo esc_html( $linktwo_title ); ?></a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>