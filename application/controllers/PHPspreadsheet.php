<?php
defined('BASEPATH') or exit('No direct script access allowed');
//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class PHPspreadsheet extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // load model
    $this->load->model('Site', 'site');
  }

  public function uploadTesting()
  {
    $data = array();
    $data['title'] = 'Import Excel Sheet | TechArise';
    $data['breadcrumbs'] = array('Home' => '#');
    // Load form validation library
    $this->load->library('form_validation');
    $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
    if ($this->form_validation->run() == false) {

      // $this->load->view('spreadsheet/index', $data);
    } else {
      // If file uploaded
      if (!empty($_FILES['fileURL']['name'])) {
        // get file extension
        $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

        if ($extension == 'csv') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } elseif ($extension == 'xlsx') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }
        // file path
        $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
        $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // array Count
        $arrayCount = count($allDataInSheet);
        $flag = 0;
        $createArray = array(
          'NAMA_DATA_TESTING',
          'KP_DATA_TESTING',
          'PBO_DATA_TESTING',
          'PW_DATA_TESTING',
          'RPL_DATA_TESTING',
          'APS_DATA_TESTING',
          'MANPRO_DATA_TESTING',
          'KWU_DATA_TESTING',
          'TKTI_DATA_TESTING',
          'LABEL_FACT_DATA_TESTING'
        );
        $makeArray = array(
          'NAMA_DATA_TESTING' => 'NAMA_DATA_TESTING',
          'KP_DATA_TESTING' => 'KP_DATA_TESTING',
          'PBO_DATA_TESTING' => 'PBO_DATA_TESTING',
          'PW_DATA_TESTING' => 'PW_DATA_TESTING',
          'RPL_DATA_TESTING' => 'RPL_DATA_TESTING',
          'APS_DATA_TESTING' => 'APS_DATA_TESTING',
          'MANPRO_DATA_TESTING' => 'MANPRO_DATA_TESTING',
          'KWU_DATA_TESTING' => 'KWU_DATA_TESTING',
          'TKTI_DATA_TESTING' => 'TKTI_DATA_TESTING',
          'LABEL_FACT_DATA_TESTING' => 'LABEL_FACT_DATA_TESTING'
        );
        $SheetDataKey = array();
        foreach ($allDataInSheet as $dataInSheet) {
          foreach ($dataInSheet as $key => $value) {
            if (in_array(trim($value), $createArray)) {
              $value = preg_replace('/\s+/', '', $value);
              $SheetDataKey[trim($value)] = $key;
            }
          }
        }
        $dataDiff = array_diff_key($makeArray, $SheetDataKey);
        if (empty($dataDiff)) {
          $flag = 1;
        }
        // match excel sheet column
        if ($flag == 1) {
          for ($i = 2; $i <= $arrayCount; $i++) {
            $addresses = array();
            $name = $SheetDataKey['NAMA_DATA_TESTING'];
            $KP = $SheetDataKey['KP_DATA_TESTING'];
            $PBO = $SheetDataKey['PBO_DATA_TESTING'];
            $PW = $SheetDataKey['PW_DATA_TESTING'];
            $RPL = $SheetDataKey['RPL_DATA_TESTING'];
            $APS = $SheetDataKey['APS_DATA_TESTING'];
            $MANPRO = $SheetDataKey['MANPRO_DATA_TESTING'];
            $KWU = $SheetDataKey['KWU_DATA_TESTING'];
            $TKTI = $SheetDataKey['TKTI_DATA_TESTING'];
            $FACT= $SheetDataKey['LABEL_FACT_DATA_TESTING'];

            $name = filter_var(trim($allDataInSheet[$i][$name]), FILTER_SANITIZE_STRING);
            $KP = filter_var(trim($allDataInSheet[$i][$KP]), FILTER_SANITIZE_STRING);
            $PBO = filter_var(trim($allDataInSheet[$i][$PBO]), FILTER_SANITIZE_STRING);
            $PW = filter_var(trim($allDataInSheet[$i][$PW]), FILTER_SANITIZE_STRING);
            $RPL = filter_var(trim($allDataInSheet[$i][$RPL]), FILTER_SANITIZE_STRING);
            $APS = filter_var(trim($allDataInSheet[$i][$APS]), FILTER_SANITIZE_STRING);
            $MANPRO = filter_var(trim($allDataInSheet[$i][$MANPRO]), FILTER_SANITIZE_STRING);
            $KWU = filter_var(trim($allDataInSheet[$i][$KWU]), FILTER_SANITIZE_STRING);
            $TKTI = filter_var(trim($allDataInSheet[$i][$TKTI]), FILTER_SANITIZE_STRING);
            $FACT = filter_var(trim($allDataInSheet[$i][$FACT]), FILTER_SANITIZE_STRING);
            $fetchData[] = array(
              'NAMA_DATA_TESTING' => $name,
              'KP_DATA_TESTING' => $KP,
              'PBO_DATA_TESTING' => $PBO,
              'PW_DATA_TESTING' =>  $PW,
              'RPL_DATA_TESTING' => $RPL,
              'APS_DATA_TESTING' => $APS,
              'MANPRO_DATA_TESTING' => $MANPRO,
              'KWU_DATA_TESTING' => $KWU,
              'TKTI_DATA_TESTING' => $TKTI,
              'LABEL_FACT_DATA_TESTING' => $FACT
            );
          }
          $data['dataInfo'] = $fetchData;
          $this->site->setBatchImportTesting($fetchData);
          $this->site->importDataTesting();
        } else {
          echo "Please import correct file, did not match excel sheet column";
        }
        redirect(site_url('akurasi'));
      }
    }
  }

  public function uploadTarget()
  {
    $data = array();
    $data['title'] = 'Import Excel Sheet | TechArise';
    $data['breadcrumbs'] = array('Home' => '#');
    // Load form validation library
    $this->load->library('form_validation');
    $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
    if ($this->form_validation->run() == false) {

      // $this->load->view('spreadsheet/index', $data);
    } else {
      // If file uploaded
      if (!empty($_FILES['fileURL']['name'])) {
        // get file extension
        $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

        if ($extension == 'csv') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } elseif ($extension == 'xlsx') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }
        // file path
        $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
        $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // array Count
        $arrayCount = count($allDataInSheet);
        $flag = 0;
        $createArray = array(
          'NAMA_DATA_TARGET',
          'KB_DATA_TARGET',
          'PBO_DATA_TARGET',
          'PW_DATA_TARGET',
          'RPL_DATA_TARGET',
          'APS_DATA_TARGET',
          'MANPRO_DATA_TARGET',
          'KWU_DATA_TARGET',
          'TKTI_DATA_TARGET'
        );
        $makeArray = array(
          'NAMA_DATA_TARGET' => 'NAMA_DATA_TARGET',
          'KB_DATA_TARGET' => 'KB_DATA_TARGET',
          'PBO_DATA_TARGET' => 'PBO_DATA_TARGET',
          'PW_DATA_TARGET' => 'PW_DATA_TARGET',
          'RPL_DATA_TARGET' => 'RPL_DATA_TARGET',
          'APS_DATA_TARGET' => 'APS_DATA_TARGET',
          'MANPRO_DATA_TARGET' => 'MANPRO_DATA_TARGET',
          'KWU_DATA_TARGET' => 'KWU_DATA_TARGET',
          'TKTI_DATA_TARGET' => 'TKTI_DATA_TARGET'
        );
        $SheetDataKey = array();
        foreach ($allDataInSheet as $dataInSheet) {
          foreach ($dataInSheet as $key => $value) {
            if (in_array(trim($value), $createArray)) {
              $value = preg_replace('/\s+/', '', $value);
              $SheetDataKey[trim($value)] = $key;
            }
          }
        }
        $dataDiff = array_diff_key($makeArray, $SheetDataKey);
        if (empty($dataDiff)) {
          $flag = 1;
        }
        // match excel sheet column
        if ($flag == 1) {
          for ($i = 2; $i <= $arrayCount; $i++) {
            $addresses = array();
            $name = $SheetDataKey['NAMA_DATA_TARGET'];
            $KP = $SheetDataKey['KB_DATA_TARGET'];
            $PBO = $SheetDataKey['PBO_DATA_TARGET'];
            $PW = $SheetDataKey['PW_DATA_TARGET'];
            $RPL = $SheetDataKey['RPL_DATA_TARGET'];
            $APS = $SheetDataKey['APS_DATA_TARGET'];
            $MANPRO = $SheetDataKey['MANPRO_DATA_TARGET'];
            $KWU = $SheetDataKey['KWU_DATA_TARGET'];
            $TKTI = $SheetDataKey['TKTI_DATA_TARGET'];

            $name = filter_var(trim($allDataInSheet[$i][$name]), FILTER_SANITIZE_STRING);
            $KP = filter_var(trim($allDataInSheet[$i][$KP]), FILTER_SANITIZE_STRING);
            $PBO = filter_var(trim($allDataInSheet[$i][$PBO]), FILTER_SANITIZE_STRING);
            $PW = filter_var(trim($allDataInSheet[$i][$PW]), FILTER_SANITIZE_STRING);
            $RPL = filter_var(trim($allDataInSheet[$i][$RPL]), FILTER_SANITIZE_STRING);
            $APS = filter_var(trim($allDataInSheet[$i][$APS]), FILTER_SANITIZE_STRING);
            $MANPRO = filter_var(trim($allDataInSheet[$i][$MANPRO]), FILTER_SANITIZE_STRING);
            $KWU = filter_var(trim($allDataInSheet[$i][$KWU]), FILTER_SANITIZE_STRING);
            $TKTI = filter_var(trim($allDataInSheet[$i][$TKTI]), FILTER_SANITIZE_STRING);
            $fetchData[] = array(
              'NAMA_DATA_TARGET' => $name,
              'KB_DATA_TARGET' => $KP,
              'PBO_DATA_TARGET' => $PBO,
              'PW_DATA_TARGET' =>  $PW,
              'RPL_DATA_TARGET' => $RPL,
              'APS_DATA_TARGET' => $APS,
              'MANPRO_DATA_TARGET' => $MANPRO,
              'KWU_DATA_TARGET' => $KWU,
              'TKTI_DATA_TARGET' => $TKTI
            );
          }
          $data['dataInfo'] = $fetchData;
          $this->site->setBatchImportTarget($fetchData);
          $this->site->importDataTarget();
        } else {
          echo "Please import correct file, did not match excel sheet column";
        }
        redirect(site_url('target'));
      }
    }
  }


  // file upload functionality
  public function upload()
  {
    $data = array();
    $data['title'] = 'Import Excel Sheet | TechArise';
    $data['breadcrumbs'] = array('Home' => '#');
    // Load form validation library
    $this->load->library('form_validation');
    $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
    if ($this->form_validation->run() == false) {

      // $this->load->view('spreadsheet/index', $data);
    } else {
      // If file uploaded
      if (!empty($_FILES['fileURL']['name'])) {
        // get file extension
        $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

        if ($extension == 'csv') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } elseif ($extension == 'xlsx') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }
        // file path
        $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
        $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // array Count
        $arrayCount = count($allDataInSheet);
        $flag = 0;
        $createArray = array(
          'NAMA_DATA_TRAINING',
          'KB_DATA_TRAINING',
          'PBO_DATA_TRAINING',
          'PW_DATA_TRAINING',
          'RPL_DATA_TRAINING',
          'APS_DATA_TRAINING',
          'MANPRO_DATA_TRAINING',
          'KWU_DATA_TRAINING',
          'TKTI_DATA_TRAINING',
          'LABEL_DATA_TRAINING'
        );
        $makeArray = array(
          'NAMA_DATA_TRAINING' => 'NAMA_DATA_TRAINING',
          'KB_DATA_TRAINING' => 'KB_DATA_TRAINING',
          'PBO_DATA_TRAINING' => 'PBO_DATA_TRAINING',
          'PW_DATA_TRAINING' => 'PW_DATA_TRAINING',
          'RPL_DATA_TRAINING' => 'RPL_DATA_TRAINING',
          'APS_DATA_TRAINING' => 'APS_DATA_TRAINING',
          'MANPRO_DATA_TRAINING' => 'MANPRO_DATA_TRAINING',
          'KWU_DATA_TRAINING' => 'KWU_DATA_TRAINING',
          'TKTI_DATA_TRAINING' => 'TKTI_DATA_TRAINING',
          'LABEL_DATA_TRAINING' => 'LABEL_DATA_TRAINING'
        );
        $SheetDataKey = array();
        foreach ($allDataInSheet as $dataInSheet) {
          foreach ($dataInSheet as $key => $value) {
            if (in_array(trim($value), $createArray)) {
              $value = preg_replace('/\s+/', '', $value);
              $SheetDataKey[trim($value)] = $key;
            }
          }
        }
        $dataDiff = array_diff_key($makeArray, $SheetDataKey);
        if (empty($dataDiff)) {
          $flag = 1;
        }
        // match excel sheet column
        if ($flag == 1) {
          for ($i = 2; $i <= $arrayCount; $i++) {
            $addresses = array();
            $name = $SheetDataKey['NAMA_DATA_TRAINING'];
            $KP = $SheetDataKey['KB_DATA_TRAINING'];
            $PBO = $SheetDataKey['PBO_DATA_TRAINING'];
            $PW = $SheetDataKey['PW_DATA_TRAINING'];
            $RPL = $SheetDataKey['RPL_DATA_TRAINING'];
            $APS = $SheetDataKey['APS_DATA_TRAINING'];
            $MANPRO = $SheetDataKey['MANPRO_DATA_TRAINING'];
            $KWU = $SheetDataKey['KWU_DATA_TRAINING'];
            $TKTI = $SheetDataKey['TKTI_DATA_TRAINING'];
            $LABEL = $SheetDataKey['LABEL_DATA_TRAINING'];

            $name = filter_var(trim($allDataInSheet[$i][$name]), FILTER_SANITIZE_STRING);
            $KP = filter_var(trim($allDataInSheet[$i][$KP]), FILTER_SANITIZE_STRING);
            $PBO = filter_var(trim($allDataInSheet[$i][$PBO]), FILTER_SANITIZE_STRING);
            $PW = filter_var(trim($allDataInSheet[$i][$PW]), FILTER_SANITIZE_STRING);
            $RPL = filter_var(trim($allDataInSheet[$i][$RPL]), FILTER_SANITIZE_STRING);
            $APS = filter_var(trim($allDataInSheet[$i][$APS]), FILTER_SANITIZE_STRING);
            $MANPRO = filter_var(trim($allDataInSheet[$i][$MANPRO]), FILTER_SANITIZE_STRING);
            $KWU = filter_var(trim($allDataInSheet[$i][$KWU]), FILTER_SANITIZE_STRING);
            $TKTI = filter_var(trim($allDataInSheet[$i][$TKTI]), FILTER_SANITIZE_STRING);
            $LABEL = filter_var(trim($allDataInSheet[$i][$LABEL]), FILTER_SANITIZE_STRING);
            $fetchData[] = array(
              'NAMA_DATA_TRAINING' => $name,
              'KB_DATA_TRAINING' => $KP,
              'PBO_DATA_TRAINING' => $PBO,
              'PW_DATA_TRAINING' =>  $PW,
              'RPL_DATA_TRAINING' => $RPL,
              'APS_DATA_TRAINING' => $APS,
              'MANPRO_DATA_TRAINING' => $MANPRO,
              'KWU_DATA_TRAINING' => $KWU,
              'TKTI_DATA_TRAINING' => $TKTI,
              'LABEL_DATA_TRAINING' => $LABEL
            );
          }
          $data['dataInfo'] = $fetchData;
          $this->site->setBatchImport($fetchData);
          $this->site->importData();
        } else {
          echo "Please import correct file, did not match excel sheet column";
        }
        redirect(site_url('training'));
      }
    }
  }

  // checkFileValidation
  public function checkFileValidation($string)
  {
    $file_mimes = array(
      'text/x-comma-separated-values',
      'text/comma-separated-values',
      'application/octet-stream',
      'application/vnd.ms-excel',
      'application/x-csv',
      'text/x-csv',
      'text/csv',
      'application/csv',
      'application/excel',
      'application/vnd.msexcel',
      'text/plain',
      'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    );
    if (isset($_FILES['fileURL']['name'])) {
      $arr_file = explode('.', $_FILES['fileURL']['name']);
      $extension = end($arr_file);
      if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
        return true;
      } else {
        $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
        return false;
      }
    } else {
      $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
      return false;
    }
  }
}
