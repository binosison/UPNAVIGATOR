<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function export()
    {
        // Fetch data from your model
        $data = User::all(); // Customize this query as needed

        // Define CSV header
        $header = ['Column 1', 'Column 2', 'Column 3']; // Adjust based on your data

        // Create a callback to output the CSV
        $callback = function () use ($data, $header) {
            $file = fopen('php://output', 'w');

            // Output the column headings
            fputcsv($file, $header);

            // Output each row of the data
            foreach ($data as $row) {
                fputcsv($file, $row->toArray());
            }

            fclose($file);
        };

        // Set headers for the response
        return Response::stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="data_export.csv"',
        ]);
    }
}
