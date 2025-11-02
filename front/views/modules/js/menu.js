const button_close_menu = document.getElementById("close_menu");
const button_open_menu = document.getElementById("button_open_menu");
const subcapa_menu = document.getElementById("subcapa_menu");
const menu = document.getElementById("menu");
let opened = false;

button_open_menu.addEventListener("click", () => {
  if (!opened) {
    subcapa_menu.classList.remove("close");
    menu.classList.remove("closed");
    menu.classList.add("opened");
    opened = true;
  }
});

button_close_menu.addEventListener("click", () => {
  if (opened) {
    subcapa_menu.classList.add("close");
    menu.classList.remove("opened");
    menu.classList.add("closed");
    opened = false;
  }
});
subcapa_menu.addEventListener("click", (e) => {
  if (e.target.id == "subcapa_menu" && opened) {
    subcapa_menu.classList.add("close");
    menu.classList.remove("opened");
    menu.classList.add("closed");
    opened = false;
  }
});
