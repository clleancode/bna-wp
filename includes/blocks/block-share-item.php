<div class="share-item container">
    <h3>Share this via:</h3>
    <ul class="share">
    <?php
        $share_urls = bna_get_current_page_share_urls();
    ?>
        <li><a class="fb" href="<?php echo esc_url( $share_urls['facebook'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share this page on Facebook"><span class="icon-social-facebook" aria-hidden="true"></span></a></li>
        <li><a class="tw" href="<?php echo esc_url( $share_urls['twitter'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share this page on X"><span class="icon-twitter" aria-hidden="true"></span></a></li>
        <li><a class="in" href="<?php echo esc_url( $share_urls['linkedin'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share this page on LinkedIn"><span class="icon-linkedin2" aria-hidden="true"></span></a></li>
    </ul>
</div>
