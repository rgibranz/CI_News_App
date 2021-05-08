CREATE TABLE `post` (
  `post_id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `slug` varchar(255),
  `subject` varchar(255),
  `image` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp,
  `category` varchar(255),
  `admin_id` int
);

CREATE TABLE `category` (
  `category_id` int PRIMARY KEY AUTO_INCREMENT,
  `category` varchar(255)
);

CREATE TABLE `admin` (
  `admin_id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `user` (
  `user_id` int PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `email` varchar(255),
  `username` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `comment` (
  `comment_id` int PRIMARY KEY AUTO_INCREMENT,
  `subject` varchar(255),
  `user_id` int,
  `post_id` int
);