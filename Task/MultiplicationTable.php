<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class MultiplicationTable extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('multiplication_form');
    }

    public function generate()
    {
        $number = $this->request->getPost("number");

        if (!is_numeric($number)) {
            return $this->fail("Please enter a valid number.");
        }

        $csvData = "Multiplication of table $number\n";
        for ($i = 1; $i <= 10; $i++) {
            $result = $number * $i;
            $csvData .= "$result\n";
        }

        $response = $this->response->setHeader('Content-Type', 'text/csv')
            ->setHeader('Content-Disposition', 'attachment; filename="multiplication_table_' . $number . '.csv"')
            ->setBody($csvData);

        return $response;
    }
}
