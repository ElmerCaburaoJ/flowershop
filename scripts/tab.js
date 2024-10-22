function showFeatured() {
    document.getElementById("featured-items").style.display = "grid";
    document.getElementById("best-seller-items").style.display = "none";
    setActiveTab("Featured Items");
}

function showBestSellers() {
    document.getElementById("featured-items").style.display = "none";
    document.getElementById("best-seller-items").style.display = "grid";
    setActiveTab("Best Seller Items");
}

function setActiveTab(tabName) {
    const tabs = document.querySelectorAll(".subtitle h2");
    tabs.forEach(tab => {
        if (tab.textContent === tabName) {
            tab.classList.add("active");
        } else {
            tab.classList.remove("active");
        }
    });
}
