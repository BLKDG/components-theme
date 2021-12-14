<?php 
    $gallery = get_field('gallery_slider_block'); 
    if (!empty($gallery)) :
?>
    <div class="block-gallery-slider">
        <?php foreach ($gallery as $img) { ?>
            <div class="gallery-img bkgd-img" style="background-image:url(<?php echo $img['url']; ?>);">
                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="hidden">
            </div>
        <?php } ?>
    </div>
    <div id="block-gallery-dots"></div>
<?php endif; ?>