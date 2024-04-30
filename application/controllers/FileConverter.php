<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FileConverter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('file_converter_form');
    }

    public function convert()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'docx';
        $config['max_size'] = 2048; // 2MB

        $this->upload->initialize($config);

        $uploaded_files = [];
        $errors = [];

        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            $_FILES['userfile']['name'] = $_FILES['files']['name'][$key];
            $_FILES['userfile']['type'] = $_FILES['files']['type'][$key];
            $_FILES['userfile']['tmp_name'] = $_FILES['files']['tmp_name'][$key];
            $_FILES['userfile']['error'] = $_FILES['files']['error'][$key];
            $_FILES['userfile']['size'] = $_FILES['files']['size'][$key];

            if ($this->upload->do_upload('userfile')) {
                $uploaded_files[] = $this->upload->data('full_path');
            } else {
                $errors[] = $this->upload->display_errors();
            }
        }

        if (!empty($errors)) {
            echo implode('<br>', $errors);
            return;
        }

        $spreadsheet = new Spreadsheet();

        foreach ($uploaded_files as $key => $file_path) {
            $file_name = basename($file_path);

            $objReader = IOFactory::createReader('Word2007');

            $objPHPExcel_temp = $objReader->load($file_path);

            $spreadsheet->createSheet();
            $spreadsheet->setActiveSheetIndex($key)->setTitle($file_name);
            $spreadsheet->setActiveSheetIndex($key)->fromArray($objPHPExcel_temp->getActiveSheet()->toArray(null, true, true, true));
        }

        $spreadsheet->setActiveSheetIndex(0);

        $filename = 'converted_file.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
