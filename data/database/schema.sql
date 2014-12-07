



-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'crimes'
-- 
-- ---

DROP TABLE IF EXISTS `crimes`;
		
CREATE TABLE `crimes` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `areaid` INTEGER NULL DEFAULT NULL,
  `cityid` INTEGER NULL DEFAULT NULL,
  `type` VARCHAR(50) NULL DEFAULT NULL,
  `amount` INTEGER NULL DEFAULT NULL,
  `year` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'areas'
-- 
-- ---

DROP TABLE IF EXISTS `areas`;
		
CREATE TABLE `areas` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `cityid` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'cities'
-- 
-- ---

DROP TABLE IF EXISTS `cities`;
		
CREATE TABLE `cities` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(25) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

-- ALTER TABLE `crimes` ADD FOREIGN KEY (areaid) REFERENCES `areas` (`id`);
-- ALTER TABLE `crimes` ADD FOREIGN KEY (cityid) REFERENCES `cities` (`id`);
-- ALTER TABLE `areas` ADD FOREIGN KEY (cityid) REFERENCES `cities` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `crimes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `areas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `cities` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `crimes` (`id`,`areaid`,`cityid`,`type`,`amount`,`year`) VALUES
-- ('','','','','','');
-- INSERT INTO `areas` (`id`,`name`,`coords`,`cityid`) VALUES
-- ('','','','');
-- INSERT INTO `cities` (`id`,`name`) VALUES
-- ('','');
