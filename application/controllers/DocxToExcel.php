<?php
// File: application/controllers/DocxToExcel.php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/PHPWord/Bootstrap.php';
require_once APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Shared\Converter;

class DocxToExcel extends CI_Controller
{

    public function index()
    {
        $this->load->view('upload_form');
    }

    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'docx';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }

    public function convert_to_excel()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $excel = new PHPExcel();

        $docxFiles = glob('./uploads/*.docx');

        foreach ($docxFiles as $docxFile) {
            $section = $phpWord->addSection();
            $phpWord = IOFactory::load($docxFile);
            $section->addText("Content from " . $docxFile);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $objWriter->save('output.xlsx');
        $this->load->helper('download');
        force_download('output.xlsx', NULL);
    }
}
