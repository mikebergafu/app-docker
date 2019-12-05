<script>
    if ($('#total_subscribers').length) {
        var ctx = document.getElementById("total_subscribers").getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: ["Monday", "Tueday", "Wednesday", "Thurday", "Friday", "Saturday", "Sunday"],
                datasets: [{
                    label: "Sales",
                    data: [250, 320, 380, 330, 420, 250, 180],
                    backgroundColor: [
                        '#00783b',
                        '#ffcc33',
                        '#00783b',
                        '#ffcc33',
                        '#00783b',
                        '#ffcc33',
                        '#00783b'

                    ]
                }]
            },
            // Configuration options go here
            options: {
                legend: {
                    display: false
                },
                animation: {
                    easing: "easeInOutBack"
                },
                scales: {
                    yAxes: [{
                        display: !1,
                        ticks: {
                            fontColor: "#cccccc",
                            beginAtZero: !0,
                            padding: 0
                        },
                        gridLines: {
                            zeroLineColor: "transparent"
                        }
                    }],
                    xAxes: [{
                        display: !1,
                        gridLines: {
                            zeroLineColor: "transparent",
                            display: !1
                        },
                        ticks: {
                            beginAtZero: !0,
                            padding: 0,
                            fontColor: "#cccccc"
                        }
                    }]
                }
            }
        });
    }

</script>
