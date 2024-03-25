import { likePost, liked } from "./func.js";

// Contain all the id of post , which displayed in screen
let displayedPosts = [];

const cardLayouts = document.querySelectorAll(".card_layout");

console.log(liked);

likePost();

// Get random posts
const getHomePosts = async (layout, categoryId, displayedPosts = []) => {
  const btnLoad = layout.nextElementSibling;
  if (btnLoad) {
    btnLoad.innerHTML = "Loading";
  }

  const url = "app/api/gethomepost.php";
  const data = {
    categoryId: categoryId,
    displayedPosts: displayedPosts,
  };

  const res = await fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  });

  const result = await res.json();
  if (result.length > 0) {
    result.slice(0, 3).forEach((element) => {
      displayedPosts.push(element.id);
      layout.innerHTML += `<div class="card">
                <div class="card_img">
                    <a href="./show.php?id=${element.id}">
                        <img src="./public/images/${element.photo}" alt="">
                    </a>
                </div>
                <div class="card_desc">
                    <h4>${element.title}</h4>
                    <p>${element.content.substr(0, 100)}</p>
                    <div class="">
                        <button class="btn_like" data-id="${
                          element.id
                        }" onClick="likePost(${element.id}, this)">
                            Like: <span class="likes">${element.likes}</span>
                        </button>
                        <button class="btn_view">
                            View: <span class="views">${element.views}</span>
                        </button>
                    </div>
                </div>
            </div>`;
    });

    likePost();
  }

  if (btnLoad) {
    if (result.length > 3) {
      btnLoad.innerHTML = "Load more";
    } else {
      btnLoad.style.display = "none";
    }
  }
};

if (cardLayouts.length > 0) {
  cardLayouts.forEach((layout) => {
    const categoryId = layout.getAttribute("data-id");
    getHomePosts(layout, categoryId);

    // Load more
    const buttonLoadMore = layout.nextElementSibling;
    if (buttonLoadMore) {
      buttonLoadMore.addEventListener("click", () => {
        getHomePosts(layout, categoryId, displayedPosts);
      });
    }
  });
}
