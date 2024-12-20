<?php

if (!isset($_SESSION)) {
  session_start();
}

// include_once($_SERVER['DOCUMENT_ROOT'] . '/rsp/config/koneksi.php');
include_once('./koneksi.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Poliklinik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        
        /* Custom Hover Styles */
        a {
            transition: color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            color: #1e3a8a; /* Deep blue */
        }

        a .svg-hover {
            transition: transform 0.3s ease;
        }

        a:hover .svg-hover {
            transform: translateX(5px);
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(30, 58, 138, 0.3);
        }
        
        .button-hover {
            background-color: #3b82f6; /* Blue */
            color: white;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .button-hover:hover {
            background-color: #1e3a8a; /* Deep blue */
            transform: scale(1.1);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        popins: ["Poppins", "sans-serif"]
                    },
                    backgroundImage: {
                        'jumbotron': "url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')"
                    },
                    screens: {
                        '2xl': '1420px',
                    },
                },
                container: {
                    padding: {
                        DEFAULT: '1rem',
                        sm: '2rem',
                        lg: '4rem',
                        xl: '5rem',
                        '2xl': '6rem',
                    },
                },
            },
        }
    </script>
  </head>
  <body class="font-popins">
    <nav class="flex shadow-md h-20 bg-blue-500">
        <div class="container flex items-center mx-auto gap-20 justify-between">
            <h1 class="text-white md:text-2xl font-bold">Sistem Poliklinik</h1>
            <div class="flex">
                <ul class="flex flex-row gap-5 items-center">
                    <li>
                        <a href="index.php" class="font-semibold text-white hover:underline">Home</a>
                    </li>
                    <li>
                        <a href="index.php?page=rekamMedis" class="font-semibold text-white hover:underline">Cek RM</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main role="main" class="container mx-auto">
    <?php
    if (isset($_GET['page'])) {
        include($_GET['page'] . ".php");
    } else {
        echo '
        <section class="bg-white mt-10">
            <div class="py-8 px-4 max-w-screen-xl lg:py-16">
                <div class="bg-blue-500 border border-gray-200 rounded-lg p-8 md:p-12 mb-8 card">
                    <a href="#" class="bg-blue-600 text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                            <path d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"/>
                        </svg>
                        Jaga Kesehatan
                    </a>
                    <h1 class="text-white text-3xl md:text-5xl font-extrabold mb-2">Selamat Datang di Poliklinik</h1>
                    <p class="text-lg font-normal text-gray-200 mb-6">Selalu Jaga Kesehatan, Karena sehat itu mahal. Jika sakit perlu biaya, dengan pola makan baik membuat kita sehat. Jangan lupa pake masker jika berpergian</p>
                </div>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12 card">
                        <div class="flex gap-5">
                            <img class="w-96" src="./img/pasien.png" alt="">
                            <div>
                                <h2 class="text-gray-900 text-3xl font-extrabold mb-2">Pasien Baru</h2>
                                <p class="text-lg font-normal text-gray-500 mb-4">Kami akan memberikan panduan dan layanan terbaik kepada pasien baru kami.</p>
                                <a href="index.php?page=pasienBaru" class="text-blue-600 hover:underline font-medium text-lg inline-flex items-center">Daftar Pasien Baru
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180 svg-hover" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12 card">
                        <div class="flex gap-5">
                            <img class="w-96" src="./img/pasien.png" alt="">
                            <div>
                                <h2 class="text-gray-900 text-3xl font-extrabold mb-2">Pasien Lama</h2>
                                <p class="text-lg font-normal text-gray-500 mb-4">Kami senang dapat terus melayani Anda. Jika ada yang dapat kami bantu, beri tahu kami! Terima kasih atas kepercayaan Anda.</p>
                                <a href="index.php?page=pasienLama" class="text-blue-600 hover:underline font-medium text-lg inline-flex items-center">Daftar Poli
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180 svg-hover" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        ';
    }
    ?>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
  </body>
</html>
