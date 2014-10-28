
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- tl_tasks
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tl_tasks`;

CREATE TABLE `tl_tasks`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `task` VARCHAR(255) NOT NULL COMMENT 'Name of the task',
    `arguments` VARCHAR(255) COMMENT 'List of arguments',
    `options` VARCHAR(255) COMMENT 'List of options',
    `count_processed` INTEGER DEFAULT 0 NOT NULL COMMENT 'Count of processed records',
    `count_not_processed` INTEGER DEFAULT 0 NOT NULL COMMENT 'Count of NOT processed records',
    `is_running` TINYINT(1) DEFAULT 0 NOT NULL COMMENT 'Flat that tells if task is actually runing',
    `last_id_processed` INTEGER COMMENT 'Last record Id fully processed without error',
    `started_at` DATETIME COMMENT 'Process start time',
    `ended_at` DATETIME COMMENT 'Process end time',
    `is_ok` TINYINT(1) DEFAULT 0 NOT NULL COMMENT 'Flag that tells if task finished without error',
    `error_code` INTEGER COMMENT 'Error code for success or failure',
    `log` TEXT COMMENT 'The full console output of the task',
    `log_file` VARCHAR(255) COMMENT 'Log file associated to the task',
    `comments` TEXT COMMENT 'Additional admin comments about the task and its results',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
