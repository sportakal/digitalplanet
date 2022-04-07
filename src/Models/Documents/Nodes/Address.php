<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Address implements ElementInterface
{
    protected string $country;
    protected string $cityName;
    protected string $citySubdivisionName;
    protected string $room;
    protected string $streetName;
    protected string $buildingName;
    protected string $buildingNumber;
    protected string $postalZone;
    protected string $region;
    protected string $id;

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @param string $cityName
     */
    public function setCityName(string $cityName): void
    {
        $this->cityName = $cityName;
    }

    /**
     * @param string $citySubdivisionName
     */
    public function setCitySubdivisionName(string $citySubdivisionName): void
    {
        $this->citySubdivisionName = $citySubdivisionName;
    }

    /**
     * @param string $room
     */
    public function setRoom(string $room): void
    {
        $this->room = $room;
    }

    /**
     * @param string $streetName
     */
    public function setStreetName(string $streetName): void
    {
        $this->streetName = $streetName;
    }

    /**
     * @param string $buildingName
     */
    public function setBuildingName(string $buildingName): void
    {
        $this->buildingName = $buildingName;
    }

    /**
     * @param string $buildingNumber
     */
    public function setBuildingNumber(string $buildingNumber): void
    {
        $this->buildingNumber = $buildingNumber;
    }

    /**
     * @param string $postalZone
     */
    public function setPostalZone(string $postalZone): void
    {
        $this->postalZone = $postalZone;
    }

    /**
     * @param string $region
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }


    public function get(): array
    {
        return [
            'Country' => $this->country,
            'CityName' => $this->cityName ?? '',
            'CitySubdivisionName' => $this->citySubdivisionName ?? '',
            'Room' => $this->room ?? '',
            'StreetName' => $this->streetName ?? '',
            'BuildingName' => $this->buildingName ?? '',
            'BuildingNumber' => $this->buildingNumber ?? '',
            'PostalZone' => $this->postalZone ?? '',
            'Region' => $this->region ?? '',
            'ID' => $this->id ?? '',
        ];
    }
}
