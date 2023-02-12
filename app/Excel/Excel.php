namespace App\Excel;

use PHPExcel;
use PHPExcel_IOFactory;

class Excel
{
    public function export($data)
    {
        $excel = new PHPExcel();

        // Pilih sheet pertama
        $excel->setActiveSheetIndex(0);

        // Tulis data
        $excel->getActiveSheet()->fromArray($data, null, 'A1');

        // Namai sheet
        $excel->getActiveSheet()->setTitle('Sheet 1');

        // Buat objek writer
        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');

        // Unduh file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
