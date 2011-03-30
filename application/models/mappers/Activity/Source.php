<?php
/**
 * Activity Source data mapper
 *
 * @author Lucas CORBEAUX
 * @category MaitreCorbeaux
 * @package Model
 * @subpackage Mapper
 */
class MaitreCorbeaux_Model_Mapper_Activity_Source
extends MaitreCorbeaux_Model_Mapper_AbstractMapper
implements MaitreCorbeaux_Model_Mapper_Activity_SourceInterface
{
    /**
     * Create an Activity Source model from a data array
     *
     * @param array $data
     * @return MaitreCorbeaux_Model_Activity_Source
     */
    protected function _createSourceModel(array $data)
    {
        $cleanData = array(
            'id' => array_key_exists('idActivitySource', $data)
                    ? $data['idActivitySource']
                    : null,
            'slug' => array_key_exists('slugActivitySource', $data)
                      ? $data['slugActivitySource']
                      : null,
            'name' => array_key_exists('nameActivitySource', $data)
                      ? $data['nameActivitySource']
                      : null,
            'link' => array_key_exists('linkActivitySource', $data)
                      ? $data['linkActivitySource']
                      : null
        );

        return new MaitreCorbeaux_Model_Activity_Source($cleanData);
    }

    /**
     * 
     * @return Zend_Db_Table_Abstract
     * @see MaitreCorbeaux_Model_Mapper_Activity_Source::getDbTable()
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->_dbTable =
                new MaitreCorbeaux_Model_DbTable_Activity_Source();
        }

        return $this->_dbTable;
    }

    /**
     *
     * @return MaitreCorbeaux_Model_Collection_Activity_Source
     * @see MaitreCorbeaux_Model_Mapper_Activity_SourceInterface::fetchAll()
     */
    public final function fetchAll()
    {
        $rowsetData = $this->getDbTable()
                           ->fetchAll()
                           ->toArray();

        $sourceCollection =
            new MaitreCorbeaux_Model_Collection_Activity_Source();

        foreach ($rowsetData as $rowData) {
            $sourceCollection->add($this->_createSourceModel($rowData));
        }

        return $sourceCollection;
    }
}