
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- company
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `vat_number` VARCHAR(20) NOT NULL,
    `phone` VARCHAR(20),
    `fax` VARCHAR(20),
    `mobile` VARCHAR(20),
    `email` VARCHAR(100),
    `site` VARCHAR(150),
    `formatted_address` VARCHAR(150),
    `lat` DECIMAL(18,2),
    `lon` DECIMAL(18,2),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- vehicle_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_type`;

CREATE TABLE `vehicle_type`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- vehicle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle`;

CREATE TABLE `vehicle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `vehicle_type_id` INTEGER NOT NULL,
    `model` VARCHAR(100) NOT NULL,
    `plate_number` VARCHAR(20),
    `frame_number` VARCHAR(50),
    `mileage` BIGINT,
    `note` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `vehicle_FI_1` (`vehicle_type_id`),
    CONSTRAINT `vehicle_FK_1`
        FOREIGN KEY (`vehicle_type_id`)
        REFERENCES `vehicle_type` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- customer_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `customer_type`;

CREATE TABLE `customer_type`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sf_guard_user_profile
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;

CREATE TABLE `sf_guard_user_profile`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER,
    `customer_type_id` INTEGER,
    `name` VARCHAR(100) NOT NULL,
    `vat_number` VARCHAR(12),
    `tax_code` VARCHAR(16),
    `phone` VARCHAR(20),
    `fax` VARCHAR(20),
    `mobile` VARCHAR(20),
    `email` VARCHAR(100),
    `site` VARCHAR(150),
    `formatted_address` VARCHAR(150),
    `lat` DECIMAL(18,2),
    `lon` DECIMAL(18,2),
    `iban` VARCHAR(27),
    `bic` VARCHAR(11),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `sf_guard_user_profile_FI_1` (`user_id`),
    INDEX `sf_guard_user_profile_FI_2` (`customer_type_id`),
    CONSTRAINT `sf_guard_user_profile_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `sf_guard_user` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `sf_guard_user_profile_FK_2`
        FOREIGN KEY (`customer_type_id`)
        REFERENCES `customer_type` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- locality
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `locality`;

CREATE TABLE `locality`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER,
    `is_vector` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `name` VARCHAR(200) NOT NULL,
    `phone` VARCHAR(20),
    `fax` VARCHAR(20),
    `mobile` VARCHAR(20),
    `email` VARCHAR(100),
    `site` VARCHAR(150),
    `formatted_address` VARCHAR(150),
    `lat` DECIMAL(18,2),
    `lon` DECIMAL(18,2),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `locality_FI_1` (`user_id`),
    CONSTRAINT `locality_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `sf_guard_user` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
