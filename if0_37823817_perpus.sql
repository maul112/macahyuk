-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql112.infinityfree.com
-- Generation Time: Dec 20, 2024 at 01:59 PM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37823817_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `current_balance` int(11) NOT NULL DEFAULT 0,
  `usage_balance` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `user_id`, `pin`, `current_balance`, `usage_balance`, `created_at`) VALUES
(1, 1, '1234', 23500, 6500, '2024-11-28 02:23:56'),
(2, 2, '5678', 11000, 24000, '2024-11-28 02:23:56'),
(4, 13, '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', 0, 0, '2024-12-01 20:01:30'),
(5, 11, '87149b47091deaf4baa35a073ffe22b23bee965539d11808f17b53cb2697250c', 0, 0, '2024-12-01 20:02:26'),
(6, 1, '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', 0, 0, '2024-12-01 20:32:39'),
(7, 2, '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', -18000, 18000, '2024-12-01 20:33:30'),
(8, 12, 'bb60c3d23f51a04bf179f7d17c4b423b7882d3572a9f90cb7ebd44238675e5f3', 14000, 6000, '2024-12-01 21:54:04'),
(9, 14, 'f8cee61cb7f56e76ecfe6e4a164aa5119f8076cc75bea5cb90259339ae119b4d', 0, 0, '2024-12-02 14:11:20'),
(10, 15, '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', 0, 0, '2024-12-07 03:38:47'),
(11, 19, 'b52fe4f00d69ed06b1544abea5dce795b64ab07a57fcbc002cca712efe266044', 0, 0, '2024-12-11 06:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategory`
--

CREATE TABLE `bookcategory` (
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookcategory`
--

INSERT INTO `bookcategory` (`book_id`, `category_id`) VALUES
(4, 5),
(4, 11),
(5, 6),
(6, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10),
(10, 5),
(10, 11),
(11, 12),
(12, 13),
(13, 14),
(14, 7),
(15, 6),
(16, 7),
(17, 8),
(18, 9),
(19, 10),
(20, 5),
(20, 11),
(21, 8),
(21, 12),
(22, 13),
(23, 14),
(24, 14),
(25, 10),
(25, 13),
(26, 14),
(27, 10),
(27, 12),
(28, 8),
(28, 9),
(29, 14);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `page` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_trending` tinyint(1) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `cover_src` varchar(255) DEFAULT NULL,
  `overview` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `page`, `created_at`, `is_trending`, `author`, `cover_src`, `overview`) VALUES
(4, 'The Great Adventure', 'A thrilling adventure story.', 320, '2024-01-14 17:00:00', 1, 'John Smith', 'https://m.media-amazon.com/images/I/51I3jNnQg2L._AC_UF1000,1000_QL80_.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(5, 'Science 101', 'An introduction to basic scientific principles.', 250, '2024-02-09 17:00:00', 0, 'Jane Doe', 'https://m.media-amazon.com/images/I/51JqVuLWKQL._AC_UF1000,1000_QL80_.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(6, 'Tech Revolution', 'Exploring the latest in technology.', 310, '2024-03-04 17:00:00', 1, 'Alan Turing ', 'https://m.media-amazon.com/images/I/51nDLeI98yL._AC_UF1000,1000_QL80_.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(7, 'World History', 'A comprehensive history of the world.', 450, '2024-03-14 17:00:00', 0, 'Howard Zinn', 'https://m.media-amazon.com/images/I/61uP8hLKTiL._AC_UF1000,1000_QL80_.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(8, 'The Life of Einstein', 'A biography of Albert Einstein.', 400, '2024-03-31 17:00:00', 1, 'Walter Isaacson', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1181700000i/1182114.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(9, 'Philosophy Basics', 'Understanding the foundations of philosophy.', 200, '2024-04-11 17:00:00', 0, 'Bertrand Russell', 'https://m.media-amazon.com/images/I/61K+N8k1YnL.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(10, 'Fantasy World', 'A journey through an imaginary world.', 380, '2024-05-19 17:00:00', 1, 'J.R.R. Tolkien', 'https://m.media-amazon.com/images/I/91zVbfuWBlL.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(11, 'Romance in Paris', 'A love story set in Paris.', 270, '2024-06-09 17:00:00', 0, 'Nicholas Sparks', 'https://m.media-amazon.com/images/I/910G9m9ZAbL._AC_UF1000,1000_QL80_.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(12, 'Mystery of the Island', 'An intriguing mystery story.', 290, '2024-07-04 17:00:00', 1, 'Agatha Christie', 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781665934299/the-mysterious-island-9781665934299_hr.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(13, 'Becoming a Leader', 'Self-help tips for leadership.', 150, '2024-08-14 17:00:00', 0, 'John Maxwell', 'https://m.media-amazon.com/images/I/71Z1hqlH1+L.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(14, 'Coding for Beginners', 'Introduction to programming basics.', 300, '2024-08-31 17:00:00', 1, 'Bjarne Stroustrup', 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2024/1/11/50487fa0-700a-4d9e-b478-543bf8a9bd60.jpg', 'Buku Coding for Beginners dirancang sebagai panduan awal bagi pemula yang ingin memahami dunia pemrograman. Buku ini menjelaskan konsep dasar pemrograman dengan cara yang mudah dipahami, langkah demi langkah, bahkan untuk pembaca tanpa latar belakang teknis sekalipun.\n\nIsi Utama:\nPengantar Pemrograman:\n\nApa itu pemrograman, dan mengapa penting di era digital.\nPenjelasan tentang bahasa pemrograman populer seperti Python, JavaScript, atau lainnya (tergantung fokus buku).\nKonsep Dasar Pemrograman:\n\nStruktur data dasar seperti variabel, tipe data, dan array.\nDasar-dasar logika pemrograman: if/else statements, loops (perulangan), dan fungsi.\nPenerapan Praktis:\n\nMembangun proyek kecil seperti kalkulator sederhana, permainan tebak angka, atau program pengelola daftar tugas.\nPenjelasan langkah-langkah menulis, menjalankan, dan memperbaiki kode.\nTips untuk Pemula:\n\nCara berpikir seperti seorang programmer.\nKesalahan umum yang sering dilakukan pemula dan cara menghindarinya.\nGaya Penulisan:\nDitulis dengan bahasa sederhana, buku ini menggunakan banyak analogi dan ilustrasi untuk membantu pembaca memahami konsep abstrak.\nTerdapat banyak latihan praktis dan soal tantangan untuk memperkuat pemahaman.\nTarget Pembaca:\nPemula yang ingin memulai belajar pemrograman dari nol.\nSiswa, mahasiswa, atau profesional non-teknis yang tertarik mengenal pemrograman untuk pengembangan karier atau hobi.\nRelevansi Buku:\nBuku ini adalah langkah pertama yang ideal untuk memulai perjalanan menjadi programmer, terutama bagi mereka yang merasa intimidasi dengan dunia coding. Pendekatan praktisnya membantu pembaca langsung menerapkan teori ke dalam praktik nyata.'),
(15, 'The Universe', 'Discovering the secrets of the cosmos.', 350, '2024-10-09 17:00:00', 0, 'Carl Sagan', 'https://m.media-amazon.com/images/I/81mMu4HfUbL._UF1000,1000_QL80_.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(16, 'Hacking Secrets', 'The world of ethical hacking.', 290, '2024-10-19 17:00:00', 1, 'Kevin Mitnick', 'https://m.media-amazon.com/images/I/915xhJdcRqL._AC_UF1000,1000_QL80_.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(17, 'Medieval Europe', 'History of the Middle Ages in Europe.', 420, '2024-11-04 17:00:00', 0, 'Dan Jones', 'https://images.tokopedia.net/img/cache/700/VqbcmM/2022/10/18/9c7e2f71-a5c4-4c07-85b1-6964d022c286.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(18, 'Steve Jobs', 'Biography of Steve Jobs.', 600, '2024-11-14 17:00:00', 1, 'Walter Isaacson', 'https://m.media-amazon.com/images/I/71mmowWE5iL.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(19, 'Critical Thinking ', 'Developing logical and critical thinking skills.', 200, '2024-11-30 17:00:00', 0, 'Edward de Bono', 'https://images.tokopedia.net/img/cache/700/hDjmkQ/2023/9/29/0d48e0ca-df3b-496e-b9c0-fa233d43c436.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(20, 'The Chronicles of Narnia', 'A magical fantasy series.', 700, '2024-12-09 17:00:00', 1, 'C.S. Lewis', 'https://images-cdn.ubuy.co.id/66bf7580e392a5167131e4bd-chronicles-of-narnia-the-chronicles-of.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(21, 'Love and War', 'A historical romance.', 360, '2024-12-19 17:00:00', 0, 'Ken Follett', 'https://m.media-amazon.com/images/I/81zjrADzc6L.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(22, 'Sherlock Holmes', 'A collection of detective stories.', 250, '2024-12-24 17:00:00', 1, 'Arthur Conan Doyle', 'https://cdn.gramedia.com/uploads/picture_meta/2023/6/19/hp4eu9cu4xqa8yshmfmb9g.jpg', 'Critical Thinking memberikan panduan langkah demi langkah untuk mengembangkan keterampilan berpikir kritis. Buku ini dirancang untuk membantu pembaca meningkatkan kemampuan menganalisis, mengevaluasi, dan memecahkan masalah secara logis dan objektif. Dengan menggunakan contoh nyata, latihan praktis, dan teori yang mudah dimengerti, buku ini mempersiapkan pembaca untuk berpikir lebih tajam dalam berbagai situasi kehidupan, akademik, maupun profesional.\r\n\r\nIsi Utama:\r\nPengantar Berpikir Kritis:\r\n\r\nApa itu berpikir kritis, dan mengapa keterampilan ini penting di era informasi.\r\nCiri-ciri seorang pemikir kritis dan kesalahan umum dalam penalaran.\r\nDasar-dasar Logika:\r\n\r\nKonsep dasar logika formal dan informal.\r\nMengenali argumen yang valid dan tidak valid.\r\nMengenali Bias dan Kesalahan Berpikir:\r\n\r\nPenjelasan tentang cognitive biases (bias kognitif) seperti confirmation bias, anchoring, dan availability heuristic.\r\nTeknik untuk mengenali dan menghindari kesalahan berpikir dalam pengambilan keputusan.\r\nMenganalisis Informasi:\r\n\r\nCara mengevaluasi keandalan sumber informasi.\r\nTeknik membaca dan memahami artikel, grafik, dan data secara kritis.\r\nPenerapan Berpikir Kritis:\r\n\r\nStrategi menyelesaikan masalah kompleks dengan pendekatan berbasis logika.\r\nCara berargumentasi secara efektif dalam diskusi dan debat.\r\nGaya Penulisan:\r\nBuku ini ditulis dengan bahasa yang mudah dipahami, disertai contoh-contoh dari kehidupan sehari-hari. Setiap bab diakhiri dengan latihan praktis untuk mengasah keterampilan berpikir kritis pembaca.\r\n\r\nTarget Pembaca:\r\nPelajar, mahasiswa, atau profesional yang ingin meningkatkan kemampuan berpikir logis.\r\nSiapa saja yang ingin lebih memahami dunia di sekitar mereka dan membuat keputusan yang lebih baik.\r\nRelevansi Buku:\r\nKemampuan berpikir kritis adalah keterampilan esensial di dunia modern yang penuh informasi. Buku ini membantu pembaca untuk tidak hanya memahami, tetapi juga mempertanyakan informasi dengan cara yang produktif. Sangat cocok untuk individu yang ingin menjadi pembelajar mandiri atau profesional yang lebih bijaksana.'),
(23, 'Mindset', 'The power of a growth mindset.', 180, '2024-12-31 17:00:00', 0, 'Carol S. Dweck', 'https://cdn.gramedia.com/uploads/items/img183.jpg', 'Buku Coding for Beginners dirancang sebagai panduan awal bagi pemula yang ingin memahami dunia pemrograman. Buku ini menjelaskan konsep dasar pemrograman dengan cara yang mudah dipahami, langkah demi langkah, bahkan untuk pembaca tanpa latar belakang teknis sekalipun.\n\nIsi Utama:\nPengantar Pemrograman:\n\nApa itu pemrograman, dan mengapa penting di era digital.\nPenjelasan tentang bahasa pemrograman populer seperti Python, JavaScript, atau lainnya (tergantung fokus buku).\nKonsep Dasar Pemrograman:\n\nStruktur data dasar seperti variabel, tipe data, dan array.\nDasar-dasar logika pemrograman: if/else statements, loops (perulangan), dan fungsi.\nPenerapan Praktis:\n\nMembangun proyek kecil seperti kalkulator sederhana, permainan tebak angka, atau program pengelola daftar tugas.\nPenjelasan langkah-langkah menulis, menjalankan, dan memperbaiki kode.\nTips untuk Pemula:\n\nCara berpikir seperti seorang programmer.\nKesalahan umum yang sering dilakukan pemula dan cara menghindarinya.\nGaya Penulisan:\nDitulis dengan bahasa sederhana, buku ini menggunakan banyak analogi dan ilustrasi untuk membantu pembaca memahami konsep abstrak.\nTerdapat banyak latihan praktis dan soal tantangan untuk memperkuat pemahaman.\nTarget Pembaca:\nPemula yang ingin memulai belajar pemrograman dari nol.\nSiswa, mahasiswa, atau profesional non-teknis yang tertarik mengenal pemrograman untuk pengembangan karier atau hobi.\nRelevansi Buku:\nBuku ini adalah langkah pertama yang ideal untuk memulai perjalanan menjadi programmer, terutama bagi mereka yang merasa intimidasi dengan dunia coding. Pendekatan praktisnya membantu pembaca langsung menerapkan teori ke dalam praktik nyata.'),
(24, 'Atomic Habbits', 'Cara Mudah dan Terbukti untuk Membentuk Kebiasaan Baik dan Menghilangkan Kebiasaan Buruk', 354, '2024-12-01 10:39:10', 0, 'James Clear', '354atomichabbits354.jpg', 'Orang mengira ketika Anda ingin mengubah hidup, Anda perlu memikirkan hal-hal besar.Namun pakar kebiasaan terkenal kelas dunia James Clear telah menemukan sebuah caralain. la tahu bahwa perubahan nyata berasal dari efek gabungan ratusan keputusan kecil-darimengerjakan dua push-up sehari, bangun lima menit lebih awal, sampai menahan sebentarhasrat untuk menelepon.'),
(25, 'Jika Kita Tak Pernah Jadi Apa-Apa', 'untuk seseorang yang sedang khawatir tentang masa depannya. Yes, I wrote this book for you', 248, '2024-12-01 11:00:55', 0, 'Alvi Syahrin', '248jikakitatakpernahjadiapa-apa248.png', 'Jika Kita Tak Pernah Jadi Apa-Apa : akan menemanimu selama perjalanan. Buku ini untukmu yang khawatir tentang masa depan. Tenang saja, kau tidak sedang diburu waktu. Bacalah tiap lembarnya dengan penuh kesadaran bahwa hidup adalah tentang sebaik-baiknya berusaha, jatuh lalu bangun lagi, dan tidak berhenti percaya bahwa segala perjuanganmu tidak akan sia-sia. Bukankah sebaiknya apa-apa yang fana tidak selayaknya membuatmu kecewa?'),
(26, 'Sebuah Seni untuk Bersikap Bodo Amat', 'charles Bukowski dulunya adalah seorang pecandu alko- hol, senang main perempuan, pejudi kronis, kasar, kikir, tukang utang dan, dalam hari-hari terburuknya, seorang penyair. Dia barangkali adalah manusia terakhir di muka bumi yang bakal Anda mintai nasihat tentang kehidupan, atau nama terakhir yang ingin Anda lihat dalam deretan buku motivasi jenis apa pun.', 254, '2024-12-01 11:13:28', 0, 'mark manson ', '254sebuahseniuntukbersikapbodoamat254.png', 'Manson melontarkan argumen bahwa manusia tak sempurna dan terbatas. Begini tulisnya, &quot;tidak semua orang bisa menjadi luar biasa-ada para pemenang dan pecundang di masyarakat, dan beberapa di antaranya tidak adil dan bukan akibat kesalahan Anda Manson mengajak kita untuk mengerti batasan batasan diri dan menerimanya-baginya, inilah sumber kekuatan yang paling nyata. Tepat saat kita mampu mengakrabi ketakutan, kegagalan, dan ketidakpastian berhenti melarikan diri dan mengelak, dan mulai menyataan yang menyakitkan-saat itulahan dan kepercayaan diri yang selama ini dengan sekuat tenaga'),
(27, ' The Alpha Girl s Guide', 'The Alpha Girl&#039;s Guide adalah buku panduan inspiratif yang ditulis oleh Henry Manampiring, ditujukan untuk remaja perempuan dan wanita muda yang ingin menjadi pribadi yang percaya diri, mandiri, dan berdaya. Buku ini membahas bagaimana menjadi seorang &quot;Alpha Girl,&quot; yakni wanita yang tidak hanya memiliki kepercayaan diri tinggi, tetapi juga mampu memimpin dirinya sendiri dan orang lain dalam berbagai situasi.', 261, '2024-12-01 11:22:35', 0, 'Henry Manampiring', '261thealphagirlsguide261.png', 'Buku The Alpha Girl&#039;s Guide adalah panduan praktis yang dirancang untuk membantu remaja perempuan dan wanita muda menjadi versi terbaik dari dirinya. Ditulis oleh Henry Manampiring, buku ini mengangkat konsep &quot;Alpha Girl,&quot; yakni seorang perempuan yang percaya diri, mandiri, dan mampu menghadapi tantangan hidup dengan kepala tegak. Melalui kombinasi cerita pribadi, wawasan, dan humor khas penulis, buku ini memberikan tips-tips sederhana namun efektif untuk: Membangun rasa percaya diri. Menjaga kesehatan mental dan emosional. Mengatasi rasa takut dan keraguan diri. Meningkatkan keterampilan komunikasi dan hubungan sosial. Meraih kemandirian, baik secara finansial maupun personal. Buku ini relevan bagi pembaca muda yang tengah menghadapi fase pencarian jati diri atau ingin meningkatkan kualitas hidupnya. Henry Manampiring menggunakan bahasa yang santai dan relatable, membuat pembaca merasa seperti sedang berdiskusi dengan seorang mentor atau sahabat yang bijaksana. The Alpha Girl&#039;s Guide adalah bacaan yang menginspirasi, memotivasi, dan memberi arahan konkret bagi mereka yang ingin menjadi pemimpin bagi dirinya sendiri di dunia yang terus berkembang ini.');
INSERT INTO `books` (`id`, `title`, `description`, `page`, `created_at`, `is_trending`, `author`, `cover_src`, `overview`) VALUES
(28, 'Mengenal Pribadi Agung Nabi Muhammad', 'Mengenal Pribadi Agung Nabi Muhammad adalah buku yang menggambarkan kepribadian dan karakter mulia Nabi Muhammad ﷺ sebagai teladan utama bagi umat manusia. Buku ini memberikan pandangan mendalam tentang kehidupan Rasulullah, tidak hanya sebagai seorang nabi tetapi juga sebagai pemimpin, suami, ayah, sahabat, dan manusia yang sempurna dalam setiap aspek kehidupannya.', 207, '2024-12-01 11:25:37', 0, 'imam at-tirmidzi', '207mengenalpribadiagungnabimuhammad207.png', 'Buku Mengenal Pribadi Agung Nabi Muhammad mengajak pembaca untuk mendalami kepribadian dan sifat-sifat mulia Rasulullah Muhammad ﷺ, yang menjadi teladan sempurna bagi umat manusia. Buku ini menyelami berbagai aspek kehidupan Rasulullah, mulai dari masa kecilnya, perjalanan dakwahnya, hingga kebijaksanaannya sebagai pemimpin umat.'),
(29, 'Bicara Itu Ada Seninya', 'Bicara Itu Ada Seninya adalah buku karya Oh Su Hyang, seorang ahli komunikasi asal Korea Selatan, yang membahas seni berbicara dengan cara yang efektif, sopan, dan menarik. Buku ini memberikan panduan praktis untuk meningkatkan keterampilan komunikasi, baik dalam kehidupan sehari-hari maupun di lingkungan profesional.', 250, '2024-12-01 11:30:12', 0, 'oh su hyang', '250bicaraituadaseninya250.jpg', 'Buku Bicara Itu Ada Seninya karya Oh Su Hyang adalah panduan praktis untuk mengasah keterampilan komunikasi yang efektif dan berkesan. Ditulis oleh seorang pakar komunikasi asal Korea Selatan, buku ini mengupas seni berbicara dengan cara yang santun, percaya diri, dan mampu menciptakan hubungan yang lebih baik dalam berbagai situasi.'),
(30, 'Find Your Why', 'SIMON SINEK adalah sosok optimistis yang percaya ada masa depan yang lebih cerah bagi semua orang. Penampilan TED Talk-nya di TED.com menjadi video TED Talk paling banyak ditonton ketiga sepanjang waktu. Caritahu lebih banyak tentang karyanya dan bagaimana Anda dapat mengilhami orangorang di sekitar Anda di StartWithWhy.com.', 324, '2024-12-01 11:53:25', 0, 'SIMON SINEK', '324findyourwhy324.png', 'Saya percaya kepuasan adalah hak setiap orang, bukan hanya orang tertentu. Kita semua berhakuntuk terjaga di pagi hari dengan penuh semangat untuk pergi bekerja, merasa aman ketikaberada di tempat kerja, dan pulang dengan perasaan puas pada pengujung hari. Merasakan kepuasan itu dimulai dengan memahami secara pasti mengapa kita melakukan apa yang kitalakukan.');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(9, 'Biography'),
(11, 'Fantasy'),
(5, 'Fiction'),
(8, 'History'),
(13, 'Mystery'),
(10, 'Philosophy'),
(12, 'Romance'),
(6, 'Science'),
(14, 'Self-Help'),
(7, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`id`, `day`, `price`) VALUES
(1, 7, 3000),
(2, 15, 6000),
(3, 30, 12000),
(4, 90, 20000),
(5, 180, 35000),
(6, 365, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `user_id` int(11) DEFAULT NULL,
  `feed` text DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`user_id`, `feed`, `is_read`, `id`, `created_at`) VALUES
(2, 'Sangat Bagus!', 1, 2, '2024-12-06 08:36:20'),
(2, 'Sangat Bagus!', 1, 3, '2024-12-06 08:36:20'),
(2, 'Sangat Bagus!', 1, 4, '2024-12-06 08:36:20'),
(2, 'Bagus', 1, 5, '2024-12-06 08:36:20'),
(2, 'Bagus', 1, 6, '2024-12-06 08:36:20'),
(2, 'Bagus', 1, 7, '2024-12-06 08:36:20'),
(2, 'Baguss!!!!', 1, 8, '2024-12-06 08:36:20'),
(2, 'bagusss!!!', 1, 9, '2024-12-06 08:36:20'),
(2, 'Baguss!!!', 1, 10, '2024-12-06 08:36:20'),
(12, 'Webnya bagus dan memudahkan saya untuk membaca buku dengan nyaman', 0, 13, '2024-12-06 08:36:20'),
(1, 'hai maul\r\n', 0, 14, '2024-12-12 08:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `server_status`
--

CREATE TABLE `server_status` (
  `name` varchar(255) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `server_status`
--

INSERT INTO `server_status` (`name`, `status`) VALUES
('knsadnasasjfaall', 'on'),
('njajfsbasbljajstopup', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status` enum('pending','reject','resolve') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id`, `bank_id`, `nominal`, `status`, `created_at`) VALUES
(1, 8, 10000, 'reject', '2024-12-01 22:27:04'),
(3, 2, 20000, 'resolve', '2024-12-02 06:34:55'),
(4, 9, 100000, 'reject', '2024-12-02 14:11:47'),
(5, 8, 10000, 'reject', '2024-12-04 17:36:19'),
(6, 8, 10000, 'reject', '2024-12-04 18:01:46'),
(7, 8, 10000, 'reject', '2024-12-04 18:03:32'),
(8, 8, 10000, 'reject', '2024-12-04 18:04:52'),
(9, 8, 10000, 'reject', '2024-12-05 09:10:37'),
(10, 8, 10000, 'reject', '2024-12-05 09:11:38'),
(11, 8, 10000, 'reject', '2024-12-04 18:13:37'),
(12, 8, 10000, 'reject', '2024-12-05 09:15:11'),
(13, 8, 5000, 'reject', '2024-12-05 09:23:08'),
(14, 8, 10000, 'pending', '2024-12-08 04:11:14'),
(15, 1, 10000, 'resolve', '2024-12-11 20:46:09'),
(16, 1, 10000, 'resolve', '2024-12-11 21:42:48'),
(17, 1, 20000, 'resolve', '2024-12-20 12:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `duration_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('expired','approved') DEFAULT 'approved',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_code`, `user_id`, `book_id`, `duration_id`, `start_date`, `end_date`, `status`, `created_at`) VALUES
(13, 'test', 1, 10, 1, '2024-12-01', '2024-12-08', 'expired', '2024-12-01 03:58:37'),
(14, 'test', 2, 22, 1, '2024-12-01', '2024-12-08', 'expired', '2024-12-01 05:52:30'),
(15, 'test', 1, 24, 1, '2024-12-01', '2024-12-07', 'expired', '2024-12-01 18:37:40'),
(16, 'test', 12, 29, 1, '2024-12-02', '2024-12-09', 'expired', '2024-12-01 23:45:55'),
(17, 'test', 2, 24, 1, '2024-12-02', '2024-12-09', 'expired', '2024-12-02 06:49:37'),
(18, 'test', 2, 8, 1, '2024-12-02', '2024-12-09', 'expired', '2024-12-02 06:58:25'),
(19, 'test', 2, 26, 1, '2024-12-02', '2024-12-09', 'expired', '2024-12-02 08:57:21'),
(20, 'test', 12, 30, 1, '2024-12-05', '2024-12-12', 'expired', '2024-12-05 12:57:49'),
(21, 'test', 2, 8, 1, '2024-12-07', '2024-12-14', 'expired', '2024-12-07 03:11:34'),
(22, 'test', 2, 12, 1, '2024-12-08', '2024-12-15', 'expired', '2024-12-08 15:55:52'),
(23, 'test', 2, 8, 1, '2024-12-10', '2024-12-17', 'expired', '2024-12-10 04:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Admin','User') DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `birth`, `avatar`, `created_at`, `status`) VALUES
(1, '', 'user1', 'user1@example.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', '2024-12-12', '3', '2024-11-28 02:23:56', 'User'),
(2, '', 'user2', 'user2@example.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', '1995-05-15', '5', '2024-11-28 02:23:56', 'User'),
(3, '', 'user3', 'user3@example.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', NULL, '1', '2024-11-29 13:13:27', 'User'),
(4, '', 'user4', 'user4@example.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', NULL, '1', '2024-11-29 13:13:27', 'User'),
(5, '', 'user5', 'user5@example.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', NULL, '1', '2024-11-29 13:13:27', 'User'),
(6, '', 'user6', 'user6@example.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', NULL, '1', '2024-11-29 13:13:27', 'User'),
(7, '', 'user7', 'user7@example.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', NULL, '1', '2024-11-29 13:13:27', 'User'),
(8, '', 'user8', 'user8@example.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', NULL, '1', '2024-11-29 13:13:27', 'User'),
(9, '', 'user9', 'user9@example.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', NULL, '1', '2024-11-29 13:13:27', 'User'),
(10, '', 'user10', 'use103@example.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', NULL, '1', '2024-11-29 13:13:27', 'User'),
(11, 'Maulana Ardiansyah', 'maulana1123', 'maulana@gmail.com', '87149b47091deaf4baa35a073ffe22b23bee965539d11808f17b53cb2697250c', '1995-04-24', '1', '2024-11-30 21:27:01', 'Admin'),
(12, 'Maul Lana', 'maul1123', 'maulana2@gmail.com', 'bb60c3d23f51a04bf179f7d17c4b423b7882d3572a9f90cb7ebd44238675e5f3', '2010-04-06', '1', '2024-12-01 07:01:10', 'User'),
(13, 'Brian', 'brian123', 'brian@gmail.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', '2024-12-01', '1', '2024-12-01 19:44:19', 'User'),
(14, 'ardi', 'testanjay', 'adsada@gmail.com', 'f8cee61cb7f56e76ecfe6e4a164aa5119f8076cc75bea5cb90259339ae119b4d', '2009-01-10', '1', '2024-12-02 14:11:01', 'User'),
(15, 'Hanif Brian', 'hanifbrian123', 'brianhanif2402@gmail.com', '4aad9ad6eb25a064345cbfeaecc5de59f838f839793ce1787177f1770a4ecd01', '2024-12-01', '1', '2024-12-07 03:38:17', 'Admin'),
(16, 'rohman', 'rohmanmaulana', 'rohamnanna@gmail.com', '55bc48d4db545457836695da49e6284cebfd4a6bd17b3a571586b857a1410bae', '2004-02-12', '1', '2024-12-07 08:50:08', 'User'),
(17, 'bayu firmansyah', 'bayumwehehe', 'bayusimo81@gmail.com', '872ae2638ea6ad8000da2cdefd22b0507aed840db5bb3edb8de068e8ce0d9eae', '2002-06-12', '1', '2024-12-08 05:24:13', 'User'),
(18, 'sayabayu', 'sayabayu', 'bayusimo81@contoh.com', '92d2a813cdbaf0220c09d7a26230b0fa92b01197a390e95459588465f71f79bd', '2024-12-08', '1', '2024-12-08 09:01:17', 'User'),
(19, 'baywa azizah', 'baywabaywa', 'baywa12345@gmail.com', 'b52fe4f00d69ed06b1544abea5dce795b64ab07a57fcbc002cca712efe266044', '2004-03-27', '1', '2024-12-11 05:59:27', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`user_id`, `book_id`, `created_at`) VALUES
(1, 10, '2024-12-01 07:36:20'),
(1, 13, '2024-12-01 07:36:20'),
(1, 19, '2024-12-01 07:36:20'),
(1, 22, '2024-12-01 07:36:20'),
(1, 23, '2024-12-01 13:40:20'),
(2, 4, '2024-12-02 06:07:55'),
(2, 5, '2024-12-01 07:36:20'),
(2, 7, '2024-12-01 07:36:20'),
(2, 8, '2024-12-06 09:03:15'),
(2, 10, '2024-12-06 09:08:28'),
(2, 12, '2024-12-01 14:57:38'),
(2, 14, '2024-12-01 07:36:20'),
(2, 18, '2024-12-02 08:38:25'),
(2, 19, '2024-12-01 07:36:20'),
(2, 23, '2024-12-01 07:36:20'),
(2, 24, '2024-12-02 06:49:33'),
(2, 26, '2024-12-02 07:11:31'),
(3, 4, '2024-12-01 07:36:20'),
(3, 6, '2024-12-01 07:36:20'),
(3, 8, '2024-12-01 07:36:20'),
(3, 10, '2024-12-01 07:36:20'),
(3, 15, '2024-12-01 07:36:20'),
(3, 20, '2024-12-01 07:36:20'),
(3, 23, '2024-12-01 07:36:20'),
(4, 6, '2024-12-01 07:36:20'),
(4, 9, '2024-12-01 07:36:20'),
(4, 11, '2024-12-01 07:36:20'),
(4, 15, '2024-12-01 07:36:20'),
(4, 20, '2024-12-01 07:36:20'),
(5, 6, '2024-12-01 07:36:20'),
(5, 9, '2024-12-01 07:36:20'),
(5, 12, '2024-12-01 07:36:20'),
(5, 15, '2024-12-01 07:36:20'),
(5, 20, '2024-12-01 07:36:20'),
(6, 9, '2024-12-01 07:36:20'),
(6, 12, '2024-12-01 07:36:20'),
(6, 15, '2024-12-01 07:36:20'),
(6, 21, '2024-12-01 07:36:20'),
(7, 9, '2024-12-01 07:36:20'),
(7, 12, '2024-12-01 07:36:20'),
(7, 16, '2024-12-01 07:36:20'),
(7, 22, '2024-12-01 07:36:20'),
(8, 9, '2024-12-01 07:36:20'),
(8, 13, '2024-12-01 07:36:20'),
(8, 17, '2024-12-01 07:36:20'),
(8, 22, '2024-12-01 07:36:20'),
(9, 13, '2024-12-01 07:36:20'),
(9, 17, '2024-12-01 07:36:20'),
(9, 22, '2024-12-01 07:36:20'),
(10, 13, '2024-12-01 07:36:20'),
(10, 18, '2024-12-01 07:36:20'),
(10, 22, '2024-12-01 07:36:20'),
(12, 6, '2024-12-07 13:06:06'),
(14, 6, '2024-12-02 14:13:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`book_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `server_status`
--
ALTER TABLE `server_status`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `duration_id` (`duration_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD CONSTRAINT `bookcategory_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `bookcategory_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`duration_id`) REFERENCES `duration` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
