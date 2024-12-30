<?php 
session_start();

require '../functions/connect_database.php';
require '../functions/pasien_functions.php';

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        $username = $_POST["username"];

        $_SESSION["login"] = "true";
        $_SESSION["username"] = $username;
        
        echo "<script>
        alert('User baru berhasil ditambahkan!');
        </script>";
        header("Location: ../pages/pasien/dashboard_pasien.php?username=$username");
    } else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f7fa] min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-[#3498db] text-white py-5 shadow-md">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold">Poliklinik BK</h1>
            <p class="text-lg">Silakan daftar untuk membuat akun pasien dan nikmati kemudahan akses ke layanan kami.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 flex justify-center items-center py-10">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Registrasi Pasien</h1>
            <form action="" method="post" class="space-y-5">
                <div class="flex flex-col gap-4">
                    <input type="text" name="username" placeholder="Username" required
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-3 text-gray-700 outline-none focus:border-[#3498db]">

                    <input type="password" name="password" placeholder="Password" required
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-3 text-gray-700 outline-none focus:border-[#3498db]">

                    <input type="text" name="nama" placeholder="Nama" required
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-3 text-gray-700 outline-none focus:border-[#3498db]">

                    <input type="text" name="alamat" placeholder="Alamat" required
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-3 text-gray-700 outline-none focus:border-[#3498db]">

                    <input type="number" name="no_ktp" placeholder="Nomor KTP" required
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-3 text-gray-700 outline-none focus:border-[#3498db]">

                    <input type="number" name="no_hp" placeholder="Nomor HP" required
                        class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-3 text-gray-700 outline-none focus:border-[#3498db]">

                    <input type="hidden" name="role" value="pasien">
                </div>

                <button type="submit" name="register"
                    class="w-full bg-[#3498db] text-white py-3 rounded-lg font-medium hover:bg-[#2979b7] transition">Register</button>

                <div class="text-center">
                    <p class="text-gray-600">Sudah punya akun? <a href="login_pasien.php" class="text-[#3498db] font-medium">Login disini</a></p>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-5">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 Poliklinik BK.</p>
        </div>
    </footer>
</body>

</html>
