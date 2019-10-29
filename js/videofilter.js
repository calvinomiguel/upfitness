const filterSelect = document.getElementById('filter');
const videoContainer = document.querySelector('.tube-wrapper');

let xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        let innerContent = "";
        for (let i = 0; i < json.length; i++) {

            //Check if object's category matches the value in select dropdown
            //then display all objects whose category match the select dropdown value
            if (json[i].category === filterSelect.value) {
                innerContent += `<article class="post-wrapper">
                                    <a class="post-link" href="?page=video&workout=${json[i].ID}">
                                        <div class="post-image">
                                            <img src="../video_img/${json[i].thumbnail}.jpg" alt="${json[i].alt}">
                                            <div class="play"><i class="fas fa-play"></i></div>
                                        </div>
                                        <div class="description-wrapper">
                                            <h4>${json[i].title}</h4>
                                        </div>
                                    </a>
                                </article>`;
            }

            //If select dropdown has all as value, show all videos
            if (filterSelect.value == 'all') {
                innerContent += `<article class="post-wrapper">
                                    <a class="post-link" href="?page=video&workout=${json[i].ID}">
                                        <div class="post-image">
                                            <img src="../video_img/${json[i].thumbnail}.jpg" alt="${json[i].alt}">
                                            <div class="play"><i class="fas fa-play"></i></div>
                                        </div>
                                        <div class="description-wrapper">
                                            <h4>${json[i].title}</h4>
                                        </div>
                                    </a>
                                </article>`;
            }
        }
        videoContainer.innerHTML = innerContent;

    }
};

filterSelect.addEventListener('change', function () {
    xhr.open('GET', 'index.php', true);
    xhr.send();
}, false);

