<?php
if (!isset($_SESSION)) {
    session_start();
}

// include_once('../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = $mysqli->query($query);

    if (!$result) {
        die("Query error: " . $mysqli->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            $error = "Password salah";
        }
    } else {
        $error = "User tidak ditemukan";
    }
}
?>

<div class="h-[100vh] flex items-center justify-center bg-gradient-to-r from-blue-500 to-blue-700 relative overflow-hidden">
    <!-- Ilustrasi -->
    <div class="absolute top-0 left-0 w-full h-full opacity-20">
        <img src="https://source.unsplash.com/1600x900/?technology,abstract" alt="Background Illustration" class="w-full h-full object-cover">
    </div>

    <div class="login w-1/4 mx-auto bg-white p-8 rounded-lg shadow-lg relative z-10 animate-fade-in">
        <h1 class="text-2xl font-bold mb-5 text-blue-700 text-center">Login Admin</h1>

        <!-- Inputan -->
        <form method="POST" action="index.php?page=loginUser">
            <div class="flex flex-col gap-5">
                <!-- Set Errors -->
                <?php
                    if (isset($error)) {
                        echo '
                            <div id="alert" class="flex items-center p-4 mb-4 text-white rounded-lg bg-red-600" role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium">'
                                . $error . 
                                '</div>
                                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-500 text-red-700 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-400 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                </div>';
                    }
                ?>

                <!-- Input Username -->
                <div class="relative">
                    <input 
                        type="text" 
                        id="username" 
                        name="username"
                        class="block px-10 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-600 peer" 
                        placeholder=" " required/>
                    <label 
                        for="username" 
                        class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                            Username
                    </label>
                    <svg class="absolute left-3 top-4 w-5 h-5 text-gray-400 peer-focus:text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7m0 0H9m3 0h3" />
                    </svg>
                </div>
                
                <!-- Input Password -->
                <div class="relative">
                    <input 
                        type="password" 
                        name="password"
                        id="password" 
                        class="block px-10 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-600 peer" 
                        placeholder=" " required/>
                    <label 
                        for="password" 
                        class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                            Password
                    </label>
                    <svg class="absolute left-3 top-4 w-5 h-5 text-gray-400 peer-focus:text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7m0 0H9m3 0h3" />
                    </svg>
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white w-full rounded-lg py-2 font-semibold transition-transform transform hover:scale-105">Login</button> 

                <!-- Link Tambahan -->
                <div class="flex justify-center mt-4">
                    <p class="text-sm">Belum punya akun? <a href="index.php?page=registerUser"><span class="text-blue-600 font-semibold hover:underline">Register</span></a></p>
                </div>
                <div class="flex justify-center">
                    <p class="text-sm">Saya Dokter? <a href="index.php?page=loginDokter"><span class="text-blue-600 font-semibold hover:underline">Login Dokter</span></a></p>
                </div>
            </div>
        </form>
    </div>
</div>
