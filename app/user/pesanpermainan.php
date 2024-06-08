<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Tiket Permainan</title>
    <link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
</head>
<body>
    <div class="curved-box-title">PEMESANAN TIKET PERMAINAN</div>
    
    <?php
    session_start();
    try {
        require_once "../base.php";

        // Fetch booking details
        $kodebooking = $_SESSION['kodebooking']; // Ganti dengan kodebooking yang sesuai
        $kodebookingbaru = $_SESSION['kodebooking']."A"; // Ganti dengan kodebooking yang sesuai
        $query = $db->prepare("SELECT kode_booking, tanggal FROM pemesanan_ticketH WHERE kode_booking = :kodebooking");
        $query->bindParam(':kodebooking', $kodebooking);
        $query->execute();
        $bookingDetails = $query->fetch(PDO::FETCH_ASSOC);

        if ($bookingDetails) {
            echo "<div class='booking-info'>
                    <p>Kode Booking: {$kodebookingbaru}</p>
                    <p>Tanggal Kunjungan: {$bookingDetails['tanggal']}</p>
                  </div>";
        } else {
            echo "<p>Kode booking tidak ditemukan.</p>";
        }
    } catch (PDOException $e) {
        echo "Connecting Failed: " . $e->getMessage();
    }
    var_dump($kodebooking);
    ?>

    <form id="booking-form" action="proses_permainan.php" method="POST">
        <input type="hidden" name="kodebookinglama" value="<?php echo $kodebooking; ?>">    
        <input type="hidden" name="kodebooking" value="<?php echo $kodebookingbaru; ?>">
        <input type="hidden" name="tanggal_kunjungan" value="<?php echo $bookingDetails['tanggal']; ?>">

        <div class='sekat'></div>
        <div class="container">
            <div class="curved-box">Langkah 3 :</div>  
            <div class="orangetext">Ticket Permainan:</div>
        </div>

        <?php
        $daftarpermainan = $db->prepare("SELECT * from permainan");
        $daftarpermainan->execute();
        $daftarpermainan = $daftarpermainan->fetchAll(PDO::FETCH_ASSOC);
        $c = 0;

        foreach ($daftarpermainan as $permainan) {
            echo "<button type='button' class='tombol-permainan' data-id='{$permainan['id_permainan']}' data-harga='{$permainan['harga']}' data-durasi='{$permainan['durasi']}'>{$permainan['nama_permainan']}</button>";
            if ($c == 2){
                echo "<br>";
            }
            $c += 1;
        }

        ?>
        
        <div id="detail-permainan"></div>

        <div class="text-box-white">
            <div class="text-item-white">Total: </div>
            <div class="text-item-white"><span id="total-keseluruhan">0</span></div>
        </div>
        <div class='sekat'></div>

        <div class="btn-submit-container">
            <div class="btn-submit"><input type="submit" id="pesan" name="pesan" value="PESAN"></div>
        </div>
    </form>

    <script>
        let totalKeseluruhan = 0;
        let permainanDiklik = false;

        document.querySelectorAll('.tombol-permainan').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault();
                const id = item.getAttribute('data-id');
                const harga = parseInt(item.getAttribute('data-harga'));
                const durasi = item.getAttribute('data-durasi');
                const jenis = item.textContent;

                if (!permainanDiklik) {
                    const headerDiv = document.createElement('div');
                    headerDiv.innerHTML = `
                        <div class="text-box-white">
                            <div class="text-item-white">PERMAINAN</div>
                            <div class="text-item-white">HARGA</div>
                            <div class="text-item-white">MENIT</div>
                            <div class="text-item-white">JUMLAH</div>
                            <div class="text-item-white">SUB TOTAL</div>
                            <div class="text-item-white"></div>
                        </div>
                    `;
                    document.getElementById('detail-permainan').appendChild(headerDiv);
                    permainanDiklik = true;
                }

                if (!document.getElementById(`permainan-${id}`)) {
                    const div = document.createElement('div');
                    div.id = `permainan-${id}`;
                    div.innerHTML = `
                        <div class="text-box">
                            <div class="text-item">${jenis}</div>
                            <div class="text-item">${harga}</div>
                            <div class="text-item">${durasi} menit</div>
                            <button type="button" class="btn-minus-permainan" data-id="${id}" data-harga="${harga}">-</button>
                            <div class="text-item"><input type="number" name="${id}" id="${id}" value="1" min="1" readonly></div>
                            <button type="button" class="btn-plus-permainan" data-id="${id}" data-harga="${harga}">+</button>
                            <div class="text-item"><span id="subtotal_${id}">${harga}</span></div>
                            <div class="text-item"><button type="button" class="hapus-permainan" data-id="${id}">Hapus</button></div>
                        </div>
                    `;
                    document.getElementById('detail-permainan').appendChild(div);

                    totalKeseluruhan += harga;
                    document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');

                    document.querySelector(`#permainan-${id} .btn-plus-permainan`).addEventListener('click', (event) => {
                        event.preventDefault();
                        let jumlah = parseInt(document.getElementById(id).value);
                        jumlah++;
                        document.getElementById(id).value = jumlah;
                        const subtotal = harga * jumlah;
                        document.getElementById(`subtotal_${id}`).textContent = subtotal;
                        totalKeseluruhan += harga;
                        document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');
                    });

                    document.querySelector(`#permainan-${id} .btn-minus-permainan`).addEventListener('click', (event) => {
                        event.preventDefault();
                        let jumlah = parseInt(document.getElementById(id).value);
                        if (jumlah > 1) {
                            jumlah--;
                            document.getElementById(id).value = jumlah;
                            const subtotal = harga * jumlah;
                            document.getElementById(`subtotal_${id}`).textContent = subtotal;
                            totalKeseluruhan -= harga;
                            document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');
                        }
                    });

                    document.querySelector(`#permainan-${id} .hapus-permainan`).addEventListener('click', (event) => {
                        event.preventDefault();
                        const subtotal = parseInt(document.getElementById(`subtotal_${id}`).textContent);
                        totalKeseluruhan -= subtotal;
                        document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');
                        document.getElementById(`permainan-${id}`).remove();
                    });
                }
            });
        });

        // Form validation to ensure at least one ticket is selected
        document.getElementById('booking-form').addEventListener('submit', function(event) {
            if (!document.querySelector('#detail-permainan > div')) {
                event.preventDefault();
                alert('Anda harus memesan setidaknya satu tiket permainan .');
            }
        });
    </script>
</body>
</html>
