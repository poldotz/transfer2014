<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1399299027.
 * Generated on 2014-05-05 16:10:27 by lpodda
 */
class PropelMigration_1399299027
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

CREATE TABLE `route`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `locality_from` INTEGER NOT NULL,
    `locality_to` INTEGER NOT NULL,
    `duration` TIME NOT NULL,
    `distance` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `route_point` (`locality_from`, `locality_to`),
    INDEX `FI_te_locality_to` (`locality_to`),
    CONSTRAINT `route_locality_from`
        FOREIGN KEY (`locality_from`)
        REFERENCES `locality` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `route_locality_to`
        FOREIGN KEY (`locality_to`)
        REFERENCES `locality` (`id`)
        ON UPDATE CASCADE
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

DROP TABLE IF EXISTS `route`;

ALTER TABLE `arrival` CHANGE `cost` `cost` DECIMAL;

ALTER TABLE `arrival_version` CHANGE `cost` `cost` DECIMAL;

ALTER TABLE `departure` CHANGE `cost` `cost` DECIMAL;

ALTER TABLE `departure_version` CHANGE `cost` `cost` DECIMAL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}