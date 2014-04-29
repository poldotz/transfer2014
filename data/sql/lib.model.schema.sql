
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- airport
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `airport`;

CREATE TABLE `airport`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(5) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `city` VARCHAR(100) NOT NULL,
    `country` VARCHAR(100) NOT NULL,
    `lat` DOUBLE(10,8) NOT NULL,
    `lng` DOUBLE(10,8) NOT NULL,
    `timezone` VARCHAR(100) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `aita_code` (`code`)
) ENGINE=InnoDB;

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
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `latitude` DOUBLE(10,8),
    `longitude` DOUBLE(10,8),
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
    `iban` VARCHAR(27),
    `bic` VARCHAR(11),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `latitude` DOUBLE(10,8),
    `longitude` DOUBLE(10,8),
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
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `latitude` DOUBLE(10,8),
    `longitude` DOUBLE(10,8),
    PRIMARY KEY (`id`),
    INDEX `locality_FI_1` (`user_id`),
    CONSTRAINT `locality_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `sf_guard_user` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- booking
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `booking_date` DATETIME NOT NULL,
    `year` INTEGER(4) NOT NULL,
    `number` INTEGER(12) NOT NULL,
    `adult` INTEGER(4) NOT NULL,
    `child` INTEGER(4) DEFAULT 0,
    `contact` VARCHAR(100),
    `rif_file` VARCHAR(20),
    `customer_id` INTEGER NOT NULL,
    `vehicle_type_id` INTEGER NOT NULL,
    `is_confirmed` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `identification_number` (`year`, `number`),
    INDEX `booking_FI_1` (`customer_id`),
    INDEX `booking_FI_2` (`vehicle_type_id`),
    CONSTRAINT `booking_FK_1`
        FOREIGN KEY (`customer_id`)
        REFERENCES `sf_guard_user_profile` (`id`),
    CONSTRAINT `booking_FK_2`
        FOREIGN KEY (`vehicle_type_id`)
        REFERENCES `vehicle_type` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- payment_method
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `payment_method`;

CREATE TABLE `payment_method`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- arrival
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `arrival`;

CREATE TABLE `arrival`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `booking_id` INTEGER,
    `day` DATE,
    `hour` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER,
    `locality_from` INTEGER,
    `locality_to` INTEGER,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
    `cancelled` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `booking` (`booking_id`),
    INDEX `FI_ality_from` (`locality_from`),
    INDEX `FI_ality_to` (`locality_to`),
    INDEX `arrival_FI_4` (`payment_method_id`),
    INDEX `arrival_FI_5` (`driver_id`),
    INDEX `arrival_FI_6` (`vehicle_id`),
    CONSTRAINT `locality_from`
        FOREIGN KEY (`locality_from`)
        REFERENCES `locality` (`id`)
        ON UPDATE CASCADE,
    CONSTRAINT `locality_to`
        FOREIGN KEY (`locality_to`)
        REFERENCES `locality` (`id`)
        ON UPDATE CASCADE,
    CONSTRAINT `arrival_FK_3`
        FOREIGN KEY (`booking_id`)
        REFERENCES `booking` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `arrival_FK_4`
        FOREIGN KEY (`payment_method_id`)
        REFERENCES `payment_method` (`id`),
    CONSTRAINT `arrival_FK_5`
        FOREIGN KEY (`driver_id`)
        REFERENCES `sf_guard_user` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL,
    CONSTRAINT `arrival_FK_6`
        FOREIGN KEY (`vehicle_id`)
        REFERENCES `vehicle` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- departure
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `departure`;

CREATE TABLE `departure`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `booking_id` INTEGER,
    `day` DATE,
    `hour` TIME,
    `pick_up` TINYINT(1) DEFAULT 0,
    `departure_time` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER,
    `locality_from` INTEGER,
    `locality_to` INTEGER,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
    `cancelled` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `booking_departure` (`booking_id`),
    INDEX `FI_ality_from_departure` (`locality_from`),
    INDEX `FI_ality_to_departure` (`locality_to`),
    INDEX `departure_FI_4` (`payment_method_id`),
    INDEX `departure_FI_5` (`driver_id`),
    INDEX `departure_FI_6` (`vehicle_id`),
    CONSTRAINT `locality_from_departure`
        FOREIGN KEY (`locality_from`)
        REFERENCES `locality` (`id`)
        ON UPDATE CASCADE,
    CONSTRAINT `locality_to_departure`
        FOREIGN KEY (`locality_to`)
        REFERENCES `locality` (`id`)
        ON UPDATE CASCADE,
    CONSTRAINT `departure_FK_3`
        FOREIGN KEY (`booking_id`)
        REFERENCES `booking` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `departure_FK_4`
        FOREIGN KEY (`payment_method_id`)
        REFERENCES `payment_method` (`id`),
    CONSTRAINT `departure_FK_5`
        FOREIGN KEY (`driver_id`)
        REFERENCES `sf_guard_user` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL,
    CONSTRAINT `departure_FK_6`
        FOREIGN KEY (`vehicle_id`)
        REFERENCES `vehicle` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- booking_archive
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `booking_archive`;

CREATE TABLE `booking_archive`
(
    `id` INTEGER NOT NULL,
    `booking_date` DATETIME NOT NULL,
    `year` INTEGER(4) NOT NULL,
    `number` INTEGER(12) NOT NULL,
    `adult` INTEGER(4) NOT NULL,
    `child` INTEGER(4) DEFAULT 0,
    `contact` VARCHAR(100),
    `rif_file` VARCHAR(20),
    `customer_id` INTEGER NOT NULL,
    `vehicle_type_id` INTEGER NOT NULL,
    `is_confirmed` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `booking_archive_I_1` (`customer_id`),
    INDEX `booking_archive_I_2` (`vehicle_type_id`),
    INDEX `booking_archive_I_3` (`year`, `number`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- arrival_archive
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `arrival_archive`;

CREATE TABLE `arrival_archive`
(
    `id` INTEGER NOT NULL,
    `booking_id` INTEGER,
    `day` DATE,
    `hour` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER,
    `locality_from` INTEGER,
    `locality_to` INTEGER,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
    `cancelled` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `arrival_archive_I_1` (`locality_from`),
    INDEX `arrival_archive_I_2` (`locality_to`),
    INDEX `arrival_archive_I_3` (`payment_method_id`),
    INDEX `arrival_archive_I_4` (`driver_id`),
    INDEX `arrival_archive_I_5` (`vehicle_id`),
    INDEX `arrival_archive_I_6` (`booking_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- departure_archive
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `departure_archive`;

