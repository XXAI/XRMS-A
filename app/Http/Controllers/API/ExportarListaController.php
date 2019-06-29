<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

use App\Http\Controllers\Controller;

use \Excel;
//use App\Http\Controllers\Exports\ListaAsistenciaController;
use App\Models\Asistente;

class ExportarListaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request){
        $registros = Asistente::select('asistentes.*','puestos.descripcion as puesto')
                                ->leftjoin('puestos','puestos.id','=','asistentes.puesto_id')
                                ->where('asistencia',true)
                                ->get();

        Excel::create('lista-asistencia', function($excel) use ($registros){
            $excel->sheet('asistencia', function($sheet) use ($registros){
                $sheet->loadView('reportes.lista_asistencia',['registros'=>$registros]);

                $imagen = $this->obtenerImagen('LOGOS-01.jpg','A2');
                $imagen->setWorksheet($sheet);

                $imagen = $this->obtenerImagen('LOGOS-03.jpg','E2');
                $imagen->setWorksheet($sheet);

                $imagen = $this->obtenerImagen('Promocion de la Salud Horizontall.jpg','H2');
                $imagen->setWorksheet($sheet);

                $imagen = $this->obtenerImagen('LOGO-01.jpg','L2');
                $imagen->setWorksheet($sheet);

                $sheet->getStyle('L6')->applyFromArray(array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => \PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('argb' => 'FF000000')
                        )
                    )
                ));

                $total_registros = count($registros);
                $ultima_linea = $total_registros + 13;

                $sheet->getStyle('A13:L'.$ultima_linea)->applyFromArray(array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => \PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('argb' => 'FF000000')
                        )
                    )
                ));

                $bottom_border = array(
                        'borders' => array(
                            'bottom' => array(
                                'style' => \PHPExcel_Style_Border::BORDER_THIN,
                                'color' => array('argb' => 'FF000000')
                            )
                        )
                    );

                $sheet->getStyle('D7:H7')->applyFromArray($bottom_border);
                $sheet->getStyle('C9:D9')->applyFromArray($bottom_border);
                $sheet->getStyle('G9')->applyFromArray($bottom_border);
                $sheet->getStyle('K9')->applyFromArray($bottom_border);

                $sheet->cells('A13:L'.$ultima_linea,function($cells) { $cells->setValignment('center'); });
                $sheet->cells('A14:A'.$ultima_linea,function($cells) { $cells->setAlignment('center'); });

                $sheet->setColumnFormat(array('H14:H'.$ultima_linea => '@'));
            });

            $excel->getActiveSheet()->getPageSetup()->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER);
            $excel->getActiveSheet()->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            $excel->getActiveSheet()->getPageSetup()->setFitToPage(true);
            $excel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
            $excel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

            $excel->getActiveSheet()->getPageMargins()->setTop(0.3543307);
            $excel->getActiveSheet()->getPageMargins()->setBottom(0.3543307);
            $excel->getActiveSheet()->getPageMargins()->setRight(0.1968504);
            $excel->getActiveSheet()->getPageMargins()->setLeft(0.2755906);
            
            $excel->getActiveSheet()->getPageMargins()->setHeader(0.9055118);
            $excel->getActiveSheet()->getPageMargins()->setFooter(0.5118110);
        })->download('xlsx');
    }

    private function obtenerImagen($imagen,$celda,$offset = 10){
		$objDrawing = new \PHPExcel_Worksheet_Drawing();
		$objDrawing->setPath('./images/'.$imagen);// filesystem reference for the image file
		$objDrawing->setHeight(85);// sets the image height to 36px (overriding the actual image height); 
		//$objDrawing->setWidth(180);// sets the image height to 36px (overriding the actual image height); 
		$objDrawing->setCoordinates($celda);// pins the top-left corner of the image to cell D24
		$objDrawing->setOffsetX($offset);// pins the top left corner of the image at an offset of 10 points horizontally to the right of the top-left corner of the cell
		return $objDrawing;
	}
}
