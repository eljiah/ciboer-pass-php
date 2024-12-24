<?php

include 'koneksi.php';

function cekUser($username, $password) {
    // Koneksi ke database
    global $db;
   
    if ($db->connect_error) {
        return ["status" => false, "pesan" => "Koneksi gagal: " . $db->connect_error];
    }

    // Validasi input
    if (empty($username) || empty($password)) {
        return ["status" => false, "pesan" => "Username atau password tidak boleh kosong."];
    }

    // Query untuk mengecek kredensial
    $sql = "SELECT id, password, nama FROM users WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $stmt->close();
            $db->close();
            return ["status" => true, "user_id" => $user['id'], "nama" => $user['nama']];
        } else {
            $stmt->close();
            $db->close();
            return ["status" => false, "pesan" => "Password salah."];
        }
    } else {
        $stmt->close();
        $db->close();
        return ["status" => false, "pesan" => "Username tidak ditemukan."];
    }
}

function daftarUser($username, $password, $nama, $alamat, $no_hp) {
    global $db;
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // Query untuk menyimpan user baru
    $sql = "INSERT INTO users (username, password, nama, alamat, no_hp) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssss", $username, $password, $nama, $alamat, $no_hp);
    
    if($stmt->execute()) {
        $stmt->close();
        return ["status" => true, "pesan" => "Pendaftaran berhasil! Silakan login."];
    } else {
        $stmt->close(); 
        return ["status" => false, "pesan" => "Gagal mendaftar. Silakan coba lagi."];
    }
}

function getUserData($user_id) {
    global $db;
    $sql = "SELECT nama, no_hp FROM users WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getPemesananData($user_id) {
    global $db;
    
    $sql = "SELECT p.id, p.user_id, p.nama, p.no_handphone, p.tanggal_kunjungan, 
            p.durasi_kunjungan, p.paket, p.kode_kupon, p.harga_paket, p.total_harga, p.created_at
            FROM pemesanan p 
            WHERE p.user_id = ?
            ORDER BY p.created_at DESC";

    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $pemesanan = [];
    while($row = $result->fetch_assoc()) {
        $pemesanan[] = $row;
    }
    
    return $pemesanan;
}

function simpanPemesanan($data) {
    global $db; 
    session_start();
    
    // Validasi session
    if(!isset($_SESSION['user_id'])) {
        return [
            'status' => false,
            'pesan' => 'Sesi login tidak valid. Silakan login kembali.'
        ];
    }
    
    // Ambil data form
    $user_id = $_SESSION['user_id'];
    $nama = $data['nama_pemesanan'];
    $hp = $data['hp_pemesan']; 
    $tgl = $data['waktu_wisata'];
    $durasi = (int) $data['hari_wisata'];
    $peserta = (int) $data['jumlah_peserta'];
    $kupon = isset($data['kupon']) ? trim($data['kupon']) : '';

    // Hitung paket
    $paket_inap = isset($data['paket_inap']) ? 1000000 * $durasi : 0;
    $paket_transport = isset($data['paket_transport']) ? 1200000 * $durasi : 0; 
    $paket_makan = isset($data['paket_makan']) ? 500000 * $durasi * $peserta : 0;

    $total = $paket_inap + $paket_transport + $paket_makan;

    // Hitung diskon
    $diskon = 0;
    if($kupon) {
        switch($kupon) {
            case 'WEEKDAY25': $diskon = 0.25; break;
            case 'GROUP15': if($peserta >= 8) $diskon = 0.15; break;
            case 'STAY20': if($durasi >= 3) $diskon = 0.20; break;
            case 'FIRST10': $diskon = 0.10; break;
        }
    }

    $total_akhir = $total - ($total * $diskon);

    // Simpan ke database
    $paket = (isset($data['paket_inap']) ? 1 : 0) + 
             (isset($data['paket_transport']) ? 2 : 0) + 
             (isset($data['paket_makan']) ? 4 : 0);

    $sql = "INSERT INTO pemesanan (user_id, nama, no_handphone, tanggal_kunjungan, durasi_kunjungan, paket, kode_kupon, harga_paket, total_harga) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("issssisdd", $user_id, $nama, $hp, $tgl, $durasi, $paket, $kupon, $total, $total_akhir);
    $result = $stmt->execute();
    $stmt->close();
    
    return [
        'status' => $result,
        'data' => [
            'nama' => $nama,
            'hp' => $hp,
            'tgl' => $tgl,
            'durasi' => $durasi,
            'peserta' => $peserta,
            'total' => $total,
            'diskon' => $diskon,
            'total_akhir' => $total_akhir
        ]
    ];
}

function formatTanggalIndonesia($tanggal) {
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret', 
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $split = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    return $tgl_indo;
}


function hapusPemesanan($id_pemesanan) {
    global $db;
    
    // Validasi id pemesanan
    $id_pemesanan = (int)$id_pemesanan;
    
    // Persiapkan query untuk soft delete
    $sql = "DELETE FROM pemesanan WHERE id = ?";
    
    // Siapkan dan jalankan prepared statement
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id_pemesanan);
    $result = $stmt->execute();
    $stmt->close();
    
    return $result;
}
