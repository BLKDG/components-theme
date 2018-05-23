<?php
$page_title = get_the_title();
$page_url = get_permalink();
$excerpt = get_the_excerpt();
$twitter = "https://twitter.com/home?status=" . urlencode($page_title) . ' ' . urlencode($page_url);
$facebook = "https://www.facebook.com/sharer/sharer.php?quote=" . urlencode($page_title) . ' ' . urlencode($page_url);
$linked_in = "https://www.linkedin.com/shareArticle?mini=true&url=" . urlencode($page_url) . "&title=". urlencode($page_title) . "&summary=" . urlencode($excerpt);
?>

<div class="share-links">
    <div class="social-links">
        <a target="_blank" href="<?php echo $twitter; ?>" title="Twitter" onclick="window.open('<?php echo $twitter; ?>', 'newwindow', 'width=400,height=250'); return false;"><i class="fab fa-twitter" aria-hidden="true"></i></a>
        <a target="_blank" href="<?php echo $facebook; ?>" title="Facebook" onclick="window.open('<?php echo $facebook; ?>', 'newwindow', 'width=400,height=250'); return false;"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
        <a target="_blank" href="<?php echo $linked_in ?>" title="LinkedIn" onclick="window.open('<?php echo $linked_in; ?>', 'newwindow', 'width=400,height=250'); return false;"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
    </div>
</div>