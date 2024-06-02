<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Booking</title>
    <link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
</head>
<body>
    <div class="curved-box-title">ONLINE TICKET BOOKING</div>
    <div class="orangetext">Mau Download Ticket?</div>
    <a href="cektiketmasuk.php">Download disini</a>
    <div class="orangetext">Sudah Punya Tiket Masuk?</div>
    <a href="cektiketmasuk.php">Download disini</a>
    <!-- <div class='sekat'></div> -->

    <form id="booking-form" action="pilihpembayaran.php" method="POST">
        
        <a><div class="container">
            <div class="curved-box"> Langkah 1 :</div> 
            <div class="orangetext"> Tanggal Berkunjung*</div>
            </div>
        </a>
        <label></label>
        <input type="date" id="tanggal" name="tanggal" required><br>
        <div class='sekat'></div>
        <a><div class="container">
            <div class="curved-box"> Langkah 2 :</div> 
            <div class="orangetext">Ticket Masuk*</div>
        </div></a>
        <?php
        
        try {
            require_once "../base.php";
            $daftarticketmasuk = $db->prepare('SELECT * from ticket_masuk');
            $daftarticketmasuk->execute();
            $daftarticketmasuk = $daftarticketmasuk->fetchAll(PDO::FETCH_ASSOC);
            foreach ($daftarticketmasuk as $obj) {
                echo "<button type='button' class='tombol-ticket' data-jenis='{$obj['jenis']}' data-harga='{$obj['harga']}'>{$obj['jenis']}</button>";
            }
        } catch (PDOException $e) {
            echo "Connecting Failed" . $e->getMessage();
        }
        ?>
        
        <div id="detail-tiket"></div>
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
        <div class="container">
            <div class="curved-box">Langkah 4 :</div>
            <div class="orangetext"> Isi Data Anda</div>
        </div>

        <div class="grid-container">
            <div class="subgrid">
                <div class="grid-item"><label for="nama">Nama*</label></div>
                <div class="grid-item"><label for="email"></label></div>

                <div class="grid-item"><input type="text" id="nama" name="nama" required></div>
            </div>

            <div class="subgrid">
                <div class="grid-item"><label for="email">Email*</label></div>
                <div class="grid-item"><label for="email"></label></div>

                <div class="grid-item"><input type="email" id="email" name="email" required></div>
            </div>

            <div class="subgrid">
                <div class="grid-item"><label for="nohp">No Hp*</label></div>
                <div class="grid-item"><label for="email"></label></div>
                <div class="grid-item"><input type="number" id="nohp" name="nohp" required></div>
            </div>
            <div class="subgrid">
                <div class="grid-item"><label for="alamat">Alamat*</label></div>
                <div class="grid-item"><label for="email"></label></div>
                <div class="grid-item"><textarea id="alamat" name="alamat" ></textarea><br><br></div>
            </div>
            <div class="subgrid">
                <div class="grid-item"><label for="kota">Kota*</label></div>
                <div class="grid-item"><label for="email"></label></div>
                <div class="grid-item"><input type="text" id="kota" name="kota" required><br></div>
            </div>
        </div>
        <div class='sekat'></div>
        <div class="btn-submit-container"><div class="btn-submit"><input type="submit" id="pesan" name="pesan" value="BOOKING"></div></div>
    </form>

    <script>
        let totalKeseluruhan = 0;
        let permainanDiklik = false;

        document.querySelectorAll('.tombol-ticket').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault();
                const jenis = item.getAttribute('data-jenis');
                const harga = parseInt(item.getAttribute('data-harga'));

                if (!document.getElementById(`tiket-${jenis}`)) {
                    const div = document.createElement('div');
                    div.id = `tiket-${jenis}`;
                    div.innerHTML = `
                        <div class="text-box">
                            <div class="text-item">${jenis}</div>
                            <div class="text-item">${harga}</div>
                            <button type="button" class="btn-minus" data-jenis="${jenis}" data-harga="${harga}">-</button>
                            <input type="number" name="${jenis}" id="${jenis}" value="1" min="1" readonly>
                            <button type="button" class="btn-plus" data-jenis="${jenis}" data-harga="${harga}">+</button>
                            <div class="text-item"><span id="subtotal_${jenis}">${harga}</span></div>
                            <button type="button" class="hapus-tiket" data-jenis="${jenis}">Hapus</button>
                        </div>
                    `;
                    document.getElementById('detail-tiket').appendChild(div);

                    totalKeseluruhan += harga;
                    document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');

                    document.querySelector(`#tiket-${jenis} .btn-plus`).addEventListener('click', (event) => {
                        event.preventDefault();
                        let jumlah = parseInt(document.getElementById(jenis).value);
                        jumlah++;
                        document.getElementById(jenis).value = jumlah;
                        const subtotal = harga * jumlah;
                        document.getElementById(`subtotal_${jenis}`).textContent = subtotal;
                        totalKeseluruhan += harga;
                        document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');
                    });

                    document.querySelector(`#tiket-${jenis} .btn-minus`).addEventListener('click', (event) => {
                        event.preventDefault();
                        let jumlah = parseInt(document.getElementById(jenis).value);
                        if (jumlah > 1) {
                            jumlah--;
                            document.getElementById(jenis).value = jumlah;
                            const subtotal = harga * jumlah;
                            document.getElementById(`subtotal_${jenis}`).textContent = subtotal;
                            totalKeseluruhan -= harga;
                            document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');
                        }
                    });

                    document.querySelector(`#tiket-${jenis} .hapus-tiket`).addEventListener('click', (event) => {
                        event.preventDefault();
                        const subtotal = parseInt(document.getElementById(`subtotal_${jenis}`).textContent);
                        document.getElementById(`tiket-${jenis}`).remove();
                        totalKeseluruhan -= subtotal;
                        document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');
                    });
                }
            });
        });

        
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
            if (!document.querySelector('#detail-tiket > div')) {
                event.preventDefault();
                alert('Anda harus memesan setidaknya satu tiket masuk stadion.');
            }
        });
    </script>
</body>
</html>
