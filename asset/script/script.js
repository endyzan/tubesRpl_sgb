// ============ Js cart Gallery===============
document.querySelectorAll(".img-container img").forEach((Image) => {
    Image.onclick = () => {
        document.querySelector(".popup-img").style.display = "block";
        document.querySelector(".popup-img img").src = Image.getAttribute("src");
    };
});
document.querySelector(".popup-img span").onclick = () => {
    document.querySelector(".popup-img").style.display = "none";
};
// ============ Js cart Gallery End===============