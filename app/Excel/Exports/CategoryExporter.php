<?php

declare(strict_types=1);

namespace App\Excel\Exports;

use Pocketframe\Excel\Contracts\ExporterInterface;
use App\Entities\Category;
use Pocketframe\PocketORM\Database\QueryEngine;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CategoryExporter implements ExporterInterface
{
  /**
   * Provide the column headings.
   *
   * @return array
   */
  public function headings(): array
  {
    return ['ID', 'Category Name', 'Slug', 'Status', 'Description'];
  }

  /**
   * Provide the data rows.
   *
   * @return array
   */
  public function data(): array
  {
    return array_map(function ($entity) {
      return [
        $entity->id,
        $entity->category_name,
        $entity->slug,
        $entity->status,
        $entity->description,
      ];
    }, QueryEngine::for(Category::class)->get()->all());
  }

  /**
   * Provide the optional style rules.
   *
   * @return array|null
   */
  public function styles(): ?array
  {
    return [
      // Header row styling (assumed that headings are in A1:E1)
      'A1:E1' => [
        'font' => [
          'bold' => true,
          'color' => ['argb' => 'FFFFFFFF'], // White text color
        ],
        'fill' => [
          'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
          'color' => ['argb' => '00A36C'], // Green background
        ],
        'borders' => [
          'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color'       => ['argb' => 'FF000000'],
          ],
        ],
      ],
      // Optional: Apply border style to data cells
      'A2:E2' => [
        'borders' => [
          'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '00A36C']
          ],
        ],
      ],
    ];
  }

  /**
   * Provide multiple sheets if needed.
   *
   * @return array|null
   */
  public function sheets(): ?array
  {
    return null;
  }

  /**
   * Configure additional settings on the active sheet.
   *
   * This method can be called from the engine after the sheet is created and styled.
   *
   * @param Worksheet $sheet
   * @return void
   */
  public function configureSheet(Worksheet $sheet): void
  {
    // Auto-size columns A through E.
    foreach (range('A', 'E') as $columnID) {
      $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Determine the highest row with data.
    $highestRow = $sheet->getHighestRow();

    // Apply border style dynamically to the data range.
    $sheet->getStyle("A2:E{$highestRow}")->applyFromArray([
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '00A36C']
        ]
      ]
    ]);
  }
}
