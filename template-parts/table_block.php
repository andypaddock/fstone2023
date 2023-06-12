<?php $bgColor = get_sub_field('switch_bg'); ?><section
    class="container section-table <?php if ($bgColor == true) : echo 'alt-bg';
                                                                                                endif; ?> mb-<?php the_sub_field('margin_bottom'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php

        $table = get_sub_field('table_data');

        if (!empty($table)) {

            echo '<table id="table-data" border="0">';

            if (!empty($table['caption'])) {

                echo '<caption>' . $table['caption'] . '</caption>';
            }

            if (!empty($table['header'])) {

                echo '<thead>';

                echo '<tr>';

                foreach ($table['header'] as $th) {

                    echo '<th>';
                    echo $th['c'];
                    echo '</th>';
                }

                echo '</tr>';

                echo '</thead>';
            }

            echo '<tbody>';

            foreach ($table['body'] as $tr) {

                echo '<tr>';

                foreach ($tr as $td) {

                    echo '<td>';
                    echo $td['c'];
                    echo '</td>';
                }

                echo '</tr>';
            }

            echo '</tbody>';

            echo '</table>';
        }
       
       ?>
    </div>

</section>