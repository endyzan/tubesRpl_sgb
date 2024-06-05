<?php
session_start();
include './../base.php';

// Query Pendapatan Bulanan
$monthQuery = "SELECT YEAR(tanggal) as year, MONTH(tanggal) as month, SUM(total_tagihan) as total FROM pemesanan_ticketh WHERE status = '1' GROUP BY YEAR(tanggal), MONTH(tanggal)";
$monthResult = $db->query($monthQuery);
$monthlyData = [];
while ($row = $monthResult->fetch(PDO::FETCH_ASSOC)) {
    $monthlyData[] = $row;
}

// Query Pendapatan Tahunan
$yearQuery = "SELECT YEAR(tanggal) as year, SUM(total_tagihan) as total FROM pemesanan_ticketh WHERE status = '1' GROUP BY YEAR(tanggal)";
$yearResult = $db->query($yearQuery);
$yearlyData = [];
while ($row = $yearResult->fetch(PDO::FETCH_ASSOC)) {
    $yearlyData[] = $row;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Laporan Pendapatan</title>
    <link rel="stylesheet" href="../../asset/css/admdashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Tambahkan gaya untuk pop-up */
        .popup {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .popup-content button {
            margin: 5px;
        }
    </style>
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
                <h2>Laporan Pendapatan</h2>
                
                <div class="filter-buttons">
                    <button id="filterYearBtn" class="filter-button" onclick="showYearPopup()">
                        <i class="bi bi-calendar"></i> Laporan Pendapatan per Bulan
                    </button>
                    <button id="sortMonthBtn" class="filter-button" onclick="showSortPopup()">
                        <i class="bi bi-sort-alpha-down"></i> Urutkan Pendapatan per Bulan
                    </button>
                </div>

                <div class="chart-container">
                    <canvas id="monthlyChart"></canvas>
                </div>
                <div class="chart-container">
                    <canvas id="yearlyChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop-up untuk memilih tahun -->
    <div id="yearPopup" class="popup">
        <div class="popup-content">
            <h3>Pilih Tahun</h3>
            <button onclick="updateMonthlyChart(2022)">2022</button>
            <button onclick="updateMonthlyChart(2023)">2023</button>
            <button onclick="updateMonthlyChart(2024)">2024</button>
            <button onclick="closePopup('yearPopup')">Tutup</button>
        </div>
    </div>

    <!-- Pop-up untuk mengurutkan pendapatan -->
    <div id="sortPopup" class="popup">
        <div class="popup-content">
            <h3>Urutkan Pendapatan</h3>
            <button onclick="sortMonthlyChart('desc')">Tertinggi</button>
            <button onclick="sortMonthlyChart('asc')">Terendah</button>
            <button onclick="closePopup('sortPopup')">Tutup</button>
        </div>
    </div>

    <script>
        const monthlyData = <?php echo json_encode($monthlyData); ?>;
        const yearlyData = <?php echo json_encode($yearlyData); ?>;

        const monthLabels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        const monthlyChartData = {};
        monthlyData.forEach(data => {
            if (!monthlyChartData[data.year]) {
                monthlyChartData[data.year] = Array(12).fill(0);
            }
            monthlyChartData[data.year][data.month - 1] = data.total;
        });

        const monthlyDatasets = Object.keys(monthlyChartData).map(year => ({
            label: `Pendapatan Bulanan ${year}`,
            data: monthlyChartData[year],
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }));

        const monthlyChart = new Chart(document.getElementById('monthlyChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: monthLabels,
                datasets: monthlyDatasets
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Pendapatan'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Pendapatan Bulanan'
                    }
                }
            }
        });

        const yearlyChart = new Chart(document.getElementById('yearlyChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: yearlyData.map(d => d.year),
                datasets: [{
                    label: 'Pendapatan Tahunan',
                    data: yearlyData.map(d => d.total),
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Pendapatan'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Pendapatan Tahunan'
                    }
                }
            }
        });

        function showYearPopup() {
            document.getElementById('yearPopup').style.display = 'flex';
        }

        function showSortPopup() {
            document.getElementById('sortPopup').style.display = 'flex';
        }

        function closePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
        }

        function updateMonthlyChart(year) {
            const monthCounts = Array(12).fill(0);
            if (monthlyChartData[year]) {
                monthlyChartData[year].forEach((total, index) => {
                    monthCounts[index] = total;
                });
            }
            monthlyChart.data.datasets = [{
                label: `Pendapatan Bulanan ${year}`,
                data: monthCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }];
            monthlyChart.options.plugins.title.text = `Pendapatan Bulanan ${year}`;
            monthlyChart.update();
            closePopup('yearPopup');
        }

        function sortMonthlyChart(order) {
            const currentYear = monthlyChart.data.datasets[0].label.split(' ')[2];
            const monthData = monthlyChartData[currentYear].map((total, index) => ({ month: monthLabels[index], total }));
            monthData.sort((a, b) => order === 'asc' ? a.total - b.total : b.total - a.total);

            monthlyChart.data.labels = monthData.map(data => data.month);
            monthlyChart.data.datasets[0].data = monthData.map(data => data.total);
            monthlyChart.update();
            closePopup('sortPopup');
        }
    </script>
</body>
</html>
