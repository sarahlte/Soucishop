document.addEventListener("DOMContentLoaded", function () {
    let carousels = document.querySelectorAll(".carousel");
    
    carousels.forEach((carousel) => {
        let items = carousel.querySelectorAll(".item");

        function showItem(index) {
            items.forEach((item, idx) => {
                item.classList.remove("active");
                if (idx === index) {
                    item.classList.add("active");
                }
            });
        }

        carousel.closest(".hp-card").querySelector(".prev").addEventListener("click", () => {
            let index = [...items].findIndex((item) =>
                item.classList.contains("active")
            );
            showItem((index - 1 + items.length) % items.length);
        });

        carousel.closest(".hp-card").querySelector(".next").addEventListener("click", () => {
            let index = [...items].findIndex((item) =>
                item.classList.contains("active")
            );
            showItem((index + 1) % items.length);
        });
    });
});
