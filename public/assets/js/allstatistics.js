// Charts are drawn here, not in PHP.
// Replace these sample figures with the real account counts later.
const roleData = [
    { label: "Admin", count: 2, color: "#23845b" },
    { label: "Moderator", count: 2, color: "#2f6fed" },
    { label: "Business", count: 2, color: "#e08a1e" },
    { label: "Member", count: 2, color: "#8b5cf6" }
];

const statusData = [
    { label: "Active", count: 8, color: "#23845b" }
];

document.addEventListener("DOMContentLoaded", function () {

    const roleTotal = roleData.reduce(function (sum, item) {
        return sum + item.count;
    }, 0);

    const activeTotal = statusData.reduce(function (sum, item) {
        return sum + item.count;
    }, 0);

    // Summary cards
    document.getElementById("totalAccounts").textContent = roleTotal;
    document.getElementById("activeAccounts").textContent = activeTotal;
    document.getElementById("inactiveAccounts").textContent = roleTotal - activeTotal;
    document.getElementById("roleTotal").textContent = roleData.length;
    document.getElementById("donutTotal").textContent = roleTotal;

    // Donut: one conic-gradient stop per role
    const donut = document.getElementById("roleChart");
    const legend = document.getElementById("roleLegend");

    let start = 0;

    const stops = roleData.map(function (item) {

        const size = roleTotal > 0 ? (item.count / roleTotal) * 100 : 0;
        const stop = item.color + " " + start + "% " + (start + size) + "%";

        start += size;

        return stop;
    });

    donut.style.background = roleTotal > 0
        ? "conic-gradient(" + stops.join(", ") + ")"
        : "#f1f5f9";

    roleData.forEach(function (item) {

        const percent = roleTotal > 0 ? Math.round((item.count / roleTotal) * 100) : 0;

        const row = document.createElement("li");

        row.innerHTML =
            '<span class="legend-dot" style="background:' + item.color + '"></span>' +
            '<span class="legend-name">' + item.label + '</span>' +
            '<span class="legend-count">' + item.count + '</span>' +
            '<span class="legend-percent">' + percent + '%</span>';

        legend.appendChild(row);
    });

    // Stacked bar: segments sized by count
    const stack = document.getElementById("statusChart");
    const chips = document.getElementById("statusLegend");

    statusData.forEach(function (item) {

        const segment = document.createElement("div");

        segment.className = "stack-seg";
        segment.style.flexGrow = item.count;
        segment.style.background = item.color;
        segment.textContent = item.count;

        stack.appendChild(segment);

        const percent = activeTotal > 0 ? Math.round((item.count / activeTotal) * 100) : 0;

        const chip = document.createElement("li");

        chip.innerHTML =
            '<span class="chip-dot" style="background:' + item.color + '"></span>' +
            '<span>' + item.label + '</span>' +
            '<strong>' + item.count + '</strong>' +
            '<span class="chip-percent">' + percent + '%</span>';

        chips.appendChild(chip);
    });

});
