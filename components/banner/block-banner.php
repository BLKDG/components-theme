<?php  
    $bkgd_img = get_field('background_image_banner_block');
    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $link = get_field('link');
?>
<div class="block-banner bkgd-img bg-dark-blue" style="background-image:url(<?php echo $bkgd_img['url']; ?>);">
    
    <div class="position-relative text-center h-100">
        <div class="content position-absolute z-index-1">
            <h2 class="text-white"><?php echo $title; ?></h2>
            <?php if (!empty($subtitle)) : ?>
                <p class="text-white subtitle mt-4"><?php echo $subtitle; ?></p>
            <?php endif; ?>
            <?php if (!empty($link)) : ?>
                <div class="link text-center mt-4">
                    <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>" class="btn btn-orange"><?php echo $link['title']; ?></a>
                </div>    
            <?php endif; ?>
        </div>
    </div>

</div>