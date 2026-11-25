// My Rewards Created page scripts go here.
document.addEventListener("DOMContentLoaded", function () {

    const search = document.getElementById("rewardSearch");
    const status = document.getElementById("rewardStatus");
    const reset = document.getElementById("rewardReset");
    const body = document.getElementById("rewardBody");

    function getRows() {
        return Array.from(body.querySelectorAll("tr.data-row"));
    }

    function applyFilters() {
        const term = search.value.trim().toLowerCase();
        const pick = status.value;
        const rows = getRows();

        rows.forEach(function (row) {
            const matchesText = !term || row.textContent.toLowerCase().indexOf(term) !== -1;
            const matchesStatus = !pick || row.dataset.status === pick;
            row.hidden = !(matchesText && matchesStatus);
        });

        const empty = body.querySelector(".no-results");
        const visible = rows.filter(function (row) { return !row.hidden; }).length;

        if (empty) {
            empty.hidden = visible > 0 || rows.length === 0;
        }
    }

    search.addEventListener("input", applyFilters);
    status.addEventListener("change", applyFilters);

    reset.addEventListener("click", function () {
        search.value = "";
        status.value = "";
        applyFilters();
    });

    // Pagination stubs
    document.querySelectorAll(".pager-btn").forEach(function (button) {
        button.addEventListener("click", function () {
            if (!button.textContent.trim().match(/^\d+$/)) {
                return;
            }

            document.querySelectorAll(".pager-btn").forEach(function (other) {
                other.classList.remove("is-current");
            });

            button.classList.add("is-current");
        });
    });

    applyFilters();
});
