const filterSelect = document.querySelector('.dropdown');
const contentContainer = document.querySelector('.content-container');

//Default value when entering the page
filterSelect.value = 'all';

function printContent(index, innerContent) {
    innerContent += `<article class="post-wrapper">
                        <a class="post-link" href="?page=post&amp;recipe=${jsonPost[index].ID}">
                            <div class="post-image">
                                <img src="../post_img/${jsonPost[index].image}.jpg" alt="${jsonPost[index].image_alt}">
                            </div>
                            <div class="description-wrapper">
                                <h4>${jsonPost[index].title}</h4>
                                <p class="description">${jsonPost[index].description}</p>
                            </div>
                        </a>
                    </article>`;
    return innerContent;
}

//Request to transform JSON into Content
let xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        //Define variable to concatenate strings later
        let innerContent = "";
        let loopCounter = 0;

        for (let i = 0; i < jsonPost.length; i++) {
            //Check if object's category matches the value in select dropdown
            //then display all objects whose category match the select dropdown value
            if (jsonPost[i].category === filterSelect.value) {
                innerContent = printContent(i, innerContent);
            }

            //If select dropdown has all as value, show all posts
            if (filterSelect.value === 'all' && loopCounter < itemsPerPage) {
                innerContent = printContent(i, innerContent);
                loopCounter = loopCounter + 1;
            }
        }
        //Display content
        contentContainer.innerHTML = innerContent;
    }
};

//Whenever the dropdown value changes the AJAX gets executed
filterSelect.addEventListener('change', function () {
    xhr.open('GET', 'index.php', true);
    xhr.send();
}, false);