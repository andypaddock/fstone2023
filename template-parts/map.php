<?php
$location = get_sub_field('location'); ?>
<?php $bgColor = get_sub_field('switch_bg'); ?><section
    class="container section-image <?php if ($bgColor == true) : echo 'alt-bg';
                                                                                        endif; ?> mb-<?php the_sub_field('margin_bottom'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div id='map-location'></div>
    </div>

</section>
<script>
mapboxgl.accessToken = 'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
var map = new mapboxgl.Map({
    container: 'map-location',
    style: 'mapbox://styles/silverless/ckk5kbjw20m9117oq075t73og',
    center: [<?php echo esc_attr($location['lng']); ?>, <?php echo esc_attr($location['lat']); ?>],
    zoom: 11,
    maxZoom: 17,
    minZoom: 6,
});
map.addControl(new mapboxgl.NavigationControl());
// add marker to map
new mapboxgl.Marker()
    .setLngLat([<?php echo esc_attr($location['lng']); ?>, <?php echo esc_attr($location['lat']); ?>])
    .addTo(map);
</script>