<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1401803472.
 * Generated on 2014-06-03 15:51:12 by lpodda
 */
class PropelMigration_1401803472
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

ALTER TABLE `sf_guard_user_profile` DROP FOREIGN KEY `sf_guard_user_profile_FK_1`;

ALTER TABLE `sf_guard_user_profile`
    ADD `is_active` TINYINT(1) DEFAULT 1 NOT NULL AFTER `id`;

ALTER TABLE `sf_guard_user_profile` ADD CONSTRAINT `sf_guard_user_profile_FK_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `sf_guard_user` (`id`)
    ON DELETE SET NULL;

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

ALTER TABLE `arrival` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `arrival` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `arrival_version` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `arrival_version` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `booking` CHANGE `child` `child` INTEGER(4) DEFAULT 0;

ALTER TABLE `booking_version` CHANGE `child` `child` INTEGER(4) DEFAULT 0;

ALTER TABLE `customer_rate_table` CHANGE `cost` `cost` DECIMAL DEFAULT 0.00 NOT NULL;

ALTER TABLE `customer_rate_table_version` CHANGE `cost` `cost` DECIMAL DEFAULT 0.00 NOT NULL;

ALTER TABLE `departure` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `departure` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `departure_version` CHANGE `rate_cost` `rate_cost` DECIMAL;

ALTER TABLE `departure_version` CHANGE `calculated_cost` `calculated_cost` DECIMAL DEFAULT 0.00;

ALTER TABLE `sf_guard_user_profile` DROP FOREIGN KEY `sf_guard_user_profile_FK_1`;

ALTER TABLE `sf_guard_user_profile` DROP `is_active`;

ALTER TABLE `sf_guard_user_profile` ADD CONSTRAINT `sf_guard_user_profile_FK_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `sf_guard_user` (`id`)
    ON DELETE CASCADE;

CREATE TABLE `arrival_archive`
(
    `id` INTEGER NOT NULL,
    `booking_id` INTEGER NOT NULL,
    `day` DATE,
    `hour` TIME,
    `flight` VARCHAR(10),
    `rate_cost` DECIMAL,
    `calculated_cost` DECIMAL DEFAULT 0.00 NOT NULL,
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
    `calculated_cost` DECIMAL DEFAULT 0.00 NOT NULL,
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

CREATE TABLE `rate_archive`
(
    `id` INTEGER NOT NULL,
    `name` VARCHAR(20) NOT NULL,
    `description` VARCHAR(100),
    `day` VARCHAR(7) NOT NULL,
    `hour_from` TIME NOT NULL,
    `hour_to` TIME NOT NULL,
    `surcharge` INTEGER(3),
    `per_person` TINYINT(1) DEFAULT 0,
    `note` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `rate_archive_I_1` (`name`(20))
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}