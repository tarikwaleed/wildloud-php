// start progress bar
const progressContainer = document.getElementById("myProgress"),
    bar = document.getElementById("myBar"),
    progress = bar.dataset.watch,
    p = document.getElementById("p"),
    dollarImg = document.getElementById("dollarImg");
if (progress > 5) {
    dollarImg.style.left = `${progress - 4}%`;
}
if (progress == 0) {
    progressContainer.style.display = "none";
    dollarImg.style.display = "none";
} else {
    p.style.display = "none";
    if (progress >= 50 && progress != 100) {
        bar.style.cssText = `background-color:#28a745; width:${progress}%`;
    } else if (progress == 100) {
        p.style.display = "block";
        bar.style.display = "none";
        dollarImg.style.display = "none";
    } else {
        bar.style.cssText = `width:${progress}%`;
    }
}
