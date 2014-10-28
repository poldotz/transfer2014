<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1406652422.
 * Generated on 2014-07-29 18:47:02 by lpodda
 */
class PropelMigration_1406652422
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

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}