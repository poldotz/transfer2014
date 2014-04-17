<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1397681371.
 * Generated on 2014-04-16 22:49:31 by poldotz
 */
class PropelMigration_1397681371
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

ALTER TABLE `sf_guard_user_profile`
    ADD `customer_type_id` INTEGER NOT NULL AFTER `user_id`,
    ADD `name` VARCHAR(100) NOT NULL AFTER `customer_type_id`,
    ADD `vat_number` VARCHAR(12) AFTER `name`,
    ADD `tax_code` VARCHAR(16) AFTER `vat_number`,
    ADD `fax` VARCHAR(20) AFTER `phone`,
    ADD `mobile` VARCHAR(20) AFTER `fax`,
    ADD `email` VARCHAR(100) AFTER `mobile`,
    ADD `site` VARCHAR(150) AFTER `email`,
    ADD `formatted_address` VARCHAR(150) AFTER `site`,
    ADD `lat` DECIMAL(18,2) AFTER `formatted_address`,
    ADD `lon` DECIMAL(18,2) AFTER `lat`,
    ADD `iban` VARCHAR(27) AFTER `lon`,
    ADD `bic` VARCHAR(11) AFTER `iban`,
    ADD `created_at` DATETIME AFTER `bic`,
    ADD `updated_at` DATETIME AFTER `created_at`;

CREATE INDEX `sf_guard_user_profile_FI_2` ON `sf_guard_user_profile` (`customer_type_id`);

ALTER TABLE `sf_guard_user_profile` ADD CONSTRAINT `sf_guard_user_profile_FK_2`
    FOREIGN KEY (`customer_type_id`)
    REFERENCES `customer_type` (`id`)
    ON DELETE CASCADE;

CREATE TABLE `customer_type`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
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

DROP TABLE IF EXISTS `customer_type`;

ALTER TABLE `sf_guard_user_profile` DROP FOREIGN KEY `sf_guard_user_profile_FK_2`;

DROP INDEX `sf_guard_user_profile_FI_2` ON `sf_guard_user_profile`;

ALTER TABLE `sf_guard_user_profile` CHANGE `phone` `first_name` VARCHAR(20);

ALTER TABLE `sf_guard_user_profile` CHANGE `phone` `last_name` VARCHAR(20);

ALTER TABLE `sf_guard_user_profile` DROP `customer_type_id`;

ALTER TABLE `sf_guard_user_profile` DROP `name`;

ALTER TABLE `sf_guard_user_profile` DROP `vat_number`;

ALTER TABLE `sf_guard_user_profile` DROP `tax_code`;

ALTER TABLE `sf_guard_user_profile` DROP `fax`;

ALTER TABLE `sf_guard_user_profile` DROP `mobile`;

ALTER TABLE `sf_guard_user_profile` DROP `email`;

ALTER TABLE `sf_guard_user_profile` DROP `site`;

ALTER TABLE `sf_guard_user_profile` DROP `formatted_address`;

ALTER TABLE `sf_guard_user_profile` DROP `lat`;

ALTER TABLE `sf_guard_user_profile` DROP `lon`;

ALTER TABLE `sf_guard_user_profile` DROP `iban`;

ALTER TABLE `sf_guard_user_profile` DROP `bic`;

ALTER TABLE `sf_guard_user_profile` DROP `created_at`;

ALTER TABLE `sf_guard_user_profile` DROP `updated_at`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}