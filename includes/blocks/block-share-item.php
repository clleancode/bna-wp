<div class="share-item container">
    <h3>Share this via:</h3>
    <ul class="share">
    <?php
        if (get_field('facebook_url')):
            $facebook_url = urlencode(get_field('facebook_url'));
    ?>
        <li><a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $facebook_url; ?>"><span class="icon-social-facebook"></span></a></li>
    <?php
        endif;
        if (get_field('twitter_url')):
            $twitter_url = urlencode(get_field('twitter_url'));
    ?>
        <li><a class="tw" href="https://twitter.com/intent/tweet?url=<?php echo $twitter_url; ?>"><span class="icon-twitter"></span></a></li>
    <?php
        endif;
        if (get_field('linkedin_url')):
            $linkedin_url = urlencode(get_field('linkedin_url'));
    ?>
        <li><a class="in" href="https://www.linkedin.com/shareArticle?url=<?php echo $linkedin_url; ?>"><span class="icon-linkedin2"></span></a></li>
    <?php
        endif;
    ?>
    </ul>
</div>