<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1399974388.
 * Generated on 2014-05-13 11:46:28 by lpodda
 */
class PropelMigration_1399974388
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

ALTER TABLE `arrival`
    ADD `rate_cost` DECIMAL(10,2) AFTER `flight`,
    ADD `calculated_cost` DECIMAL(10,2) DEFAULT 0.00 NOT NULL AFTER `rate_cost`,
    ADD `rate_name` VARCHAR(20) AFTER `calculated_cost`;

ALTER TABLE `arrival` DROP `cost`;

ALTER TABLE `arrival_version`
    ADD `rate_cost` DECIMAL(10,2) AFTER `flight`,
    ADD `calculated_cost` DECIMAL(10,2) DEFAULT 0.00 NOT NULL AFTER `rate_cost`,
    ADD `rate_name` VARCHAR(20) AFTER `calculated_cost`;

ALTER TABLE `arrival_version` DROP `cost`;

ALTER TABLE `booking` CHANGE `child` `child` INTEGER(4) DEFAULT 0  ;

ALTER TABLE `booking_version` CHANGE `child` `child` INTEGER(4) DEFAULT 0  ;

ALTER TABLE `departure`
    ADD `rate_cost` DECIMAL(10,2) AFTER `flight`,
    ADD `calculated_cost` DECIMAL(10,2) DEFAULT 0.00 NOT NULL AFTER `rate_cost`,
    ADD `rate_name` VARCHAR(20) AFTER `calculated_cost`;

ALTER TABLE `departure` DROP `cost`;

ALTER TABLE `departure_version`
    ADD `rate_cost` DECIMAL(10,2) AFTER `flight`,
    ADD `calculated_cost` DECIMAL(10,2) DEFAULT 0.00 NOT NULL AFTER `rate_cost`,
    ADD `rate_name` VARCHAR(20) AFTER `calculated_cost`;

ALTER TABLE `departure_version` DROP `cost`;

ALTER TABLE `rate`
    ADD `version` INTEGER DEFAULT 0 AFTER `updated_at`,
    ADD `version_created_at` DATETIME AFTER `version`,
    ADD `version_created_by` VARCHAR(100) AFTER `version_created_at`;

CREATE TABLE `customer_rate_table`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `customer_id` INTEGER NOT NULL,
    `rate_id` INTEGER NOT NULL,
    `vehicle_type_id` INTEGER NOT NULL,
    `cost` DECIMAL(10,2) DEFAULT 0.00 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `customer_rate_table_index` (`customer_id`, `rate_id`, `vehicle_type_id`),
    INDEX `customer_rate_table_FI_1` (`rate_id`),
    INDEX `customer_rate_table_FI_3` (`vehicle_type_id`),
    CONSTRAINT `customer_rate_table_FK_1`
        FOREIGN KEY (`rate_id`)
        REFERENCES `rate` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `customer_rate_table_FK_2`
        FOREIGN KEY (`customer_id`)
        REFERENCES `sf_guard_user_profile` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `customer_rate_table_FK_3`
        FOREIGN KEY (`vehicle_type_id`)
        REFERENCES `vehicle_type` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `rate_version`
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
    `version` INTEGER DEFAULT 0 NOT NULL,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    `customer_rate_table_ids` TEXT,
    `customer_rate_table_versions` TEXT,
    PRIMARY KEY (`id`,`version`),
    CONSTRAINT `rate_version_FK_1`
        FOREIGN KEY (`id`)
        REFERENCES `rate` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `customer_rate_table_version`
(
    `id` INTEGER NOT NULL,
    `customer_id` INTEGER NOT NULL,
    `rate_id` INTEGER NOT NULL,
    `vehicle_type_id` INTEGER NOT NULL,
    `cost` DECIMAL(10,2) DEFAULT 0.00 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0 NOT NULL,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    `rate_id_version` INTEGER DEFAULT 0,
    PRIMARY KEY (`id`,`version`),
    CONSTRAINT `customer_rate_table_version_FK_1`
        FOREIGN KEY (`id`)
        REFERENCES `customer_rate_table` (`id`)
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

DROP TABLE IF EXISTS `customer_rate_table`;

DROP TABLE IF EXISTS `rate_version`;

DROP TABLE IF EXISTS `customer_rate_table_version`;

ALTER TABLE `arrival`
    ADD `cost` DECIMAL AFTER `flight`;

ALTER TABLE `arrival` DROP `rate_cost`;

ALTER TABLE `arrival` DROP `calculated_cost`;

ALTER TABLE `arrival` DROP `rate_name`;

ALTER TABLE `arrival_version`
    ADD `cost` DECIMAL AFTER `flight`;

ALTER TABLE `arrival_version` DROP `rate_cost`;

ALTER TABLE `arrival_version` DROP `calculated_cost`;

ALTER TABLE `arrival_version` DROP `rate_name`;

ALTER TABLE `booking` CHANGE `child` `child` INTEGER(4) DEFAULT 0;

ALTER TABLE `booking_version` CHANGE `child` `child` INTEGER(4) DEFAULT 0;

ALTER TABLE `departure`
    ADD `cost` DECIMAL AFTER `flight`;

ALTER TABLE `departure` DROP `rate_cost`;

ALTER TABLE `departure` DROP `calculated_cost`;

ALTER TABLE `departure` DROP `rate_name`;

ALTER TABLE `departure_version`
    ADD `cost` DECIMAL AFTER `flight`;

ALTER TABLE `departure_version` DROP `rate_cost`;

ALTER TABLE `departure_version` DROP `calculated_cost`;

ALTER TABLE `departure_version` DROP `rate_name`;

ALTER TABLE `rate` DROP `version`;

ALTER TABLE `rate` DROP `version_created_at`;

ALTER TABLE `rate` DROP `version_created_by`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}