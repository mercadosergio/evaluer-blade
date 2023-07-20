const tabLinks = document.querySelectorAll(".TabsMenu a");
const tabPanels = document.querySelectorAll(".TabsPanel");

for (let el of tabLinks) {
    el.addEventListener("click", e => {
        e.preventDefault();

        document.querySelector(".TabsMenu li.active").classList.remove("active");
        document.querySelector(".TabsPanel.active").classList.remove("active");

        const parentListItem = el.parentElement;
        parentListItem.classList.add("active");
        const index = [...parentListItem.parentElement.children].indexOf(parentListItem);

        const panel = [...tabPanels].filter(el => el.getAttribute("data-index") == index);
        panel[0].classList.add("active");
    });
}