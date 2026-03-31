<?php
$embed_code = get_field('map', false, false);
?>
<div class="section-map container">
    <iframe src="<?php echo esc_url($embed_code); ?>"></iframe>
<!-- 	<iframe src="https://www.google.com/maps/d/embed?mid=1zq8psoz7fUBeEJOgbH4CBKpA1fTA_DY&ehbc=2E312F" width="640" height="480"></iframe> -->
</div>


