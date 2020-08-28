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

class Entities
{
    public static function create(array $data): bool
    {
        if (self::validateData($data) !== true) {
            return false;
        }
        // Населённый пункт
        $city = (new City())->setName($data['city_from']);
        $city = (new CityRepository($city))->save();

        // Название города в поле "адрес От"
        $cityFrom = (new City())->setName($data['city_from']);
        $cityFrom = (new CityRepository($cityFrom))->save();

        // Название города в поле "адрес До"
        $cityTo = (new City())->setName($data['city_to']);
        $cityTo = (new CityRepository($cityTo))->save();

        $streetFrom = (new Street())
            ->setCity($cityFrom)
            ->setName($data['street_from']);

        $streetFrom = (new StreetRepository($streetFrom))->save();

        $streetTo = (new Street())
            ->setCity($cityTo)
            ->setName($data['street_to']);

        $streetTo = (new StreetRepository($streetTo))->save();

        $addressFrom = (new Address())
            ->setStreet($streetFrom)
            ->setHouseNumber($data['address_from']);

        $addressTo = (new Address())
            ->setStreet($streetTo)
            ->setHouseNumber($data['address_to']);

        $addressFrom = (new AddressRepository($addressFrom))->save();
        $addressTo   = (new AddressRepository($addressTo))->save();

        $manager = (new Manager())->setName($data['manager']);
        $manager = (new ManagerRepository($manager))->save();

        $partnerTypesReference = (new PartnerTypesReference())->setName($data['partner_type']);
        $partnerTypesReference = (new PartnerTypesReferenceRepository($partnerTypesReference))->save();

        $partner = (new Partner())
            ->setName($data['partner_name'])
            ->setType($partnerTypesReference)
            ->setAddressFrom($addressFrom)
            ->setAddressTo($addressTo)
            ->setManager($manager);
        $partner = (new PartnerRepository($partner))->save();
        return true;
    }

    /**
     * Ленивая реализация через удаление прошлого контрагента и создания нового
     * "update"
     *
     * @param $previous
     * @param array $data
     * @return bool
     */
    public static function update($previous, array $data)
    {
        if (self::validateData($data) !== true) {
            return false;
        }
        $partnerRepository = (new PartnerRepository())->delete($previous);
        self::create($data);
        return true;
    }

    /**
     * Проверка существования нужных ключей
     *
     * @param array $data
     * @return bool
     */
    private static function validateData(array $data): bool
    {
        if (array_key_exists("partner_name", $data) &&
            array_key_exists("partner_type", $data) &&
            array_key_exists("city_from",    $data) &&
            array_key_exists("street_from",  $data) &&
            array_key_exists("address_from", $data) &&
            array_key_exists("city_to",      $data) &&
            array_key_exists("street_to",    $data) &&
            array_key_exists("address_to",   $data) &&
            array_key_exists("manager",      $data)) {
            return true;
        } else {
            return false;
        }
    }
}