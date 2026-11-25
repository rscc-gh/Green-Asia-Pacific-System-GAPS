
document.addEventListener("DOMContentLoaded", function () {

    const message = document.getElementById("notifyMessage");
    const count = document.getElementById("notifyCount");
    const max = message.getAttribute("maxlength") || 255;

    function updateCount() {
        count.textContent = message.value.length + " / " + max;
    }

    message.addEventListener("input", updateCount);

    updateCount();
});
