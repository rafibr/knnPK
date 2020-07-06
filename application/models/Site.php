<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Model {

    //Data Training
    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('data_training', $data);
    }
    //End Data Training

    //Data Target
    private $_batchImportTarget;

    public function setBatchImportTarget($batchImportTarget) {
        $this->_batchImportTarget = $batchImportTarget;
    }
 
    // save data
    public function importDataTarget() {
        $data = $this->_batchImportTarget;
        $this->db->insert_batch('data_target', $data);
    }
    //End Data Target

    //Data Testing
    private $_batchImportTesting;

    public function setBatchImportTesting($batchImportTesting) {
        $this->_batchImportTesting = $batchImportTesting;
    }
 
    // save data
    public function importDataTesting() {
        $data = $this->_batchImportTesting;
        $this->db->insert_batch('data_testing', $data);
    }
    //End Data Testing
}
