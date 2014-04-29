<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1398344784.
 * Generated on 2014-04-24 15:06:24 by poldotz
 */
class PropelMigration_1398344784
{

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'propel' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;


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
    `child` INTEGER(4) NOT NULL,
    `conctact` VARCHAR(100),
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
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- arrival
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `arrival`;

CREATE TABLE `arrival`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `booking_id` INTEGER NOT NULL,
    `day` DATE NOT NULL,
    `hour` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER NOT NULL,
    `locality_from` INTEGER NOT NULL,
    `locality_to` INTEGER NOT NULL,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
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
    `booking_id` INTEGER NOT NULL,
    `day` DATE NOT NULL,
    `hour` TIME,
    `pick_up` TINYINT(1) DEFAULT 0,
    `departure_time` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER NOT NULL,
    `locality_from` INTEGER NOT NULL,
    `locality_to` INTEGER NOT NULL,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
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
    `child` INTEGER(4) NOT NULL,
    `conctact` VARCHAR(100),
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
    `booking_id` INTEGER NOT NULL,
    `day` DATE NOT NULL,
    `hour` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER NOT NULL,
    `locality_from` INTEGER NOT NULL,
    `locality_to` INTEGER NOT NULL,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
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
    `booking_id` INTEGER NOT NULL,
    `day` DATE NOT NULL,
    `hour` TIME,
    `pick_up` TINYINT(1) DEFAULT 0,
    `departure_time` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER NOT NULL,
    `locality_from` INTEGER NOT NULL,
    `locality_to` INTEGER NOT NULL,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
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
    `child` INTEGER(4) NOT NULL,
    `conctact` VARCHAR(100),
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
    `booking_id` INTEGER NOT NULL,
    `day` DATE NOT NULL,
    `hour` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER NOT NULL,
    `locality_from` INTEGER NOT NULL,
    `locality_to` INTEGER NOT NULL,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
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
    `booking_id` INTEGER NOT NULL,
    `day` DATE NOT NULL,
    `hour` TIME,
    `pick_up` TINYINT(1) DEFAULT 0,
    `departure_time` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL(10,2),
    `note` VARCHAR(100),
    `payment_method_id` INTEGER NOT NULL,
    `locality_from` INTEGER NOT NULL,
    `locality_to` INTEGER NOT NULL,
    `driver_id` INTEGER,
    `vehicle_id` INTEGER,
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
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'propel' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `company`
    ADD `lat` DECIMAL(18,2) AFTER `formatted_address`,
    ADD `lon` DECIMAL(18,2) AFTER `lat`;

ALTER TABLE `company` DROP `latitude`;

ALTER TABLE `company` DROP `longitude`;

ALTER TABLE `sf_guard_user_profile`
    ADD `lat` DECIMAL(18,2) AFTER `formatted_address`,
    ADD `lon` DECIMAL(18,2) AFTER `lat`;

ALTER TABLE `sf_guard_user_profile` DROP `latitude`;

ALTER TABLE `sf_guard_user_profile` DROP `longitude`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}