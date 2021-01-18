<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller {

	public function view(){
		return view('index');
	}

	public function pdfStrpos($file_path, $searchable_string = null){

		if (is_null_or_empty($file_path)) {

			logger()->debug("File path should not be empty");
			return false;
		}

		/**
		 * Check give string to search is not null or empty
		 * IF :- Empty return false
		 * ELSE :- Search that string
		 */
		if (is_null_or_empty($searchable_string)) {

			logger()->debug("Search input should not be empty");
			return false;
		}

		$pdf = pdf()->parseFile($file_path);
		$pages = $pdf->getPages();

		foreach ($pages as $page) {
			/**
			 * Check extracted PDF content is null or empty if not then search stringnull or empty
			 * IF :- Content return true
			 * ELSE :- return false
			 */
			if (!is_null_or_empty($page->getText()) && strpos($page->getText(), $searchable_string)) {
				return true;
			}
		}
		return false;

	}

	private static function getFileName($file_name){
		return public_path() . "\\" . $file_name;
	}

	/**
	 * This uploadPdf()
	 * @see 
	 * @param Request $request
	 * @return Response $response;
	 */
	public function uploadPdf(Request $request){

		$file = $request->file('pdf_file');
		$searchable_string = $request['serach_input'];
		$file_name = $file->getClientOriginalName();
		$storage = Storage::disk('local-public');

		if($storage->exists("pdf-file\\". $file_name)){
			return response('File already exist ', 422);
		}

		$file_path = $storage->putFileAs('pdf-file', $file, $file_name);
		$size = $storage->size($file_path);
		$file_path = static::getFileName($file_path);

		$has_string = $this->pdfStrpos($file_path, $searchable_string);

		if ($has_string) {
			return response('Pdf content ' . $searchable_string , 200);
		}

		return response('File does not have string ' . $searchable_string , 422);
	}

    // public function test(){
    // 	var_dump(is_null_or_empty("string"));
    // 	die();
    	// Parse pdf file and build necessary objects.
// $parser = pdf(); //new \Smalot\PdfParser\Parser();
// $pdf    = $parser->parseFile(public_path() . '\..\test.pdf');
 
// Retrieve all pages from the pdf file.
// $pages  = $pdf->getPages();
 
// Loop over each page to extract text.
// foreach ($pages as $page) {
   //  echo $page->getText();
//}
    	// new Pdf(public_path());
    	// echo Pdf::getText('\test.pdf', public_path()); //returns the text from the pdf
    // 	$pdf_string = $text = (new Pdf("../../../public/")
    // ->setPdf('SOFTWARE-DEVELOPER-SACHIN-SHELKE.pdf')
    // ->text();

    	// echo $pdf_string;
    // }
}
