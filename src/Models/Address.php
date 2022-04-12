<?php

namespace Sportakal\Digitalplanet\Models;

use Sportakal\Digitalplanet\Traits\ToArrayTrait;

class Address extends DigitalplanetModel
{
    protected string $Country;
    protected string $CityName;
    protected string $CitySubdivisionName;
    protected string $Room;
    protected string $StreetName;
    protected string $BuildingName;
    protected string $BuildingNumber;
    protected string $PostalZone;
    protected string $Region;
    protected string $ID;

    /**
     * @param string $Country
     */
    public function setCountry(string $Country): void
    {
        $this->Country = $Country;
    }

    /**
     * @param string $CityName
     */
    public function setCityName(string $CityName): void
    {
        $this->CityName = $CityName;
    }

    /**
     * @param string $CitySubdivisionName
     */
    public function setCitySubdivisionName(string $CitySubdivisionName): void
    {
        $this->CitySubdivisionName = $CitySubdivisionName;
    }

    /**
     * @param string $Room
     */
    public function setRoom(string $Room): void
    {
        $this->Room = $Room;
    }

    /**
     * @param string $StreetName
     */
    public function setStreetName(string $StreetName): void
    {
        $this->StreetName = $StreetName;
    }

    /**
     * @param string $BuildingName
     */
    public function setBuildingName(string $BuildingName): void
    {
        $this->BuildingName = $BuildingName;
    }

    /**
     * @param string $BuildingNumber
     */
    public function setBuildingNumber(string $BuildingNumber): void
    {
        $this->BuildingNumber = $BuildingNumber;
    }

    /**
     * @param string $PostalZone
     */
    public function setPostalZone(string $PostalZone): void
    {
        $this->PostalZone = $PostalZone;
    }

    /**
     * @param string $Region
     */
    public function setRegion(string $Region): void
    {
        $this->Region = $Region;
    }

    /**
     * @param string $ID
     */
    public function setId(string $ID): void
    {
        $this->ID = $ID;
    }
}
