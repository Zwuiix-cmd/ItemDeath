<?php

namespace Zwuiix\ItemDeath\utils;

use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\player\Player;
use pocketmine\utils\SingletonTrait;
use Zwuiix\ItemDeath\Main;

class Utils
{
    use SingletonTrait;

    public function getItemsCount(Player $player): int
    {
        $item=explode(":", Main::getInstance()->getConfig()->get("item"));
        return count($player->getInventory()->all(ItemFactory::getInstance()->get($item[0], $item[1])));
    }
}