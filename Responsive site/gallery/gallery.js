let galleryImages = document.querySelectorAll(".gallery-img");
let getLatestOpenImg;
let windowWidth = window.innerWidth;
let windowHeight = window.innerHeight;

if (galleryImages) {
    galleryImages.forEach(function(image, index){
        image.onclick = function () {
            let getElementCss = window.getComputedStyle(image);
            let getFullImgUrl = getElementCss.getPropertyValue("background-image");
            let getImgUrlPosition = getFullImgUrl.split("/gallery/img/thumbs/");
            let setNewImgUrl = getImgUrlPosition[1].replace('")','');
            
            getLatestOpenImg = index + 1;
            let container = document.body;
            let newImgWindow = document.createElement("div");
            container.appendChild(newImgWindow);
            newImgWindow.setAttribute("class", "img-window");
            newImgWindow.setAttribute("onclick", "openImg()");

            let newImg = document.createElement("img");
            newImgWindow.appendChild(newImg);
            newImg.setAttribute("src", "gallery/img/" + setNewImgUrl);
            newImg.setAttribute("id", "current-img");

            newImg.onload = function () {
                let newPrevBtn = document.createElement("a");
                let prevBtnText = document.createTextNode("<");
                newPrevBtn.appendChild(prevBtnText);
                container.appendChild(newPrevBtn);
                newPrevBtn.setAttribute("class", "prev-img-btn");
                newPrevBtn.setAttribute("onclick", "changeImg(0)");
                newPrevBtn.style.cssText = "left: 3%";

                let newNextBtn = document.createElement("a");
                let nextBtnText = document.createTextNode(">");
                newNextBtn.appendChild(nextBtnText);
                container.appendChild(newNextBtn);
                newNextBtn.setAttribute("class", "next-img-btn");
                newNextBtn.setAttribute("onclick", "changeImg(1)");
                newNextBtn.style.cssText = "right: 3%";

                let newCloseBtn = document.createElement("a");
                let closeBtnText = document.createTextNode("x");
                newCloseBtn.appendChild(closeBtnText);
                container.appendChild(newCloseBtn);
                newCloseBtn.setAttribute("class", "close-img-btn");
                newCloseBtn.setAttribute("onclick", "closeImg()");
                newCloseBtn.style.cssText = "right: 3%";
            }
        }
    });
}

function openImg () {
    window.open("gallery/img/img" + getLatestOpenImg + ".jpg");
}

function closeImg () {
    document.querySelector(".img-window").remove();
    document.querySelector(".prev-img-btn").remove();
    document.querySelector(".next-img-btn").remove();
    document.querySelector(".close-img-btn").remove();
}

function changeImg (changeDir) {
    document.querySelector("#current-img").remove();

    let getImgWindow = document.querySelector(".img-window");
    let newImg = document.createElement("img");
    getImgWindow.appendChild(newImg);
    let calcNewImg;

    if (changeDir === 1) {
        calcNewImg = getLatestOpenImg + 1;
        if (calcNewImg > galleryImages.length) {
            calcNewImg = 1;
        }
    }    
    else if (changeDir === 0) {
        calcNewImg = getLatestOpenImg - 1;
        if (calcNewImg < 1) {
            calcNewImg = galleryImages.length;
        }
    }
    
    newImg.setAttribute("src", "gallery/img/img" + calcNewImg + ".jpg");
    newImg.setAttribute("id", "current-img");
    getLatestOpenImg = calcNewImg;
}