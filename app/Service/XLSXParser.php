<?php


namespace App\Service;

class XLSXParser
{
    protected $parsedXLSX;

    public function __construct(string $path)
    {
        $this->parsedXLSX = \SimpleXLSX::parse(__DIR__ . "/../../storage/Контрагенты.xlsx");
    }

    /**
     * Проходит каждую строку и создает по ней новые объекты
     */
    public function parseRows()
    {
        foreach ($this->parsedXLSX->rows() as $key => $value) {
            if ($key === 0) {
                // заголовки

            } else {
                $addressFrom = explode(", ", $value[5]);
                $addressTo   = explode(", ", $value[6]);

                Entities::create([
                    'partner_name' => $value[0],
                    'partner_type' => $value[1],
                    'city_from'    => $addressFrom[0],
                    'street_from'  => $addressFrom[1],
                    'address_from' => $addressFrom[2],
                    'city_to'      => $addressTo[0],
                    'street_to'    => $addressTo[1],
                    'address_to'   => $addressTo[2],
                    'manager'      => $value[10]
                ]);
            }
        }

        return true;
    }
}