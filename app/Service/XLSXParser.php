<?php


namespace App\Service;


use App\Database\Entities\Address;
use App\Database\Entities\City;
use App\Database\Entities\Manager;
use App\Database\Entities\Partner;
use App\Database\Entities\PartnerTypesReference;
use App\Database\Entities\Street;
use App\Database\Repositories\AddressRepository;
use App\Database\Repositories\CityRepository;
use App\Database\Repositories\ManagerRepository;
use App\Database\Repositories\PartnerRepository;
use App\Database\Repositories\PartnerTypesReferenceRepository;
use App\Database\Repositories\StreetRepository;

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

                CreateEntities::create([
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