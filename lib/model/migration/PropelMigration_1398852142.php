<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1398852142.
 * Generated on 2014-04-30 12:02:22 by poldotz
 */
class PropelMigration_1398852142
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


ALTER TABLE `arrival` CHANGE `booking_id` `booking_id` INTEGER NOT NULL;

ALTER TABLE `arrival_version` CHANGE `booking_id` `booking_id` INTEGER NOT NULL;

ALTER TABLE `departure` CHANGE `booking_id` `booking_id` INTEGER NOT NULL;

ALTER TABLE `departure_version` CHANGE `booking_id` `booking_id` INTEGER NOT NULL;

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

ALTER TABLE `arrival` CHANGE `booking_id` `booking_id` INTEGER;

ALTER TABLE `arrival` CHANGE `cost` `cost` DECIMAL;

ALTER TABLE `arrival_version` CHANGE `booking_id` `booking_id` INTEGER;

ALTER TABLE `arrival_version` CHANGE `cost` `cost` DECIMAL;

ALTER TABLE `departure` CHANGE `booking_id` `booking_id` INTEGER;

ALTER TABLE `departure` CHANGE `cost` `cost` DECIMAL;

ALTER TABLE `departure_version` CHANGE `booking_id` `booking_id` INTEGER;

ALTER TABLE `departure_version` CHANGE `cost` `cost` DECIMAL;

CREATE TABLE `arrival_archive`
(
    `id` INTEGER NOT NULL,
    `booking_id` INTEGER NOT NULL,
    `day` DATE NOT NULL,
    `hour` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL,
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
) ENGINE=MyISAM;

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
    INDEX `booking_archive_I_3` (`year`(4), `number`(12))
) ENGINE=MyISAM;

CREATE TABLE `departure_archive`
(
    `id` INTEGER NOT NULL,
    `booking_id` INTEGER NOT NULL,
    `day` DATE NOT NULL,
    `hour` TIME,
    `pick_up` TINYINT(1) DEFAULT 0,
    `departure_time` TIME,
    `flight` VARCHAR(10),
    `cost` DECIMAL,
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
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}