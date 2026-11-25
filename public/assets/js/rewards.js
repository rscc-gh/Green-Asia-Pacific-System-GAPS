document.addEventListener("DOMContentLoaded", function () {

    const toggleButtons = document.querySelectorAll(".view-toggle button");
    const rewardsContainer = document.querySelector(".rewards");

    toggleButtons.forEach(button => {

        button.addEventListener("click", function () {

            const selectedView = this.dataset.view;

            // Update active button
            toggleButtons.forEach(btn => {
                btn.classList.remove("active");
            });

            this.classList.add("active");

            // Update rewards layout
            rewardsContainer.classList.remove("list-view", "grid-view");
            rewardsContainer.classList.add(selectedView + "-view");

        });

    });

});





const modal = document.getElementById('modal');
const closeBtn = document.getElementById('closeBtn');
const redeemBtn = document.getElementById('redeemBtn'); // null for non-members

document.querySelectorAll('.reward-details').forEach(function (link) {
    link.addEventListener('click', function (e) {
        e.preventDefault();

        document.getElementById('modalImage').src = link.dataset.image;
        document.getElementById('modalTitle').textContent = link.dataset.title;
        document.getElementById('modalDiscount').textContent = link.dataset.discount;
        document.getElementById('modalRebate').textContent = link.dataset.rebate;
        document.getElementById('modalPoints').textContent = link.dataset.points;
        document.getElementById('modalExpiry').textContent = link.dataset.expiry_date;
        document.getElementById('modalTerms').textContent = link.dataset.terms;

        if (redeemBtn) {
            document.getElementById('modalRewardId').value = link.dataset.id;

            // Disable if not enough points
            redeemBtn.disabled = userPoints < Number(link.dataset.points);
        }

        modal.classList.add('open');
    });
});

closeBtn.addEventListener('click', function () {
    modal.classList.remove('open');
});