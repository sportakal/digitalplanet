<?php

namespace Sportakal\Digitalplanet\Models;

class Notes extends DigitalplanetModel
{
    protected array $Notes = ['_key' => 'Note'];

    public function __construct(string $Note)
    {
        $this->Notes[] = $Note;
    }

    /**
     * @param string $Note
     */
    public function addNote(string $Note): void
    {
        $this->Notes[] = $Note;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this)['Notes'];
    }
}
