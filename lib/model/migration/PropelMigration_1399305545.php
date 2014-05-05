<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1399305545.
 * Generated on 2014-05-05 17:59:05 by lpodda
 */
class PropelMigration_1399305545
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

ALTER TABLE `route` CHANGE `duration` `duration` TIME DEFAULT \'00:00:00\' NOT NULL;

ALTER TABLE `route` CHANGE `distance` `distance` INTEGER DEFAULT 0 NOT NULL;

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

ALTER TABLE `arrival` CHANGE `cost` `cost` DECIMAL;

ALTER TABLE `arrival_version` CHANGE `cost` `cost` DECIMAL;

ALTER TABLE `departure` CHANGE `cost` `cost` DECIMAL;

ALTER TABLE `departure_version` CHANGE `cost` `cost` DECIMAL;

ALTER TABLE `route` CHANGE `duration` `duration` TIME NOT NULL;

ALTER TABLE `route` CHANGE `distance` `distance` INTEGER NOT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}