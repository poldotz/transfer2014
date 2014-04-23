<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1398180424.
 * Generated on 2014-04-22 17:27:04 by poldotz
 */
class PropelMigration_1398180424
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

CREATE TABLE `locality`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER,
    `is_vector` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `name` VARCHAR(200) NOT NULL,
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
    PRIMARY KEY (`id`),
    INDEX `loBcality_FI_1` (`user_id`),
    CONSTRAINT `locality_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `sf_guard_user` (`id`)
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

DROP TABLE IF EXISTS `locality`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}