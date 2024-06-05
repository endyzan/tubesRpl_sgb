<?php
session_start();
include './../base.php';

// jumlah pengunjung 2023
$monthQuery2023 = "SELECT MONTH(tanggal) as month, COUNT(*) as count FROM pemesanan_ticketh WHERE YEAR(tanggal) = 2023 GROUP BY MONTH(tanggal)";
$monthResult2023 = $db->query($monthQuery2023);
$months2023 = [];
while ($row = $monthResult2023->fetch(PDO::FETCH_ASSOC)) {
    $months2023[] = $row;
}

// jumlah pengunjung 2024
$monthQuery2024 = "SELECT MONTH(tanggal) as month, COUNT(*) as count FROM pemesanan_ticketh WHERE YEAR(tanggal) = 2024 GROUP BY MONTH(tanggal)";
$monthResult2024 = $db->query($monthQuery2024);
$months2024 = [];
while ($row = $monthResult2024->fetch(PDO::FETCH_ASSOC)) {
    $months2024[] = $row;
}

// sebaran kota 2023
$cityQuery2023 = "SELECT p.kota, COUNT(*) as count FROM pemesanan_ticketh pt JOIN pembeli p ON pt.id_pembeli = p.id_pembeli WHERE YEAR(pt.tanggal) = 2023 GROUP BY p.kota";
$cityResult2023 = $db->query($cityQuery2023);
$cities2023 = [];
while ($row = $cityResult2023->fetch(PDO::FETCH_ASSOC)) {
    $cities2023[] = $row;
}

// sebaran kota 2024
$cityQuery2024 = "SELECT p.kota, COUNT(*) as count FROM pemesanan_ticketh pt JOIN pembeli p ON pt.id_pembeli = p.id_pembeli WHERE YEAR(pt.tanggal) = 2024 GROUP BY p.kota";
$cityResult2024 = $db->query($cityQuery2024);
$cities2024 = [];
while ($row = $cityResult2024->fetch(PDO::FETCH_ASSOC)) {
    $cities2024[] = $row;
}

// PDO does not have a close method like MySQLi, it closes the connection automatically when the object is destroyed.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Data Pengunjung</title>
    <link rel="stylesheet" href="../../asset/css/admdashboard.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="wrapper">
        <?php include './template/sidebar.php'; ?>

        <button id="sidebarToggleOutside" class="outside hidden">
            <div class="manual-list-icon">
                <span></span>
            </div>
        </button>

        <div id="content">
            <?php include './template/navbar.php'; ?>

            <div class="main-content">
                <h2>Data Pengunjung</h2>
                
                <div class="filter-buttons">
                    <button id="btn2023" class="filter-button">
                        <i class="bi bi-people-fill icon-people-dpsatu"></i>
                        <div class="ic-pdpsatu">
                            <h3>Data Pengunjung Tahun 2023</h3>
                        </div>
                    </button>
                    <button id="btn2024" class="filter-button">
                        <i class="bi bi-people-fill icon-people-dpdua"></i>
                        <div class="ic-pdpdua">
                            <h3>Data Pengunjung Tahun 2024</h3>
                        </div>
                    </button>
                </div>

                <div class="chart-container"> <!-- jumlah pengunjung -->
                    <canvas id="monthChart"></canvas>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="chart-container"> <!-- sebaran kota -->
                    <canvas id="cityChart"></canvas>
                </div>

                <div class="leaderboard-container">
                    <div>
                        <button class="sort-button" onclick="sortLeaderboard('asc')">Paling Sedikit</button>
                        <button class="sort-button" onclick="sortLeaderboard('desc')">Paling Banyak</button>
                    </div>
                    <table class="leaderboard-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kota</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody id="leaderboardBody">
                            <!-- Data for leaderboard will be inserted dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../../other/admin/script.js"></script>

    <script>
        const monthData2023 = <?php echo json_encode($months2023); ?>;
        const monthData2024 = <?php echo json_encode($months2024); ?>;
        const cityData2023 = <?php echo json_encode($cities2023); ?>;
        const cityData2024 = <?php echo json_encode($cities2024); ?>;

        const monthLabels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        function updateChartData(year) {
            // Update month chart
            const monthCounts = Array(12).fill(0);
            const monthData = year === 2023 ? monthData2023 : monthData2024;
            monthData.forEach(month => {
                monthCounts[month.month - 1] = month.count;
            });
            monthChart.data.datasets[0].data = monthCounts;
            monthChart.options.plugins.title.text = `Jumlah Pengunjung Stadion Gelora Bangkalan Tahun ${year}`;
            monthChart.update();

            // Update city chart
            const cityData = year === 2023 ? cityData2023 : cityData2024;
            const cityLabels = cityData.map(city => city.kota);
            const cityCounts = cityData.map(city => city.count);    

            cityChart.data.labels = cityLabels;
            cityChart.data.datasets[0].data = cityCounts;
            cityChart.options.plugins.title.text = `Sebaran Pengunjung Berdasarkan Kota Tahun ${year}`;
            cityChart.update();

            // Update leaderboard
            const leaderboardBody = document.getElementById('leaderboardBody');
            leaderboardBody.innerHTML = '';
            cityData.forEach((city, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `<td>${index + 1}</td><td>${city.kota}</td><td>${city.count}</td>`;
                leaderboardBody.appendChild(row);
            });
        }

        document.getElementById('btn2023').addEventListener('click', () => updateChartData(2023));
        document.getElementById('btn2024').addEventListener('click', () => updateChartData(2024));

        const ctxMonth = document.getElementById('monthChart').getContext('2d');
        const monthChart = new Chart(ctxMonth, {
            type: 'bar',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: [], // Initialized with empty data
                    backgroundColor: 'rgba(255, 165, 0, 0.6)', // oren
                    borderColor: 'rgba(255, 165, 0, 1)', // oren gelap
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Pengunjung'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Jumlah Pengunjung Stadion Gelora Bangkalan Tahun 2024'
                    }
                }
            }
        });

        const ctxCity = document.getElementById('cityChart').getContext('2d');
        const cityChart = new Chart(ctxCity, {
            type: 'bar',
            data: {
                labels: [], // Initialized with empty data
                datasets: [{
                    label: 'Sebaran Pengunjung',
                    data: [], // Initialized with empty data
                    backgroundColor: 'rgba(0, 255, 255, 0.6)', // biru
                    borderColor: 'rgba(0, 255, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Pengunjung'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Sebaran Pengunjung Berdasarkan Kota Tahun 2024'
                    }
                }
            }
        });

        // Set initial data to 2024
        updateChartData(2024);

        function sortLeaderboard(order) {
            const tbody = document.getElementById('leaderboardBody');
            const rows = Array.from(tbody.querySelectorAll('tr'));
            rows.sort((a, b) => {
                const aCount = parseInt(a.cells[2].innerText);
                const bCount = parseInt(b.cells[2].innerText);
                return order === 'asc' ? aCount - bCount : bCount - aCount;
            });
            rows.forEach(row => tbody.appendChild(row));
        }
    </script>

</body>
</html>