CREATE TABLE `departure_archive`
(
    `id` INTEGER NOT NULL,
    `booking_id` INTEGER,
    `day` DATE,
    `hour` TIME,
    `pick_up` TINYINT(1) DEFAULT 0,
    `departure_time` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER,
    `locality_from` INTEGER,
    `locality_to` INTEGER,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
    `cancelled` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `departure_archive_I_1` (`locality_from`),
    INDEX `departure_archive_I_2` (`locality_to`),
    INDEX `departure_archive_I_3` (`payment_method_id`),
    INDEX `departure_archive_I_4` (`driver_id`),
    INDEX `departure_archive_I_5` (`vehicle_id`),
    INDEX `departure_archive_I_6` (`booking_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- booking_version
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `booking_version`;

CREATE TABLE `booking_version`
(
    `id` INTEGER NOT NULL,
    `booking_date` DATETIME NOT NULL,
    `year` INTEGER(4) NOT NULL,
    `number` INTEGER(12) NOT NULL,
    `adult` INTEGER(4) NOT NULL,
    `child` INTEGER(4) DEFAULT 0,
    `contact` VARCHAR(100),
    `rif_file` VARCHAR(20),
    `customer_id` INTEGER NOT NULL,
    `vehicle_type_id` INTEGER NOT NULL,
    `is_confirmed` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0 NOT NULL,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    `arrival_ids` TEXT,
    `arrival_versions` TEXT,
    `departure_ids` TEXT,
    `departure_versions` TEXT,
    PRIMARY KEY (`id`,`version`),
    CONSTRAINT `booking_version_FK_1`
        FOREIGN KEY (`id`)
        REFERENCES `booking` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- arrival_version
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `arrival_version`;

CREATE TABLE `arrival_version`
(
    `id` INTEGER NOT NULL,
    `booking_id` INTEGER,
    `day` DATE,
    `hour` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER,
    `locality_from` INTEGER,
    `locality_to` INTEGER,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
    `cancelled` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0 NOT NULL,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    `booking_id_version` INTEGER DEFAULT 0,
    PRIMARY KEY (`id`,`version`),
    CONSTRAINT `arrival_version_FK_1`
        FOREIGN KEY (`id`)
        REFERENCES `arrival` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- departure_version
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `departure_version`;

CREATE TABLE `departure_version`
(
    `id` INTEGER NOT NULL,
    `booking_id` INTEGER,
    `day` DATE,
    `hour` TIME,
    `pick_up` TINYINT(1) DEFAULT 0,
    `departure_time` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER,
    `locality_from` INTEGER,
    `locality_to` INTEGER,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
    `cancelled` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0 NOT NULL,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    `booking_id_version` INTEGER DEFAULT 0,
    PRIMARY KEY (`id`,`version`),
    CONSTRAINT `departure_version_FK_1`
        FOREIGN KEY (`id`)
        REFERENCES `departure` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
