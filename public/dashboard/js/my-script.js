const htmlTag = document.getElementsByTagName("HTML")[0];
var r = document.querySelector(":root");

const darkModeBtn = document.querySelector(".light-dark-mode");
let activeColor = getComputedStyle(r).getPropertyValue("--pagination-color");

function darkModeCheck() {
    if (
        htmlTag.hasAttribute("data-layout-mode") &&
        "dark" == htmlTag.getAttribute("data-layout-mode")
    ) {
        // console.log(activeColor);
        if (activeColor = "black") {
            r.style.setProperty("--pagination-color", "white");
            console.log("check");
        }
    }
}
darkModeCheck();

darkModeBtn.addEventListener("click", function () {
    if (
        htmlTag.hasAttribute("data-layout-mode") &&
        "dark" == htmlTag.getAttribute("data-layout-mode")
    ) {
        r.style.setProperty("--pagination-color", "white");
    } else {
        r.style.setProperty("--pagination-color", "black");
    }
},false);
