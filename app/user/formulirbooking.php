<a>Sudah punya tiket?</a><br>
<a href="https://siakad.trunojoyo.ac.id/">Download disini</a>

<form id="booking-form" action="pilihpembayaran.php" method="POST">
    <a>Langkah 1 : Pilih Tanggal Berkunjung</a><br>
    <label>Tanggal Berkunjung* :</label><br>
    <input type="date" id="tanggal" name="tanggal" required><br>
    
    <a>Langkah 2 : Ticket Masuk</a><br>
    <label>Ticket masuk wisata* :</label><br>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=wisatastadionbangkalan", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
    
    <a>Langkah 3 : Pilih Permainan</a><br>
    <label>Ticket Permainan:</label><br>
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
    <div>Total: <span id="total-keseluruhan">0</span></div>
    
    <a>Langkah 4 : Isi Data Anda</a><br>
    <label for="nama">Nama* :</label>
    <input type="text" id="nama" name="nama" required><br>
    <label for="email">Email* :</label>
    <input type="email" id="email" name="email" required><br>
    <label for="nohp">No Whatsapp Aktif* :</label>
    <input type="number" id="nohp" name="nohp" required><br>
    <label for="alamat">Alamat* :</label>
    <textarea id="alamat" name="alamat" ></textarea><br><br>

    <label for="kota">Kota* :</label>
    <input type="text" id="kota" name="kota" required><br>

    <input type="submit" id="pesan" name="pesan">
</form>

<script>
    let totalKeseluruhan = 0;

    document.querySelectorAll('.tombol-ticket').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            const jenis = item.getAttribute('data-jenis');
            const harga = parseInt(item.getAttribute('data-harga'));

            if (!document.getElementById(`tiket-${jenis}`)) {
                const div = document.createElement('div');
                div.id = `tiket-${jenis}`;
                div.innerHTML = `
                    <div>
                        <span>${jenis}</span>
                        <label>Jumlah:</label>
                        <button type="button" class="btn-minus" data-jenis="${jenis}" data-harga="${harga}">-</button>
                        <input type="number" name="${jenis}" id="${jenis}" value="1" min="1" readonly>
                        <button type="button" class="btn-plus" data-jenis="${jenis}" data-harga="${harga}">+</button>
                        <span>Subtotal: <span id="subtotal_${jenis}">${harga}</span></span>
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
                    totalKeseluruhan -= subtotal;
                    document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');
                    document.getElementById(`tiket-${jenis}`).remove();
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

            if (!document.getElementById(`permainan-${id}`)) {
                const div = document.createElement('div');
                div.id = `permainan-${id}`;
                div.innerHTML = `
                    <div>
                        <span>${jenis}</span>
                        <span>Harga: ${harga}</span>
                        <span>Durasi: ${durasi} menit</span>
                        <label>Jumlah:</label>
                        <button type="button" class="btn-minus-permainan" data-id="${id}" data-harga="${harga}">-</button>
                        <input type="number" name="${id}" id="${id}" value="1" min="1" readonly>
                        <button type="button" class="btn-plus-permainan" data-id="${id}" data-harga="${harga}">+</button>
                        <span>Subtotal: <span id="subtotal_${id}">${harga}</span></span>
                        <button type="button" class="hapus-permainan" data-id="${id}">Hapus</button>
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
