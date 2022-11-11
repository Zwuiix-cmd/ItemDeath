<?php

namespace Zwuiix\ItemDeath;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase
{
    use SingletonTrait;

    protected function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        $this->saveDefaultConfig();
        $this->saveConfig();
    }

    protected function onLoad(): void
    {
        self::setInstance($this);
    }
}