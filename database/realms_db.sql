/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : realms_db

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 14/10/2021 13:15:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_courses
-- ----------------------------
DROP TABLE IF EXISTS `tbl_courses`;
CREATE TABLE `tbl_courses`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `image` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` smallint(11) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_courses
-- ----------------------------
INSERT INTO `tbl_courses` VALUES (1, 'RK5FMS', '456861-THEA KIRSTIE E YU.JPG', 'Demo 1', 'Demo 1', 1, '2021-09-27 18:58:32.945653');
INSERT INTO `tbl_courses` VALUES (2, 'QJP7FE', '753617my.jpg', 'asd', 'asd', 1, '2021-10-08 20:36:51.721957');
INSERT INTO `tbl_courses` VALUES (3, 'FHCX6C', '799252.jpg', 'asd', 'asd', 0, '2021-09-23 22:29:08.269806');
INSERT INTO `tbl_courses` VALUES (4, 'IZN6VA', '945783comshop.png', 'asdasd', 'asdasd', 0, '2021-09-23 22:24:22.948862');
INSERT INTO `tbl_courses` VALUES (5, 'A3CLUL', '5249102-Eric O. Descartin.jpg', 'Eric', 'asdasd', 1, '2021-09-23 23:31:43.496433');

-- ----------------------------
-- Table structure for tbl_files
-- ----------------------------
DROP TABLE IF EXISTS `tbl_files`;
CREATE TABLE `tbl_files`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `module_id` int(40) NULL DEFAULT NULL,
  `temp_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `original_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` smallint(10) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_files
-- ----------------------------
INSERT INTO `tbl_files` VALUES (2, 2, '772421.jpg', '2-Eric O. Descartin.jpg', 0, '2021-09-29 03:29:32');
INSERT INTO `tbl_files` VALUES (3, 2, '69026.jpg', '1-THEA KIRSTIE E YU.JPG', 0, '2021-09-29 03:29:32');
INSERT INTO `tbl_files` VALUES (12, 1, '910802.jpg', '14-Anecita B. Amparo.jpg', 0, '2021-09-29 03:39:09');
INSERT INTO `tbl_files` VALUES (13, 1, '602225.jpg', '13-Fatima Blessie J. Licayan.jpg', 0, '2021-09-29 03:39:09');
INSERT INTO `tbl_files` VALUES (14, 1, '944898.jpg', '15-Draft.jpg', 0, '2021-09-29 03:39:09');
INSERT INTO `tbl_files` VALUES (15, 1, '240941.png', '15-Mary Jane P. Romulo.png', 0, '2021-09-29 03:39:09');
INSERT INTO `tbl_files` VALUES (16, 1, '934111.png', '16-Roma Maico C. Tubil.png', 0, '2021-09-29 03:39:10');
INSERT INTO `tbl_files` VALUES (18, 1, '606024.jpg', 'my.jpg', 0, '2021-09-29 04:16:52');
INSERT INTO `tbl_files` VALUES (19, 2, '487759.jpg', 'my.jpg', 0, '2021-09-29 04:18:06');
INSERT INTO `tbl_files` VALUES (20, 2, '781651.png', 'dashboard.png', 0, '2021-09-29 04:18:41');
INSERT INTO `tbl_files` VALUES (21, 2, '581020.jpg', 'my.jpg', 0, '2021-09-29 04:19:30');
INSERT INTO `tbl_files` VALUES (22, 3, '531125.jpg', 'my.jpg', 0, '2021-09-29 04:20:57');
INSERT INTO `tbl_files` VALUES (23, 3, '646122.png', 'dashboard.png', 0, '2021-09-29 04:21:13');
INSERT INTO `tbl_files` VALUES (24, 4, '298950.png', 'dashboard.png', 0, '2021-09-30 03:30:19');

