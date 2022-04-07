<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Notes implements ElementInterface
{
    protected array $notes;

    public function __construct(string $note)
    {
        $this->notes[] = $note;
    }

    /*
     * @param string $note
     */
    public function addNote(string $note): void
    {
        $this->notes[] = $note;
    }

    public function get(): array
    {
        return ['_altKey' => 'Note'] + $this->notes;
    }


}
