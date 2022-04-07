<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class InvoiceLines implements ElementInterface
{
    protected array $lines;

    /*
     * @param Line $lines
     */
    public function setLine(Line $line): void
    {
        $this->lines[] = $line->get();
    }

    public function get(): array
    {
        return $this->lines;
    }
}
