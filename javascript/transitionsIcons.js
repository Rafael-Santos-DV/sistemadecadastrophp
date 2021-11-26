let icons = document.querySelectorAll("span.apagar-icons");
let t = document.querySelectorAll("td.td-class");
for (let i = 0; i < icons.length; i++) {
    icons[i].addEventListener("click", () => {
        t[i].style.opacity = "1";
    })
}