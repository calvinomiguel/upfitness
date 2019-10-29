<section class="dash-content">
    <div class="video-post">
            <div class="video-container">
                <iframe src="<?php echo $video['url'] ?>?>" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
            <h2><?php echo $video['title']?></h2>
            <p class="description video-description"><?php echo $video['description']?></p>
        </div>
    <a class="go-back" href="?page=routines"><i class="fas fa-undo"></i> Back to routines</a>
</section>
