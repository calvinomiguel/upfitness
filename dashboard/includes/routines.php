<h1 class="dash-h1">Routines</h1>
<section class="dash-content">
    <h5 class="dash-h5">Workouts</h5>
    <form class="my-data" method="post">
        <div class="input-wrapper">
            <select id="filter" name="filter" class="dropdown">
                <option value="all">All</option>
                <option value="cardio">Cardio</option>
                <option value="strength">Strength</option>
                <option value="stretching">Stretching</option>
            </select>
            <div class="tube-wrapper">
                <?php
                foreach ($allVideos as $row) {
                    echo "<article class=\"post-wrapper\">";
                    echo "<a class=\"post-link\" href=\"?page=video&workout=" . $row['ID'] . "\">";
                    echo "<div class=\"post-image\">";
                    echo "<img src=\"../video_img/" . $row['thumbnail'] . ".jpg\" alt=\"Breakfast\">";
                    echo "<div class=\"play\"><i class=\"fas fa-play\"></i></div>";
                    echo "</div>";
                    echo "<div class=\"description-wrapper\">";
                    echo "<h4>" . $row['title'] . "</h4>";
                    echo "</div>";
                    echo "</a>";
                    echo "</article>";
                }
                ?>
            </div>
        </div>
    </form>
</section>
