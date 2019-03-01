<?php
namespace App\Exports;

use App\Blog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BlogsExport implements  FromCollection, ShouldAutoSize,WithEvents,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function registerEvents(): array
    {
    	$numRows = Blog::all()->count() ;

    	$first_half = (int) ($numRows /2 ) + 1;
    	// dd($first_half);
    	$second_half = $first_half +1 ;
    	 //dd($second_half);

    	$styleArray = [
    		'font' => [
    			'size' =>  35,
    			'bold' => true,
    		]
    	];

    	return [

    		AfterSheet::class => function(AfterSheet $event) use($styleArray,$first_half,$second_half,$numRows){

    			$event->sheet->getStyle('A1:F1')->applyFromArray($styleArray);
    			$event->sheet->getProtection()->setPassword('password');
    			$event->sheet->getProtection()->setSheet(true);
    			$event->sheet->getStyle('D2:D11')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);

    			$event->sheet->getStyle('A2:A'.$first_half)->getFill()
    			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    			->getStartColor()->setARGB('FFB6C1');

    			$event->sheet->getStyle('B2:B'.$first_half)->getFill()
    			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    			->getStartColor()->setARGB('ADD8E6');

    			$event->sheet->getStyle('C2:C'.$first_half)->getFill()
    			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    			->getStartColor()->setARGB('ADD8E6');

    			$event->sheet->getStyle('A'.$second_half.':A'.($numRows+1))->getFill()
    			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    			->getStartColor()->setARGB('ADD8E6');

    			$event->sheet->getStyle('B'.$second_half.':B'.($numRows+1))->getFill()
    			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    			->getStartColor()->setARGB('FFB6C1');

    			$event->sheet->getStyle('C'.$second_half.':C'.($numRows+1))->getFill()
    			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    			->getStartColor()->setARGB('FFB6C1');
    		},
    	];
    }

    public function collection()
    {

    	$blogs = Blog::all();

    	return $array = $blogs->map(function ($b, $key) {

    		return [
    			'user_id' => $b->user->fname,
    			'name' => $b->name,
    			'blog_cat_id' => $b->blog_category->name,
    			'description' => $b->description,
    			'created_at' => $b->created_at,
    			'updated_at' => $b->updated_at,
    		];
    	});
    }

    public function headings(): array {
    	return [
    		'User Name',
    		'Name',
    		'Blog Category',
    		"Description",
    		"created_at",
    		"updated_at",
    	];
    }
}
