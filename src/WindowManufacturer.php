<?php

namespace Marius\KiloWindowManufacturer;

use Marius\KiloWindowManufacturer\Colors\ColorFactory;
use Marius\KiloWindowManufacturer\Experts\WindowExpertInterface;
use Marius\KiloWindowManufacturer\Factories\WindowFactoryDecider;
use Marius\KiloWindowManufacturer\Factories\WindowFactoryInterface;
use Marius\KiloWindowManufacturer\Windows\WindowInterface;

class WindowManufacturer
{
    public function manufactureWindow(string $windowType, string $windowColor): WindowInterface
    {
        try {

            $windowFactoryDecider = new WindowFactoryDecider();
            $windowFactory = $windowFactoryDecider->getAppropriateFactory($windowType);

            $window = $windowFactory->makeWindow();
            $window->setExpert($windowFactory->makeWindowExpert());

            $this->paintWindow($window, $windowColor);

        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit();
        }
        return $window;
    }

    /**
     * @throws \Exception
     */
    private function paintWindow(WindowInterface $window, string $windowColor): void
    {
        $colorFactory = new ColorFactory();
        $color = $colorFactory->processColor($windowColor);
        $window->setColor($color);
    }
}