<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1417618978.
 * Generated on 2014-12-03 16:02:58 by lpodda
 */
class PropelMigration_1417618978
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

ALTER TABLE `rate_extra`
    ADD `typology` TINYINT AFTER `value`;

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

ALTER TABLE `area_vehicle_rate_table` CHANGE `cost` `cost` DECIMAL;

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

ALTER TABLE `locality` CHANGE `formatted_address` `formatted_address` VARCHAR(150);

ALTER TABLE `rate_extra` DROP `typology`;

ALTER TABLE `tl_tasks` CHANGE `is_running` `is_running` TINYINT(1) DEFAULT 0 NOT NULL;

ALTER TABLE `tl_tasks` CHANGE `is_ok` `is_ok` TINYINT(1) DEFAULT 0 NOT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}