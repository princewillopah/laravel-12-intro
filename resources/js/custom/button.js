// resources/js/custom.js

document.addEventListener("DOMContentLoaded", function () {
    console.log("Custom JS is loaded!");

    // Example: Change background color on button click
    const btn = document.getElementById("testButton");
    if (btn) {
        btn.addEventListener("click", function () {
            document.body.style.backgroundColor = "#ffeb3b"; // Yellow
            alert("Button clicked! Custom JS is working!");
        });
    }
})