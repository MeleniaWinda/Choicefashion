/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : pemilihan_sepatu

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 14/04/2021 19:19:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `_type` enum('benefit','cost') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `quality` double(8, 2) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Kategori 1', 'benefit', 2.50, '2021-03-30 12:34:54', '2021-03-30 12:34:54');
INSERT INTO `categories` VALUES (2, 'Kategori 2', 'cost', 2.00, '2021-03-30 12:36:24', '2021-03-30 12:36:24');
INSERT INTO `categories` VALUES (3, 'Kategori 3', 'benefit', 4.00, '2021-04-14 01:49:12', '2021-04-14 01:49:12');

-- ----------------------------
-- Table structure for categories_subs
-- ----------------------------
DROP TABLE IF EXISTS `categories_subs`;
CREATE TABLE `categories_subs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `quality` double(8, 2) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories_subs
-- ----------------------------
INSERT INTO `categories_subs` VALUES (1, 1, 'Sub 1', 3.00, '2021-03-30 12:50:06', '2021-03-30 12:50:06');
INSERT INTO `categories_subs` VALUES (2, 1, 'Sub 2', 2.00, '2021-03-30 12:50:14', '2021-03-30 12:50:14');
INSERT INTO `categories_subs` VALUES (3, 2, 'Ssub 1', 3.00, '2021-03-30 12:50:27', '2021-03-30 12:50:27');
INSERT INTO `categories_subs` VALUES (4, 2, 'Ssub 2', 1.50, '2021-03-30 12:50:38', '2021-03-30 12:50:38');
INSERT INTO `categories_subs` VALUES (5, 3, 'k31', 1.00, '2021-04-14 01:49:30', '2021-04-14 01:49:30');
INSERT INTO `categories_subs` VALUES (6, 3, 'k32', 2.00, '2021-04-14 01:49:37', '2021-04-14 01:49:37');
INSERT INTO `categories_subs` VALUES (7, 3, 'k33', 3.00, '2021-04-14 01:49:44', '2021-04-14 01:49:44');
INSERT INTO `categories_subs` VALUES (8, 1, 'k13', 3.00, '2021-04-14 01:49:52', '2021-04-14 01:49:52');
INSERT INTO `categories_subs` VALUES (9, 2, 'k23', 3.00, '2021-04-14 01:49:59', '2021-04-14 01:49:59');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2021_03_15_145105_create_categories_table', 1);
INSERT INTO `migrations` VALUES (3, '2021_03_15_145202_create_categories_subs_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_03_15_145359_create_products_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_03_15_150432_create_products_qualities_table', 1);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file_dir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Produk 1', '-', '/assets/products/1618323522.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-03-30 19:37:00', '2021-04-14 09:50:01');
INSERT INTO `products` VALUES (2, 'Produk 2', '-', '/assets/products/1618323527.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-03-30 19:37:00', '2021-04-14 09:13:55');
INSERT INTO `products` VALUES (3, 'pp 3', '-', '/assets/products/1618323537.jpg', NULL, '2021-03-30 14:05:30', '2021-04-13 14:18:57');
INSERT INTO `products` VALUES (6, 'pp4', '-', '/assets/products/1618323693.jpg', NULL, '2021-04-13 14:13:57', '2021-04-13 14:21:33');
INSERT INTO `products` VALUES (7, 's41', '-', '/assets/products/1618365225.jpg', NULL, '2021-04-14 01:53:45', '2021-04-14 01:53:45');
INSERT INTO `products` VALUES (8, 's42', '-', '/assets/products/1618365230.jpg', NULL, '2021-04-14 01:53:50', '2021-04-14 01:53:50');
INSERT INTO `products` VALUES (9, 's43', '-', '/assets/products/1618365237.jpg', NULL, '2021-04-14 01:53:57', '2021-04-14 01:53:57');
INSERT INTO `products` VALUES (10, 's44', '-', '/assets/products/1618365242.jpg', NULL, '2021-04-14 01:54:02', '2021-04-14 01:54:02');

-- ----------------------------
-- Table structure for products_qualities
-- ----------------------------
DROP TABLE IF EXISTS `products_qualities`;
CREATE TABLE `products_qualities`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `categories_sub_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products_qualities
-- ----------------------------
INSERT INTO `products_qualities` VALUES (1, 1, 1, '2021-03-30 13:08:28', '2021-03-30 13:08:28');
INSERT INTO `products_qualities` VALUES (2, 1, 4, '2021-03-30 13:09:17', '2021-03-30 13:09:17');
INSERT INTO `products_qualities` VALUES (3, 2, 2, '2021-03-30 13:18:22', '2021-03-30 13:18:22');
INSERT INTO `products_qualities` VALUES (4, 2, 3, '2021-03-30 13:18:27', '2021-03-30 13:18:27');
INSERT INTO `products_qualities` VALUES (5, 3, 4, '2021-03-30 14:05:38', '2021-04-06 13:41:43');
INSERT INTO `products_qualities` VALUES (6, 3, 2, '2021-03-30 14:05:43', '2021-03-30 14:05:43');
INSERT INTO `products_qualities` VALUES (7, 6, 2, '2021-04-13 14:14:03', '2021-04-13 14:14:03');
INSERT INTO `products_qualities` VALUES (8, 6, 4, '2021-04-13 14:14:08', '2021-04-13 14:14:22');
INSERT INTO `products_qualities` VALUES (9, 1, 5, '2021-04-14 01:50:34', '2021-04-14 01:50:34');
INSERT INTO `products_qualities` VALUES (10, 2, 6, '2021-04-14 01:50:40', '2021-04-14 01:50:40');
INSERT INTO `products_qualities` VALUES (11, 3, 7, '2021-04-14 01:50:44', '2021-04-14 01:50:44');
INSERT INTO `products_qualities` VALUES (12, 6, 5, '2021-04-14 01:50:49', '2021-04-14 01:50:49');
INSERT INTO `products_qualities` VALUES (13, 7, 2, '2021-04-14 01:54:14', '2021-04-14 01:54:14');
INSERT INTO `products_qualities` VALUES (14, 7, 9, '2021-04-14 01:54:22', '2021-04-14 01:54:22');
INSERT INTO `products_qualities` VALUES (15, 7, 5, '2021-04-14 01:54:38', '2021-04-14 01:54:38');
INSERT INTO `products_qualities` VALUES (16, 8, 1, '2021-04-14 01:56:59', '2021-04-14 01:56:59');
INSERT INTO `products_qualities` VALUES (17, 8, 4, '2021-04-14 01:57:04', '2021-04-14 01:57:04');
INSERT INTO `products_qualities` VALUES (18, 8, 6, '2021-04-14 01:57:09', '2021-04-14 01:57:09');
INSERT INTO `products_qualities` VALUES (19, 9, 8, '2021-04-14 01:57:15', '2021-04-14 01:57:15');
INSERT INTO `products_qualities` VALUES (20, 9, 9, '2021-04-14 01:57:21', '2021-04-14 01:57:21');
INSERT INTO `products_qualities` VALUES (21, 9, 6, '2021-04-14 01:57:25', '2021-04-14 01:57:25');
INSERT INTO `products_qualities` VALUES (22, 10, 2, '2021-04-14 01:57:34', '2021-04-14 01:57:34');
INSERT INTO `products_qualities` VALUES (23, 10, 4, '2021-04-14 01:57:39', '2021-04-14 01:57:39');
INSERT INTO `products_qualities` VALUES (24, 10, 6, '2021-04-14 01:57:45', '2021-04-14 01:57:45');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@app.com', '$2y$10$q1XRGEsKBoYEoKTt21Sp4uSKBavhuy6u/dE2r7N5kDjBRu5mac1de', '2021-03-30 12:58:18', '2021-04-06 16:00:42');
INSERT INTO `users` VALUES (2, 'a', 'a@a.com', '$2y$10$.SPX42yPHySYAFDpD0fad.t4nG7QIJLNMvRBLwauJ1MObWNgk4yYS', '2021-04-06 16:01:02', '2021-04-06 16:15:03');

SET FOREIGN_KEY_CHECKS = 1;
