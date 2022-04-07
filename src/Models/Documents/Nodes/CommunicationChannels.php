<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class CommunicationChannels implements ElementInterface
{
    protected string $telephone;
    protected string $telefax;
    protected string $electronicalMail;
    protected array $others = [];

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @param string $telefax
     */
    public function setTelefax(string $telefax): void
    {
        $this->telefax = $telefax;
    }

    /**
     * @param string $electronicalMail
     */
    public function setElectronicalMail(string $electronicalMail): void
    {
        $this->electronicalMail = $electronicalMail;
    }

    /**
     * @param array $others
     */
    public function setOthers(array $others): void
    {
        $this->others = $others;
    }


    public function get(): array
    {
        return [
            'Telephone' => $this->telephone ?? null,
            'Telefax' => $this->telefax ?? null,
            'ElectronicMail' => $this->electronicalMail ?? null,
            'Others' => $this->others ?? null,
        ];
    }
}
