<h1 class="dash-h1">Nutrition</h1>
<section class="dash-content">
    <div class="content-summary">
        <h5 class="dash-h5">Meals</h5>
        <div class="nutrition-filter">
            <select class="dropdown">
                <option value="all">All</option>
                <option value="omnivorian">Omnivorian</option>
                <option value="vegetarian">Vegetarian</option>
                <option value="vegan">Vegan</option>
            </select>
        </div>
        <div class="content-container">
            <?php
            foreach ($allPosts as $row) {
                echo '<article class="post-wrapper">';
                echo '<a class="post-link" href="?page=post&recipe=' . $row['ID'] . '">';
                echo '<div class="post-image">';
                echo '<img src="../post_img/' . $row['image'] . '.jpg" alt="Breakfast">';
                echo '</div>';
                echo '<div class="description-wrapper">';
                echo '<h4>' . $row['title'] . '</h4>';
                echo '<p class="description">' .$row['description'].'</p>';
                echo '</div>';
                echo '</a>';
                echo '</article>';
            }
            ?>
        </div>
    </div>
</section>
