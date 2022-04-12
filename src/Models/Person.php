<?php

namespace Sportakal\Digitalplanet\Models;

class Person extends DigitalplanetModel
{
    protected string $FirstName;
    protected string $FamilyName;
    protected string $Title;
    protected string $MiddleName;
    protected string $NameSuffix;

    /**
     * @param string $FirstName
     */
    public function setFirstName(string $FirstName): void
    {
        $this->FirstName = $FirstName;
    }

    /**
     * @param string $FamilyName
     */
    public function setFamilyName(string $FamilyName): void
    {
        $this->FamilyName = $FamilyName;
    }

    /**
     * @param string $Title
     */
    public function setTitle(string $Title): void
    {
        $this->Title = $Title;
    }

    /**
     * @param string $MiddleName
     */
    public function setMiddleName(string $MiddleName): void
    {
        $this->MiddleName = $MiddleName;
    }

    /**
     * @param string $NameSuffix
     */
    public function setNameSuffix(string $NameSuffix): void
    {
        $this->NameSuffix = $NameSuffix;
    }
}
