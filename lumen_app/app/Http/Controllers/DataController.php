<?php

namespace App\Http\Controllers;

use App\Transaction;

class DataController extends Controller
{
  public function getAll()
  {

    return response()->json(Transaction::all());

  }

  public function getByCustomerId($id)
  {

    $idint = intval($id);
    $customers = Transaction::where('customer_id', '=', $idint)->get();
    // dd($customers);
    if ($customers->count()) {
      echo 'Ecco le operazioni effettuate dal cliente ' . $id ;
      echo '<br><br>';
      foreach ($customers as $customer) {
        echo 'Customer ID: ' . $customer -> customer_id . '<br>'
        . 'DATE: ' . $customer -> date . '<br>'
        . 'VALUE: ' . $customer -> value . '<br><br>'
        ;
      }
    }else {
      echo '404 error';
      http_response_code(404);
    }

  }

}
