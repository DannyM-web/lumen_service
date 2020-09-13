<?php

use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    require_once('/var/www/app/app/Services/Transactions.php');
    $file = '/var/www/app/data.csv';
    $db = json_decode(csvToJson($file));

    DB::table('transactions')->truncate();
    foreach ($db as $transaction) {
      DB::table('transactions')->insert([
        'customer_id' => $transaction -> customer,
        'date' => $transaction -> date,
        'value' => $transaction -> value
      ]);
    }
  }
}
