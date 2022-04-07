<?php

namespace Sportakal\Digitalplanet\Helpers;

use DOMDocument;
use DOMElement;

class CreateNode
{
    protected array $elements;
    protected string $name;
    protected DOMElement $node;
    protected DOMDocument $dom_document;
    protected array $attributes;

    public function __construct(DOMDocument $dom_document, string $name, array $elements, array $attributes = [])
    {
        $this->name = $name;
        $this->elements = array_filter($elements);
        $this->dom_document = $dom_document;
        $this->attributes = $attributes;

        $this->create();
    }

    /*
     * Create the node
     * @return DOMElement|null
     */
    protected function createElement(
        string      $name,
        string|null $value
    )
    {
        try {
            return new \DOMElement($name, htmlspecialchars($value));
        } catch (\Exception $e) {
            return dd($e, ['name' => $name, 'value' => $value]);
        }
    }

    /*
     * Create the node
     * @return DOMElement
     */
    protected function createNode(
        string|int            $name, // If there is multiple elements has the same key name key will be integer. For example: Invoice-InvoiceLines-Line can be multiple
        array|string|int|null $value, // If there is unnecessary items it may has null value,
        array                 $attributes = [] // If there is unnecessary items it may has null value,
    ): DOMElement
    {
        if (is_array($value) && !is_string($name)) {
            $name = $value['_key'];
            unset($value['_key']);
        }

        if (is_array($value)) {
            $node = $this->dom_document->createElement($name);
            foreach ($value['_attributes'] ?? $attributes as $key => $attribute) {
                $node->setAttribute($key, $attribute);
            }
            unset($value['_attributes']);

            foreach ($value as $key => $element) {
                if ($element === null) {
                    continue;
                }
                if (!is_string($key) && !isset($element['_key'])) {
                    $name = $value['_altKey'];
                    $key = $name;
                }
                $new_node = $this->createNode($key, $element);
                $node->appendChild($new_node);
            }
        } else {
            $node = $this->createElement($name, $value);
        }

        return $node;
    }

    /*
     * Create Identification
     * @return DOMDocument
     */
    protected function create(): DOMElement
    {
//        try {
        return $this->node = $this->createNode($this->name, $this->elements, $this->attributes);
//        }catch (\Exception $e) {
//            return dd($this);
//        }
    }

    /*
     * @return DOMElement
     */
    public function getNode(): DOMElement
    {
        return $this->node;
    }


}
