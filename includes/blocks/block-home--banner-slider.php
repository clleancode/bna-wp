<?php 
$rows = get_field('header_slider');
$rows_count = is_array($rows) ? count($rows) : 0;
$is_slider = $rows_count > 1;
$is_first = true;
?>

<div class="home--camping">

<?php if ($rows): ?>

    <?php if ($is_slider): ?>
        
        <div class="swiper myHeader">
            <div class="swiper-wrapper">

                <?php foreach ($rows as $row): ?>

                    <div class="swiper-slide">

                        <?php 
                        $image_id = $row['home_camping_image'];

                        echo wp_get_attachment_image(
                            $image_id,
                            'full',
                            false,
                            array(
                                'loading' => $is_first ? 'eager' : 'lazy',
                                'fetchpriority' => $is_first ? 'high' : 'low',
                                'decoding' => 'async',
                            )
                        );

                        $is_first = false;
                        ?>

                        <div class="camping--inner">
                            <div class="camping--inner--left">

                                <div class="subtitle">
                                    <p><?php echo esc_html($row['section_number']); ?></p>
                                    <span></span>
                                    <p><?php echo esc_html($row['subtitle']); ?></p>
                                </div>

                                <h1><?php echo esc_html($row['section_title']); ?></h1>

                                <div class="camping--inner--buttons">

                                    <?php 
                                    $link = $row['button'];
                                    if ($link):
                                    ?>
                                        <a href="<?php echo esc_url($link['url']); ?>" class="btn" target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
                                            <?php echo esc_html($link['title']); ?>
                                            <span class="icon-angle-double-down"></span>
                                        </a>
                                    <?php endif; ?>

                                </div>

                            </div>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>
        </div>

    <?php else: ?>

        <?php $row = $rows[0]; ?>

        <div class="hero" >

            <?php 
            echo wp_get_attachment_image(
                $row['home_camping_image'],
                'full',
                false,
                array(
                    'loading' => 'eager',
                    'fetchpriority' => 'high',
                    'decoding' => 'sync',
                )
            );
            ?>

            <div class="camping--inner">
                <div class="camping--inner--left">

                    <div class="subtitle">
                        <p><?php echo wp_kses_post($row['section_number']); ?></p>
                        <span></span>
                        <p><?php echo wp_kses_post($row['subtitle']); ?></p>
                    </div>

                    <h1><?php echo wp_kses_post($row['section_title']); ?></h1>

                    <div class="camping--inner--buttons">

                        <?php 
                        $link = $row['button'];
                        if ($link):
                        ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="btn" target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
                                <?php echo esc_html($link['title']); ?>
                                <span class="icon-angle-double-down"></span>
                            </a>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

        </div>

    <?php endif; ?>

<?php endif; ?>

</div>