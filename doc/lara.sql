/*
 Navicat Premium Data Transfer

 Source Server         : 本地root
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : 66.66.66.66:3306
 Source Schema         : fam

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 03/01/2019 17:25:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fam_menu
-- ----------------------------
DROP TABLE IF EXISTS `fam_menu`;
CREATE TABLE `fam_menu`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` datetime(0) NOT NULL DEFAULT '1970-01-01 00:00:00',
  `updated_at` datetime(0) NOT NULL DEFAULT '1970-01-01 00:00:00',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `m_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单名称',
  `url` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'url',
  `action_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '权限码',
  `root_id` int(11) NOT NULL COMMENT '根ID',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `action_id`(`action_code`) USING BTREE,
  INDEX `url`(`url`) USING BTREE,
  INDEX `root_id`(`root_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '页面菜单表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fam_menu
-- ----------------------------
INSERT INTO `fam_menu` VALUES (1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '系统设置', '', '0', 0);
INSERT INTO `fam_menu` VALUES (2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '用户管理', 'auth.user.index', 'auth.user.index', 1);
INSERT INTO `fam_menu` VALUES (3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '角色管理', 'auth.role.index', 'auth.role.index', 1);
INSERT INTO `fam_menu` VALUES (4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '权限管理', 'auth.permission.index', 'auth.permission.index', 1);
INSERT INTO `fam_menu` VALUES (5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '其他管理', '', '0', 1);
INSERT INTO `fam_menu` VALUES (6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, '其他管理一', 'auth.role.index', '6', 1);
INSERT INTO `fam_menu` VALUES (7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, '其他管理二', 'auth.role.index', '7', 1);
INSERT INTO `fam_menu` VALUES (8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '任务配置', 'auth.role.index', '0', 0);
INSERT INTO `fam_menu` VALUES (9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, '任务配置二级', 'auth.role.index', '0', 8);
INSERT INTO `fam_menu` VALUES (10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, '任务配置三级', 'auth.role.index', '0', 8);
INSERT INTO `fam_menu` VALUES (11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, '测试菜单三级', 'auth.role.index', '0', 13);
INSERT INTO `fam_menu` VALUES (12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 13, '测试菜单二级', 'auth.role.index', '0', 13);
INSERT INTO `fam_menu` VALUES (13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '测试菜单一级', 'auth.role.index', '0', 0);
INSERT INTO `fam_menu` VALUES (14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, '测试菜单二级(1)', 'auth.role.index', '0', 15);
INSERT INTO `fam_menu` VALUES (15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '测试菜单一级(1)', 'auth.role.index', '0', 0);
INSERT INTO `fam_menu` VALUES (16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, '测试菜单三级(1)', 'auth.role.index', 'auth.role.index', 15);

-- ----------------------------
-- Table structure for fam_users
-- ----------------------------
DROP TABLE IF EXISTS `fam_users`;
CREATE TABLE `fam_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fam_users
-- ----------------------------
INSERT INTO `fam_users` VALUES (1, 'admin', 'admin@123.com', NULL, '$2y$10$8f6IgxT7aYg8xoZ8U57cweqJVAevgrUE4GLn3T5Wu7JRWPhUR2zYO', 'qGXbKfdzgQUAUSm1tqDjp3onYlCWa5AZqMrs8zftRwe4994NgaxZdLTBpXUo', '2018-12-30 10:31:11', '2019-01-02 07:27:07');
INSERT INTO `fam_users` VALUES (2, 'test1', 'test1@123.com', NULL, '$2y$10$AV04YarAnec0/TPifvOMJePRiQJA/hVkKsmK1zzFTYLZsDfG1RM.K', 'AUKdFfRGa1xgjZ7DallexuPduBG4TjjLe50ZSOrtmXgbuSmsDustw4pKZOcI', '2019-01-02 02:38:48', '2019-01-03 08:18:05');
INSERT INTO `fam_users` VALUES (4, 'test2', 'test2@qq.com', NULL, '$2y$10$SnTmnPjwKR3dS60tyyfAaOJH9tDadeEvsWyGxmQW9z0wYIcDuFR.u', NULL, '2019-01-03 03:55:22', '2019-01-03 03:55:41');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_12_29_103407_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (4, '2018_12_29_114753_create_posts_table', 2);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (4, 'App\\Http\\Models\\Auth\\User', 1);
INSERT INTO `model_has_roles` VALUES (5, 'App\\Http\\Models\\Auth\\User', 2);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Http\\Models\\Auth\\User', 4);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (3, 'Administer', 'web', '2018-12-30 11:47:55', '2018-12-30 11:47:55');
INSERT INTO `permissions` VALUES (4, 'post.create', 'web', '2018-12-30 11:55:24', '2018-12-30 11:55:24');
INSERT INTO `permissions` VALUES (5, 'post.edit', 'web', '2018-12-30 11:55:38', '2018-12-30 11:55:38');
INSERT INTO `permissions` VALUES (7, 'home', 'web', '2019-01-02 08:22:08', '2019-01-02 08:22:08');
INSERT INTO `permissions` VALUES (10, 'auth.user.index', 'web', '2019-01-03 08:12:43', '2019-01-03 08:12:43');
INSERT INTO `permissions` VALUES (11, 'auth.role.index', 'web', '2019-01-03 08:12:54', '2019-01-03 08:12:54');
INSERT INTO `permissions` VALUES (12, 'auth.permission.index', 'web', '2019-01-03 08:13:01', '2019-01-03 08:13:01');
INSERT INTO `permissions` VALUES (14, 'auth.user.store', 'web', '2019-01-03 08:23:06', '2019-01-03 08:23:06');
INSERT INTO `permissions` VALUES (16, 'auth.user.create', 'web', '2019-01-03 08:23:34', '2019-01-03 08:23:34');
INSERT INTO `permissions` VALUES (17, 'auth.user.update', 'web', '2019-01-03 08:23:53', '2019-01-03 08:23:53');
INSERT INTO `permissions` VALUES (18, 'auth.user.destroy', 'web', '2019-01-03 08:24:03', '2019-01-03 08:24:03');
INSERT INTO `permissions` VALUES (19, 'auth.user.show', 'web', '2019-01-03 08:24:14', '2019-01-03 08:24:14');
INSERT INTO `permissions` VALUES (20, 'auth.user.edit', 'web', '2019-01-03 08:24:27', '2019-01-03 08:24:27');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, '测试任务', 'fawfewafdewa', '2019-01-02 08:48:27', '2019-01-02 08:48:27');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (4, 3);
INSERT INTO `role_has_permissions` VALUES (7, 3);
INSERT INTO `role_has_permissions` VALUES (3, 4);
INSERT INTO `role_has_permissions` VALUES (4, 4);
INSERT INTO `role_has_permissions` VALUES (5, 4);
INSERT INTO `role_has_permissions` VALUES (7, 4);
INSERT INTO `role_has_permissions` VALUES (10, 5);
INSERT INTO `role_has_permissions` VALUES (11, 5);
INSERT INTO `role_has_permissions` VALUES (12, 5);
INSERT INTO `role_has_permissions` VALUES (20, 5);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (3, 'Owner', 'web', '2018-12-30 11:56:19', '2018-12-30 11:56:19');
INSERT INTO `roles` VALUES (4, 'Admin', 'web', '2018-12-30 11:59:29', '2018-12-30 11:59:29');
INSERT INTO `roles` VALUES (5, 'test', 'web', '2019-01-03 06:23:19', '2019-01-03 08:13:23');
INSERT INTO `roles` VALUES (6, '测试角色', 'web', '2019-01-03 06:24:12', '2019-01-03 06:24:12');

SET FOREIGN_KEY_CHECKS = 1;