-- ----------------------------
-- Table structure for tbl_modules
-- ----------------------------
DROP TABLE IF EXISTS `tbl_modules`;
CREATE TABLE `tbl_modules`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `course_id` int(40) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` smallint(10) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_modules
-- ----------------------------
INSERT INTO `tbl_modules` VALUES (1, 1, 'Hello', 1, NULL);
INSERT INTO `tbl_modules` VALUES (2, 1, 'World', 1, NULL);
INSERT INTO `tbl_modules` VALUES (3, 1, 'asdasd', 1, '2021-09-29 02:30:05');
INSERT INTO `tbl_modules` VALUES (4, 1, 'qwdasd', 1, '2021-09-29 02:31:38');

-- ----------------------------
-- Table structure for tbl_quizzes
-- ----------------------------
DROP TABLE IF EXISTS `tbl_quizzes`;
CREATE TABLE `tbl_quizzes`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `course_id` int(40) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `instructions` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `time_limit` int(40) NULL DEFAULT NULL,
  `multiple_attempts` binary(12) NULL DEFAULT NULL,
  `assign_everyone` binary(12) NULL DEFAULT NULL,
  `due` datetime(6) NULL DEFAULT NULL,
  `available_from` datetime(6) NULL DEFAULT NULL,
  `available_until` datetime(6) NULL DEFAULT NULL,
  `status` binary(12) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_quizzes
-- ----------------------------
INSERT INTO `tbl_quizzes` VALUES (1, 1, 'Hello World', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_quizzes` VALUES (19, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-09-30 04:40:17.000000');
INSERT INTO `tbl_quizzes` VALUES (20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-09-30 04:40:22.000000');
INSERT INTO `tbl_quizzes` VALUES (21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-09-30 04:43:20.000000');
INSERT INTO `tbl_quizzes` VALUES (22, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-09-30 05:17:14.000000');
INSERT INTO `tbl_quizzes` VALUES (23, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-10-05 20:44:55.000000');
INSERT INTO `tbl_quizzes` VALUES (24, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-10-05 23:09:17.000000');
INSERT INTO `tbl_quizzes` VALUES (25, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-10-07 23:48:09.000000');
INSERT INTO `tbl_quizzes` VALUES (26, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-10-08 00:52:52.000000');
INSERT INTO `tbl_quizzes` VALUES (27, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-10-08 03:07:44.000000');
INSERT INTO `tbl_quizzes` VALUES (28, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-10-08 09:40:45.000000');
INSERT INTO `tbl_quizzes` VALUES (29, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-10-08 18:18:53.000000');
INSERT INTO `tbl_quizzes` VALUES (30, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-10-08 22:05:51.000000');
INSERT INTO `tbl_quizzes` VALUES (31, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x300000000000000000000000, '2021-10-13 21:27:29.000000');
INSERT INTO `tbl_quizzes` VALUES (32, 2, 'asdfa', '<p>sdfasdfasdf</p>', 2, 0x310000000000000000000000, NULL, '2021-10-14 00:00:00.000000', '2021-10-14 00:00:00.000000', '2021-10-14 00:00:00.000000', 0x300000000000000000000000, '2021-10-14 13:14:38.000000');

-- ----------------------------
-- Table structure for tbl_quizzes_assign
-- ----------------------------
DROP TABLE IF EXISTS `tbl_quizzes_assign`;
CREATE TABLE `tbl_quizzes_assign`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(40) NULL DEFAULT NULL,
  `course_id` int(40) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_quizzes_assign
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_quizzes_question_answer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_quizzes_question_answer`;
CREATE TABLE `tbl_quizzes_question_answer`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `question_id` int(40) NULL DEFAULT NULL,
  `type` int(255) NULL DEFAULT NULL,
  `answer` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `comment` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `is_correct` binary(10) NULL DEFAULT NULL,
  `is_true` binary(10) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_quizzes_question_answer
-- ----------------------------
INSERT INTO `tbl_quizzes_question_answer` VALUES (1, 1, 1, 'asafgs', '<p>gklhjkl</p>', 0x31000000000000000000, NULL, '2021-10-14 11:59:43.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (2, 1, 1, 'klhjkl', '<p>hjklhj</p>', 0x30000000000000000000, NULL, '2021-10-14 11:59:43.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (3, 1, 1, 'hjklhjklhjkl', '<p>hjklhjkl</p>', 0x30000000000000000000, NULL, '2021-10-14 11:59:43.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (4, 1, 1, 'hjklhjkl', '<p>hjklhjklhjkl</p>', 0x30000000000000000000, NULL, '2021-10-14 11:59:43.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (5, 2, 1, 'asafgs', '<p>gklhjkl</p>', 0x31000000000000000000, NULL, '2021-10-14 11:59:56.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (6, 2, 1, 'klhjkl', '<p>hjklhj</p>', 0x30000000000000000000, NULL, '2021-10-14 11:59:56.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (7, 2, 1, 'hjklhjklhjkl', '<p>hjklhjkl</p>', 0x30000000000000000000, NULL, '2021-10-14 11:59:56.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (8, 2, 1, 'hjklhjkl', '<p>hjklhjklhjkl</p>', 0x30000000000000000000, NULL, '2021-10-14 11:59:56.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (9, 2, 1, 'asdfasdfasdf', '<p>aasdfasdfasdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 11:59:56.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (10, 3, 1, 'asafgs', '<p>gklhjkl</p>', 0x31000000000000000000, NULL, '2021-10-14 12:00:06.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (11, 3, 1, 'klhjkl', '<p>hjklhj</p>', 0x30000000000000000000, NULL, '2021-10-14 12:00:06.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (12, 3, 1, 'hjklhjklhjkl', '<p>hjklhjkl</p>', 0x30000000000000000000, NULL, '2021-10-14 12:00:06.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (13, 3, 1, 'asdfasdfasdf', '<p>aasdfasdfasdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 12:00:06.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (14, 3, 1, '', '', 0x30000000000000000000, NULL, '2021-10-14 12:00:06.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (15, 4, 1, 'asafgs', '<p>gklhjkl</p>', 0x30000000000000000000, NULL, '2021-10-14 12:00:13.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (16, 4, 1, 'klhjkl', '<p>hjklhj</p>', 0x30000000000000000000, NULL, '2021-10-14 12:00:13.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (17, 4, 1, 'hjklhjklhjkl', '<p>hjklhjkl</p>', 0x30000000000000000000, NULL, '2021-10-14 12:00:13.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (18, 4, 1, 'asdfasdfasdf', '<p>aasdfasdfasdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 12:00:13.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (19, 4, 1, '', '', 0x31000000000000000000, NULL, '2021-10-14 12:00:13.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (20, 5, 1, 'asdasd', '<p>asdasdasd</p>', 0x30000000000000000000, NULL, '2021-10-14 13:03:04.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (21, 5, 1, 'asdasd', '<p>asdasd</p>', 0x31000000000000000000, NULL, '2021-10-14 13:03:04.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (22, 5, 1, 'asdasdasd', '<p>asdasdas</p>', 0x30000000000000000000, NULL, '2021-10-14 13:03:04.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (23, 5, 1, 'asdasd', '<p>asdasdasdasdsdfgsdfsdfsdfsdfsddfsdfsdf</p>', 0x30000000000000000000, NULL, '2021-10-14 13:03:04.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (24, 6, 1, 'asdfasdf', '<p>fasdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 13:06:03.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (25, 6, 1, 'asdfasdf', '<ul><li><br></li></ul>asdfasdfa', 0x30000000000000000000, NULL, '2021-10-14 13:06:03.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (26, 6, 1, 'asdfasdf', '<p>asdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 13:06:03.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (27, 6, 1, 'asdfasdf', '<p>asdfasdfasdfasdfasdf</p>', 0x31000000000000000000, NULL, '2021-10-14 13:06:03.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (28, 7, 1, 'asdfasdf', '<p>fasdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 13:06:28.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (29, 7, 1, 'asdfasdf', '<ul><li><br></li></ul>asdfasdfa', 0x30000000000000000000, NULL, '2021-10-14 13:06:28.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (30, 7, 1, 'asdfasdf', '<p>asdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 13:06:28.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (31, 7, 1, 'asdfasdf', '<p>asdfasdfasdfasdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 13:06:28.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (32, 7, 1, 'asdasd', '<p>fasdasd</p>', 0x31000000000000000000, NULL, '2021-10-14 13:06:28.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (33, 8, 1, 'fghjfghj', '<p>hj;ljkl;jkl;jkl;</p>', 0x30000000000000000000, NULL, '2021-10-14 13:07:49.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (34, 8, 1, 'jkl;jkl;', '<p>jkl;jkl;</p>', 0x30000000000000000000, NULL, '2021-10-14 13:07:49.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (35, 8, 1, ';jkl;', '<p>fdfghjfghjfghj</p>', 0x31000000000000000000, NULL, '2021-10-14 13:07:49.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (36, 8, 1, 'fghjfghj', '<p>fghjfghj</p>', 0x30000000000000000000, NULL, '2021-10-14 13:07:49.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (37, 9, 1, 'fghjfghj', '<p>hj;ljkl;jkl;jkl;</p>', 0x30000000000000000000, NULL, '2021-10-14 13:08:05.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (38, 9, 1, 'jkl;jkl;', '<p>jkl;jkl;</p>', 0x30000000000000000000, NULL, '2021-10-14 13:08:05.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (39, 9, 1, ';jkl;', '<p>fdfghjfghjfghj</p>', 0x31000000000000000000, NULL, '2021-10-14 13:08:05.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (40, 9, 1, 'fghjfghj', '<p>fghjfghj</p>', 0x30000000000000000000, NULL, '2021-10-14 13:08:05.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (41, 9, 1, 'sdfgsdfgsdfg', '<p>sdfgsdfgsdfg</p>', 0x30000000000000000000, NULL, '2021-10-14 13:08:05.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (42, 10, 1, 'asdfasdf', '<p>asdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 13:13:54.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (43, 10, 1, 'asdgsdfa', '<p>sdfgsdfg</p>', 0x30000000000000000000, NULL, '2021-10-14 13:13:54.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (44, 10, 1, 'sdfgsdfg', '<p>sdfgsdfgsdfg</p>', 0x30000000000000000000, NULL, '2021-10-14 13:13:54.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (45, 10, 1, 'sdfgsdfgdsfg', '<p>sdfgsdfgsdfg</p>', 0x31000000000000000000, NULL, '2021-10-14 13:13:54.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (46, 11, 1, 'asdfasdf', '<p>asdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 13:14:11.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (47, 11, 1, 'asdgsdfa', '<p>sdfgsdfg</p>', 0x30000000000000000000, NULL, '2021-10-14 13:14:11.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (48, 11, 1, 'sdfgsdfg', '<p>sdfgsdfgsdfg</p>', 0x30000000000000000000, NULL, '2021-10-14 13:14:11.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (49, 11, 1, 'sdfgsdfgdsfg', '<p>sdfgsdfgsdfg</p>', 0x30000000000000000000, NULL, '2021-10-14 13:14:11.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (50, 11, 1, 'asdfasdfasdf', '<p>123124</p>', 0x31000000000000000000, NULL, '2021-10-14 13:14:11.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (51, 12, 1, 'asdfasdf', '<p>asdfasdf</p>', 0x30000000000000000000, NULL, '2021-10-14 13:14:18.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (52, 12, 1, 'asdgsdfa', '<p>sdfgsdfg</p>', 0x30000000000000000000, NULL, '2021-10-14 13:14:18.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (53, 12, 1, 'sdfgsdfg', '<p>sdfgsdfgsdfg</p>', 0x30000000000000000000, NULL, '2021-10-14 13:14:18.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (54, 12, 1, 'asdfasdfasdf', '<p>123124</p>', 0x31000000000000000000, NULL, '2021-10-14 13:14:18.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (55, 13, 1, 'sdfgsdfg', '<p>sdfgsdfgsdfg</p>', 0x30000000000000000000, NULL, '2021-10-14 13:14:38.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (56, 13, 1, 'asdfasdfasdf', '<p>123124</p>', 0x31000000000000000000, NULL, '2021-10-14 13:14:38.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (57, 13, 1, '32', '<p>32</p>', 0x30000000000000000000, NULL, '2021-10-14 13:14:38.000000');
INSERT INTO `tbl_quizzes_question_answer` VALUES (58, 13, 1, '432', '<p>4232</p>', 0x30000000000000000000, NULL, '2021-10-14 13:14:38.000000');

-- ----------------------------
-- Table structure for tbl_quizzes_questions
-- ----------------------------
DROP TABLE IF EXISTS `tbl_quizzes_questions`;
CREATE TABLE `tbl_quizzes_questions`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(40) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` int(10) NULL DEFAULT NULL,
  `question` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `points` int(255) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_quizzes_questions
-- ----------------------------
INSERT INTO `tbl_quizzes_questions` VALUES (1, 32, 'Question1', 1, '<p>gdsfhdfghdfghdfghdfgh</p>', 4, '2021-10-14 11:59:43.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (2, 32, 'Question1', 1, '<p>gdsfhdfghdfghdfghdfgh</p>', 4, '2021-10-14 11:59:56.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (3, 32, 'Question1', 1, '<p>gdsfhdfghdfghdfghdfgh</p>', 4, '2021-10-14 12:00:06.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (4, 32, 'Question1', 1, '<p>gdsfhdfghdfghdfghdfgh</p>', 4, '2021-10-14 12:00:13.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (5, 32, 'Question1', 1, '<p>asdasdasd</p>', 3, '2021-10-14 13:03:04.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (6, 32, 'Question1', 1, '<p>dfhjhgjkghjk</p>', 3, '2021-10-14 13:06:03.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (7, 32, 'Question1', 1, '<p>dfhjhgjkghjk</p>', 3, '2021-10-14 13:06:28.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (8, 32, 'fghjfghjfghj', 1, '<p>fghjfghjfghj</p>', 1, '2021-10-14 13:07:49.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (9, 32, 'fghjfghjfghj', 1, '<p>fghjfghjfghj</p>', 1, '2021-10-14 13:08:05.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (10, 32, 'Question1', 1, '<p>sadfsadf</p>', 1, '2021-10-14 13:13:54.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (11, 32, 'Question1', 1, '<p>sadfsadf</p>', 1, '2021-10-14 13:14:11.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (12, 32, 'Question1', 1, '<p>sadfsadf</p>', 1, '2021-10-14 13:14:18.000000');
INSERT INTO `tbl_quizzes_questions` VALUES (13, 32, 'Question1', 1, '<p>sadfsadf</p>', 1, '2021-10-14 13:14:38.000000');

-- ----------------------------
-- Table structure for tbl_user_details
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_details`;
CREATE TABLE `tbl_user_details`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `users_id` int(40) NULL DEFAULT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `middlename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthdate` date NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contact` decimal(65, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user_details
-- ----------------------------
INSERT INTO `tbl_user_details` VALUES (1, 1, 'marwen', 'aspe', 'valeroso', '1998-03-08', 'male', 'marwenvaleroso@gmail.com', 912345678);

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (1, 'mavaleroso', '12345', 'teacher', '2021-08-25 20:05:20.813432');
INSERT INTO `tbl_users` VALUES (2, 'cadalisay', '12345', NULL, '2021-08-24 14:54:28.000000');

SET FOREIGN_KEY_CHECKS = 1;
