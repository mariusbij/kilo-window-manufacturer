<?php

namespace Marius\KiloWindowManufacturer\Experts;

class PlasticWindowExpert implements WindowExpertInterface
{
    private string $description = 'Plastic window expert';

    public function getDescription(): string
    {
        return $this->description;
    }
}