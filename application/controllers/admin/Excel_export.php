<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {
 
 function index()
 {
  $this->load->model("excel_export_model");
  $data["employee_data"] = $this->excel_export_model->fetch_data();
  $this->load->view("excel_export_view", $data);
 }

 function action()
 {
  $this->load->model("excel_export_model");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);
  //$object->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
  $this->excel->setActiveSheetIndex(0)->mergeCells("A1:K1");
  $object->getActiveSheet()->getColumnDimension('A')->setWidth(5);
  $object->getActiveSheet()->getColumnDimension('B')->setWidth(20);
  $object->getActiveSheet()->getColumnDimension('C')->setWidth(20);
  $object->getActiveSheet()->getColumnDimension('D')->setWidth(20);
  $object->getActiveSheet()->getColumnDimension('E')->setWidth(30);
  $object->getActiveSheet()->getColumnDimension('F')->setWidth(20);
  $object->getActiveSheet()->getColumnDimension('G')->setWidth(30);
  $object->getActiveSheet()->getColumnDimension('H')->setWidth(120);
  $object->getActiveSheet()->getColumnDimension('I')->setWidth(30);
  $object->getActiveSheet()->getColumnDimension('J')->setWidth(10);
  $object->getActiveSheet()->getColumnDimension('K')->setWidth(20);
  $object->getActiveSheet()->getSheetView()->setZoomScale(110);
  $object->getActiveSheet()->mergeCells('A1:K1');
  $object->getActiveSheet()->setCellValue('A1','DABS Customers Complaints List');
  $object->getActiveSheet()->getStyle('A1')->getFont()->setBold( true );
  $object->getActiveSheet()->getStyle('A2:K2')->getFont()->setBold( true );
  
  $object->getActiveSheet()
        ->getStyle('A2:K2')
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('E0E0E3');
				
	
  $table_columns = array("id","Name", "Bill Number", "Phone Number", "Email", "Complaint Group", "Complaint Type", "Comment", "Specific Address", "Date", "Breshna Respond", );

  $column = 0;
	
  foreach($table_columns as $field)
  {  
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 2, $field);
   $column++;
  }

  $employee_data = $this->excel_export_model->fetch_data();

  $excel_row = 3;

  foreach($employee_data as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_row-2);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->bill_number);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->phone_number);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->email);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->complaint_group);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->complaint_type);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->comments);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->specific_address);
   $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->date);
   $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->breshna_respond);
   $excel_row++;
  }
  $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

  $object->getDefaultStyle()->applyFromArray($style);

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Complaints list.xls"');
  $object_writer->save('php://output');
 }

 
 
}
?>
