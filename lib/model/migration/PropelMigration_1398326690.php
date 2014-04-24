<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1398326690.
 * Generated on 2014-04-24 10:04:50 by poldotz
 */
class PropelMigration_1398326690
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

ALTER TABLE `locality`
    ADD `latitude` DOUBLE(10,8) AFTER `updated_at`,
    ADD `longitude` DOUBLE(10,8) AFTER `latitude`;

ALTER TABLE `locality` DROP `lat`;

ALTER TABLE `locality` DROP `lon`;

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

ALTER TABLE `locality`
    ADD `lat` DECIMAL(18,2) AFTER `formatted_address`,
    ADD `lon` DECIMAL(18,2) AFTER `lat`;

ALTER TABLE `locality` DROP `latitude`;

ALTER TABLE `locality` DROP `longitude`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}