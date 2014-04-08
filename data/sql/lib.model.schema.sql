
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

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
