import { likePost, liked } from "./func.js";

// Find post by category
let checkedId = [];
const inputCategory = document.querySelectorAll(".checkcate");
const perPage = 6;
let displayed = [];

inputCategory.forEach((input) => {
  input.addEventListener("input", () => {
    input.parentElement.classList.toggle("text-danger");

    if (input.checked) {
      if (!checkedId.includes(input.value)) {
        checkedId.push(input.value);
      }
    } else {
      checkedId = checkedId.filter((checked) => checked !== input.value);
    }

    getCategoryPost(checkedId, 1, perPage);
  });
});

const getCategoryPost = async (checked, page, perPage) => {
  const layoutCard = document.querySelector(".content .card_layout");

  layoutCard.innerHTML = "";
  let url = "app/api/findpost.php";
  let data = {
    categoryIds: checked,
    page: page,
    perPage: perPage,
  };

  let res = await fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  });

  let result = await res.json();

  if (result.length > 0) {
    result.forEach((element) => {
      displayed.push(element.id);
      layoutCard.innerHTML += `<div class="card">
  <div class="card_img">
      <a href="./show.php?id=${element.id}">
          <img src="./public/images/${element.photo}" alt="">
      </a>
  </div>
  <div class="card_desc">
      <h4>${element.title}</h4>
      <p>${element.content.substr(0, 100)}</p>
      <div class="">
          <button class="btn_like" data-id="${element.id}" onClick="likePost(${
        element.id
      }, this)">
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

    // navigation

    url = "app/api/gettotal.php";
    data = {
      categoryIds: checked,
    };

    res = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    });

    result = await res.json();

    let total = result.total;
    let navigation = `<nav aria-label="Page navigation example">
    <ul class="pagination pagination-sm">`;

    for (let i = 1; i <= Math.ceil(total / perPage); i++) {
      navigation += `<li class="page-item" onClick="getCategoryPost(${checked}, ${i}, ${perPage})">${i}</li>`;
    }

    navigation += `</ul>
    </nav>`;

    layoutCard.innerHTML += navigation;
  }
};

getCategoryPost(checkedId, 1, perPage);
