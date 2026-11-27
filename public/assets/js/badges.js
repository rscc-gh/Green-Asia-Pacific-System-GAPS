function toggleInfo(button) {

    const popup = button.nextElementSibling;

    // Close other open popups
    document.querySelectorAll(".info-popup").forEach(info => {
        if (info !== popup) {
            info.classList.remove("show");
        }
    });

    // Toggle selected popup
    popup.classList.toggle("show");
}


// Close popup when clicking outside
document.addEventListener("click", function (event) {

    if (!event.target.closest(".info-wrapper")) {

        document.querySelectorAll(".info-popup").forEach(info => {
            info.classList.remove("show");
        });

    }

});






function showBadgeDetails(event, element) {

    event.preventDefault();

    // Retrieve badge information
    const name = element.dataset.name;
    const events = parseInt(element.dataset.events);
    const goals = parseInt(element.dataset.goals);
    const streak = parseInt(element.dataset.streak);

    let requirement = "";

    // Determine badge requirement
    if (events > 0) {

        requirement = `Participate in ${events} event${events > 1 ? "s" : ""} to earn this badge.`;

    }
    else if (goals > 0) {

        requirement = `Complete ${goals} goal${goals > 1 ? "s" : ""} to earn this badge.`;

    }
    else if (streak > 0) {

        requirement = `Maintain a ${streak}-day streak to earn this badge.`;

    }

    // Update modal content
    document.getElementById("modalBadgeName").textContent = name;

    document.getElementById("modalBadgeRequirement").textContent = requirement;

    // Display modal
    document.getElementById("badgeModal").style.display = "flex";
}


function closeBadgeDetails() {

    document.getElementById("badgeModal").style.display = "none";

}


// Close modal when clicking outside
window.addEventListener("click", function (event) {

    const modal = document.getElementById("badgeModal");

    if (event.target === modal) {
        closeBadgeDetails();
    }

});
