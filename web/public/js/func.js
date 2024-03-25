// Liked posts
let liked = [];

if (localStorage.getItem("liked")) {
  liked = JSON.parse(localStorage.getItem("liked"));
}

const likePost = async (postId = 0, target = null) => {
  // First render
  if (target === null) {
    if (liked.length > 0) {
      const btnLikes = document.querySelectorAll(".btn_like");
      console.log(btnLikes);
      btnLikes.forEach((btn) => {
        console.log(parseInt(btn.getAttribute("data-id")));
        if (liked.includes(parseInt(btn.getAttribute("data-id")))) {
          btn.classList.add("liked");
        }
      });
    }
  } else {
    // Click after render
    if (!liked.includes(postId)) {
      // Save to local storage
      liked.push(postId);
      localStorage.setItem("liked", JSON.stringify(liked));

      // Update database
      const url = "app/api/likepost.php";
      const data = {
        postId: postId,
      };

      const res = await fetch(url, {
        headers: {
          "Content-Type": "application/json",
        },
        method: "POST",
        body: JSON.stringify(data),
      });

      const result = await res.json();
      console.log(result);

      target.querySelector(".likes").textContent = result.likes;

      target.classList.add("liked");
    }
  }
};

export { likePost, liked };
