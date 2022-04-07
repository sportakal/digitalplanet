<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Person implements ElementInterface
{
    protected string $firstName;
    protected string $familyName;
    protected string $title;
    protected string $middleName;
    protected string $nameSuffix;

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $familyName
     */
    public function setFamilyName(string $familyName): void
    {
        $this->familyName = $familyName;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName(string $middleName): void
    {
        $this->middleName = $middleName;
    }

    /**
     * @param string $nameSuffix
     */
    public function setNameSuffix(string $nameSuffix): void
    {
        $this->nameSuffix = $nameSuffix;
    }


    public function get(): array
    {
        return [
            'FirstName' => $this->firstName,
            'FamilyName' => $this->familyName,
            'Title' => $this->title ?? null,
            'MiddleName' => $this->middleName ?? null,
            'NameSuffix' => $this->nameSuffix ?? null,
        ];
    }
}
