<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1416088390.
 * Generated on 2014-11-15 22:53:10 by poldotz
 */
class PropelMigration_1416088390
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


CREATE TABLE `customer_rate`
(
    `customer_id` INTEGER NOT NULL,
    `rate_id` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`customer_id`,`rate_id`),
    INDEX `customer_rate_FI_2` (`rate_id`),
    CONSTRAINT `customer_rate_FK_1`
        FOREIGN KEY (`customer_id`)
        REFERENCES `sf_guard_user_profile` (`id`),
    CONSTRAINT `customer_rate_FK_2`
        FOREIGN KEY (`rate_id`)
        REFERENCES `rate` (`id`)
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

DROP TABLE IF EXISTS `customer_rate`;

ALTER TABLE `arrival` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `arrival` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `arrival_version` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `arrival_version` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `booking` CHANGE `child` `child` INTEGER(4) DEFAULT 0;

ALTER TABLE `booking_version` CHANGE `child` `child` INTEGER(4) DEFAULT 0;

ALTER TABLE `departure` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `departure` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `departure_version` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `departure_version` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `rate_version`
    ADD `customer_rate_table_ids` TEXT AFTER `version_created_by`,
    ADD `customer_rate_table_versions` TEXT AFTER `customer_rate_table_ids`;

ALTER TABLE `tl_tasks` CHANGE `is_running` `is_running` TINYINT(1) DEFAULT 0 NOT NULL;

ALTER TABLE `tl_tasks` CHANGE `is_ok` `is_ok` TINYINT(1) DEFAULT 0 NOT NULL;

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