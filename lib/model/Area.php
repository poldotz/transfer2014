<?php



/**
 * Skeleton subclass for representing a row from the 'area' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Oct 22 12:29:31 2014
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Area extends BaseArea
{
    public function __toString(){
        return $this->getName();
    }
}
