-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2024 pada 18.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `certificate`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `name_certificate` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `events` varchar(255) NOT NULL,
  `name_of_signatory` varchar(255) NOT NULL,
  `certificate_png` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `certificate`
--

INSERT INTO `certificate` (`id`, `name_certificate`, `full_name`, `events`, `name_of_signatory`, `certificate_png`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(58, 'bOJaZdDnCGLVAO3RUNxYGlWhrYLPy9wDC7eGOAx3DXGyd+dv7Vmo6Mmg1ok2phXYK7JmO99H81IEg0jp7s8WppVbra6p3AHaT56pQcf6H4Bq1DBJDTVW/Kk+02BesaLu2IriNxC0FewT72I4iw==', '3qcqkYzdSz1pOWv8iFu4NDMyJBdJ8i/BSxzbwYLJJTFwlGBQZAW5zqH44rcD4pJMesl/y4RavNhJsQfV4tdAlcv9Z5KfRCVanIO0UW+2/Hw/SxJamuct0mako/jQOZ5n', '4rYrJJyFKlQNeZScQvD0fFzz9GpzuJdBztC/FJja8iOq+rAh/vz3BsFblkPM4YBqBZ8rJ1cnFLGB+4SGE8azD0VQKol1pakvyKy1LRVPaCTtfrHlsIyIbkkSfTI=', 'ezUniI5xu1HAUqjKAen3ZTWDKNrUF+FaiMrkBzPWj3DejT5YXs0HPH1mDTBpIWxw5tQ/ZCgExa8vOxzTPTqPfY5jvqy4FqLVTQr3mSzzA9JcDsVJ6Mf0UtZLjD4=', '6KO8jzxydeW5QwiDe91JVE/5Oe/nprEVFyos43+eh1dkM8zaoppgJ2yqKpSSn178vodbaTRYSOBEpF8kuLifsAjzPrC77WH3pjoADerL1Lo0GA6mpLgGy6m9Wj+N5hTa02H+Bp46id21aZjvjyJrTcoYUDWkVaGo69kep6Nr/xeI+nzbfGw+70V+9Q==', 24, '2024-06-05 15:10:45', '2024-06-05 15:10:51', '2024-06-05 15:10:51'),
(59, 'ytP8+LAj8jvsqAP6C6HAEnDUVCJ11WFXQi02c0fM1yxAQDIByPouO4F7/nog26dFXYvjH10kd7QdsW2/r8y1awrY/3gy/NTerYNjjan05Y4MKHbfHAKUfYd2znK4lA4l2pPgas5Y/cghD+DZJA==', 'RdBQyDxJVxzX1FHkkKhOQDsbwRIxl0xGDHadWMm3ODLxBQ3ipCyZpyp3t6iXOxpkduIsO9Ih/iHmznQTVXcYWezMvcAcYyDycBkQ4moqmucPs7hmLonvqVm1u79FpeFL', 'uDT/ksqxppjo9MQD7ilr5F19lZw/x0VD2N9ucRZo/qjJg/c0g8jSWK5VFCXHXcQjx3c9j3DhnfqEnd0fisFIqh1QU9SzPiMyLEkra45ONXja7oA1LypUhFHVX8o=', 'I435srathhtCFTlGvipMeR7bxRu8nP7kdW5tc5f89NuhprrmDOnBHArnt0hhWZrAlCob0VGOdqROYu7goLCTiq8BK6nOvjuYUffSewTlKg8FjwQn2rClNrrb9Ws=', '4QhYYpUIEsBPyF919UYNJc73oBbaTBA0kXhHjhpQ+rKLgTM16ilzmNLNrX7rDk/ekXRb6tOImeJPB4GBPkEdIHwhvTnNlIr7P7EAm5FA5DedaLVlyGMJ2sfzyTi+p9RKc/i+LaimPNqWttKeWOQxrdUvhqwITQ5iZjvQJEBYGXk6bYKCq5BXZ8nfAg==', 24, '2024-06-05 15:12:06', '2024-06-05 15:12:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(14, 'rohman', 'abd.rohman8889@gmail.com', '$2y$10$.g6Foq9vl4yl1vp4RUpd1uCpqi0kvQlYR8Px5tEpUk7ojMZA0eCqS', NULL, NULL),
(17, 'aisyah', 'aisyahakmalhamidillah@gmail.com', '$2y$10$skBBUr5xsTDuI5EkZ2b4IuUARjiDnpAJoOvAAruFtQS1hdFcTxxnC', NULL, NULL),
(19, 'admin', 'admin@gmail.com', '$2y$10$qbqHHy4l3n3tYiRMXc306OWBUo9IiU72AURI.ifvkkJJcV6KqtIuq', '2024-06-02 07:47:59', '2024-06-02 07:47:59'),
(24, 'Fathoni Fairuz Ramadhan', 'fathoni@gamil.com', '$2y$10$ixoBBynULf29o90AgJnZue92HDsbQPq61WvuybAdNLWMBsSUULsuO', '2024-06-05 04:43:33', '2024-06-05 04:43:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
