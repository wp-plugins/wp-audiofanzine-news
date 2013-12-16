<?php echo $before_widget; ?>

<?php echo $titlenews; ?>

<ul>
    <?php foreach($news_items as $item) : ?>
        <li>
            <h3><a target="_blank" href="<?php echo esc_url( $item->get_permalink() ); ?>">
                <?php echo esc_html( $item->get_title() ); ?>
            </a></h3>
            <span><?php setlocale(LC_TIME, WPLANG . '.UTF-8'); echo $item->get_local_date('%e %B - %X'); ?></span>
        </li>
    <?php endforeach; ?>
</ul>

<?php echo $after_widget; ?>