<?php

namespace Sportakal\Digitalplanet\Models;

class CommunicationChannels extends DigitalplanetModel
{
    protected string $Telephone;
    protected string $Telefax;
    protected string $ElectronicMail;
    protected array $Others = [];

    /**
     * @param string $Telephone
     */
    public function setTelephone(string $Telephone): void
    {
        $this->Telephone = $Telephone;
    }

    /**
     * @param string $Telefax
     */
    public function setTelefax(string $Telefax): void
    {
        $this->Telefax = $Telefax;
    }

    /**
     * @param string $ElectronicMail
     */
    public function setElectronicalMail(string $ElectronicMail): void
    {
        $this->ElectronicMail = $ElectronicMail;
    }

    /**
     * @param array $Others
     */
    public function setOthers(array $Others): void
    {
        $this->Others = $Others;
    }
}
