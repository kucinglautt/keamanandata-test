<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi Kota Kendari</title>
    <link rel="stylesheet" href="<?= base_url('CSS/stylelgn.css'); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <img src="<?= base_url('image/Evotkom.png'); ?>" alt="Gambar Samping Login" class="login-image">
    <h4>Connect Together</h4>

    <div class="wrapper">
        <form action="<?= site_url('auth/loginProcess') ?>"  method="post"> <!-- Ganti dengan URL yang sesuai -->
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Masukkan NIM" required> <!-- Ganti type menjadi text -->
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Masukkan Password" required>
                <i class='bx bx-lock'></i> <!-- Tambahkan ikon untuk password -->
            </div>
          
            <button type="submit" class="btn">Masuk</button>
        </form>
    </div>
</body>
</html>