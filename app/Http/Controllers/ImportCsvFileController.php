<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportCsvFile;
use App\ImportCsvFiles;
use Maatwebsite\Excel\Facades\Excel;
class ImportCsvFileController extends Controller
{
    public function importCsvfile(Request $request)
    {
      $this->validate($request , [
        'file' => 'required'
      ]);
      Excel::import(new ImportCsvFile , $request->file('testing'));
      return back();

    }
}
