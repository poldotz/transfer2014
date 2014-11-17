<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1416079816.
 * Generated on 2014-11-15 20:30:16 by poldotz
 */
class PropelMigration_1416079816
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


ALTER TABLE `arrival` CHANGE `rate_cost` `rate_cost` DECIMAL(10,2);

ALTER TABLE `arrival` CHANGE `calculated_cost` `calculated_cost` DECIMAL(10,2) DEFAULT 0.00;

ALTER TABLE `arrival_version` CHANGE `rate_cost` `rate_cost` DECIMAL(10,2);

ALTER TABLE `arrival_version` CHANGE `calculated_cost` `calculated_cost` DECIMAL(10,2) DEFAULT 0.00;

ALTER TABLE `booking` CHANGE `child` `child` INTEGER(4) DEFAULT 0  ;

ALTER TABLE `booking`
    ADD `reduced` INTEGER(2) AFTER `adult`;

ALTER TABLE `booking_version` CHANGE `child` `child` INTEGER(4) DEFAULT 0  ;

ALTER TABLE `booking_version`
    ADD `reduced` INTEGER(2) AFTER `adult`;

ALTER TABLE `customer_rate_table` CHANGE `cost` `cost` DECIMAL(10,2) DEFAULT 0.00 NOT NULL;

ALTER TABLE `customer_rate_table_version` CHANGE `cost` `cost` DECIMAL(10,2) DEFAULT 0.00 NOT NULL;

ALTER TABLE `departure` CHANGE `rate_cost` `rate_cost` DECIMAL(10,2);

ALTER TABLE `departure` CHANGE `calculated_cost` `calculated_cost` DECIMAL(10,2) DEFAULT 0.00;

ALTER TABLE `departure_version` CHANGE `rate_cost` `rate_cost` DECIMAL(10,2);

ALTER TABLE `departure_version` CHANGE `calculated_cost` `calculated_cost` DECIMAL(10,2) DEFAULT 0.00;

ALTER TABLE `locality` CHANGE `formatted_address` `formatted_address` VARCHAR(150) NOT NULL;

ALTER TABLE `locality`
    ADD `area_id` INTEGER NOT NULL AFTER `longitude`;

CREATE INDEX `locality_FI_2` ON `locality` (`area_id`);

ALTER TABLE `locality` ADD CONSTRAINT `locality_FK_2`
    FOREIGN KEY (`area_id`)
    REFERENCES `area` (`id`);

ALTER TABLE `vehicle_type`
    ADD `per_person` TINYINT(1) DEFAULT 0 NOT NULL AFTER `name`;

CREATE TABLE `area`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `name` VARCHAR(200) NOT NULL,
    `latitude` DOUBLE(10,8),
    `longitude` DOUBLE(10,8),
    `viewport_sw_lt` DOUBLE(10,8),
    `viewport_sw_ln` DOUBLE(10,8),
    `viewport_ne_lt` DOUBLE(10,8),
    `viewport_ne_ln` DOUBLE(10,8),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `tl_tasks`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `task` VARCHAR(255) NOT NULL COMMENT \'Name of the task\',
    `arguments` VARCHAR(255) COMMENT \'List of arguments\',
    `options` VARCHAR(255) COMMENT \'List of options\',
    `count_processed` INTEGER DEFAULT 0 NOT NULL COMMENT \'Count of processed records\',
    `count_not_processed` INTEGER DEFAULT 0 NOT NULL COMMENT \'Count of NOT processed records\',
    `is_running` TINYINT(1) DEFAULT 0 NOT NULL COMMENT \'Flat that tells if task is actually runing\',
    `last_id_processed` INTEGER COMMENT \'Last record Id fully processed without error\',
    `started_at` DATETIME COMMENT \'Process start time\',
    `ended_at` DATETIME COMMENT \'Process end time\',
    `is_ok` TINYINT(1) DEFAULT 0 NOT NULL COMMENT \'Flag that tells if task finished without error\',
    `error_code` INTEGER COMMENT \'Error code for success or failure\',
    `log` TEXT COMMENT \'The full console output of the task\',
    `log_file` VARCHAR(255) COMMENT \'Log file associated to the task\',
    `comments` TEXT COMMENT \'Additional admin comments about the task and its results\',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

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

DROP TABLE IF EXISTS `area`;

DROP TABLE IF EXISTS `tl_tasks`;

ALTER TABLE `arrival` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `arrival` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `arrival_version` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `arrival_version` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `booking` CHANGE `child` `child` INTEGER(4) DEFAULT 0;

ALTER TABLE `booking` DROP `reduced`;

ALTER TABLE `booking_version` CHANGE `child` `child` INTEGER(4) DEFAULT 0;

ALTER TABLE `booking_version` DROP `reduced`;

ALTER TABLE `customer_rate_table` CHANGE `cost` `cost` DECIMAL DEFAULT 0.00 NOT NULL;

ALTER TABLE `customer_rate_table_version` CHANGE `cost` `cost` DECIMAL DEFAULT 0.00 NOT NULL;

ALTER TABLE `departure` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `departure` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `departure_version` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `departure_version` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `locality` DROP FOREIGN KEY `locality_FK_2`;

DROP INDEX `locality_FI_2` ON `locality`;

ALTER TABLE `locality` CHANGE `formatted_address` `formatted_address` VARCHAR(150);

ALTER TABLE `locality` DROP `area_id`;

ALTER TABLE `vehicle_type` DROP `per_person`;

CREATE TABLE `arrival_archive`
(
    `id` INTEGER NOT NULL,
    `booking_id` INTEGER NOT NULL,
    `day` DATE,
    `hour` TIME,
    `flight` VARCHAR(10),
    `rate_cost` DECIMAL,
    `calculated_cost` DECIMAL DEFAULT 0.00,
    `rate_name` VARCHAR(20),
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
) ENGINE=MyISAM;

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
    INDEX `booking_archive_I_3` (`year`(4), `number`(12))
) ENGINE=MyISAM;

CREATE TABLE `departure_archive`
(
    `id` INTEGER NOT NULL,
    `booking_id` INTEGER NOT NULL,
    `day` DATE,
    `hour` TIME,
    `pick_up` TINYINT(1) DEFAULT 0,
    `departure_time` TIME,
    `flight` VARCHAR(10),
    `rate_cost` DECIMAL,
    `calculated_cost` DECIMAL DEFAULT 0.00,
    `rate_name` VARCHAR(20),
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
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}