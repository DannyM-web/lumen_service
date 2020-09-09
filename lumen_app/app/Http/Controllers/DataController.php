<?php

namespace App\Http\Controllers;

class DataController extends Controller
{
  public function getAll()
  {
    // php function to convert csv to json format
    $file = '../data.csv';
    $json = csvToJson($file);

    echo '<pre>';
    print_r($json);
    echo '<pre>';

  }

  public function getByCustomerId($id)
  {
    $file = '../data.csv';
    $objs = json_decode(csvToJson($file));
    $ids = [];
    foreach ($objs as $obj) {
      $ids[] = $obj -> customer ;
    }

    if (in_array($id, $ids)) {
      foreach ($objs as $obj) {
        if ($id === $obj -> customer) {
          echo 'Customer ID: ' . $obj -> customer . '<br>'
          . 'DATE: ' . $obj -> date . '<br>'
          . 'VALUE: ' . $obj -> value . '<br><br>'
          ;
        }
      }
    }else {
      //Send 404 response to client.
      // header("HTTP/1.1 404 Not Found");
      http_response_code(404);
      echo http_response_code() . ' NOT FOUND';
      return;

    }
  }

}


function csvToJson($fname) {
  // open csv file
  if (!($fp = fopen($fname, 'r'))) {
    die("Can't open file...");
  }

  //read csv headers
  $key = fgetcsv($fp,"1024",";");

  // parse csv rows into array
  $json = array();
  while ($row = fgetcsv($fp,"1024",";")) {
    $json[] = array_combine($key, $row);
  }

  // release file handle
  fclose($fp);

  // encode array to json
  return json_encode($json);
}
