
const postStats = {
    totalPosts: 148,
    totalComments: 392,
    reportedPosts: 17,
    userComments: 96
};

const chartData = [
    { label: "Mon", value: 8 },
    { label: "Tue", value: 14 },
    { label: "Wed", value: 21 },
    { label: "Thu", value: 12 },
    { label: "Fri", value: 17 },
    { label: "Sat", value: 6 },
    { label: "Sun", value: 16 }
];

document.addEventListener("DOMContentLoaded", function () {

    // Summary cards
    document.getElementById("totalPosts").textContent = postStats.totalPosts;
    document.getElementById("totalComments").textContent = postStats.totalComments;
    document.getElementById("reportedPosts").textContent = postStats.reportedPosts;
    document.getElementById("userComments").textContent = postStats.userComments;

    // Bar chart
    const chart = document.getElementById("postChart");
    const highest = Math.max.apply(null, chartData.map(function (item) {
        return item.value;
    }));

    chartData.forEach(function (item) {

        const height = highest > 0 ? (item.value / highest) * 100 : 0;

        const col = document.createElement("div");
        col.className = "bar-col";

        col.innerHTML =
            '<span class="bar-value">' + item.value + '</span>' +
            '<div class="bar" style="height:' + height + '%"></div>' +
            '<span class="bar-label">' + item.label + '</span>';

        chart.appendChild(col);
    });

});
