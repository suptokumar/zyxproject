FAQ :
- View All
- Add New
- Manage Category

Banner Mangement
- List Banner, Edit
- Banner Category - Vendor Panel, Vendor App, User App, Driver App
- Banner Location - Admin can add/edit/delete banner locations
- Create Banner

Custom Pages
- List Custom Pages
- Add Custom Pages



Banner will have List, Add, Edit, delete option : fields : Name of Banner, Upload Image, Select Category, Select Location 

Banner Category - User App, Rider App, Vendor Panel, Vendor App - List, Add, Edit, Delete category : field : Name of Category

Banner Location : List, Add, edit, delete : field : Name of Location :





CREATE TABLE `zyxdemo_zyx`.`faq_category` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `status` ENUM('0','1') NOT NULL , `created_by` INT NOT NULL , `created_date` DATETIME NOT NULL , `update_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `zyxdemo_zyx`.`faqs`  ( `id` INT(11) NOT NULL AUTO_INCREMENT , `faq_category_id` INT(11) NOT NULL , `question` VARCHAR(255) NOT NULL , `answer` TEXT NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `zyxdemo_zyx`.`banners` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `image` TEXT NOT NULL , `category_id` INT(11) NOT NULL , `location_id` INT(11) NOT NULL , `status` ENUM('0','1') NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `zyxdemo_zyx`.`bannercategories` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `status` ENUM('0','1') NOT NULL , `created_by` INT NOT NULL , `created_date` DATETIME NOT NULL , `update_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `zyxdemo_zyx`.`bannerlocation` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `status` ENUM('0','1') NOT NULL , `created_by` INT NOT NULL , `created_date` DATETIME NOT NULL , `update_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `bannercategories` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `created_date` `created_at` DATETIME NOT NULL, CHANGE `update_date` `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `bannerlocation` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `created_date` `created_at` DATETIME NOT NULL, CHANGE `update_date` `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

CREATE TABLE `zyxdemo_zyx`.`pages` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `content` LONGTEXT NOT NULL , `status` ENUM('unpublish','publish') NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;