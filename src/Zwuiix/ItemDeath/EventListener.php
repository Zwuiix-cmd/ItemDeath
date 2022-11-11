<?php

namespace Zwuiix\ItemDeath;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\player\Player;
use Zwuiix\ItemDeath\utils\Utils;

class EventListener implements Listener
{
    public function onDeath(PlayerDeathEvent $event)
    {
        $player = $event->getPlayer();
        $event->setDeathMessage("");

        $cause = $player->getLastDamageCause()->getCause();
        if ($cause === EntityDamageEvent::CAUSE_ENTITY_ATTACK) {
            $damager=$event->getPlayer()->getLastDamageCause()->getDamager();
            if(!$damager instanceof Player)return;
            $message=str_replace(["{KILLER}", "{KILLED}", "{KILLER_ITEMS}", "{KILLED_ITEMS}"], [$damager->getName(), $player->getName(), Utils::getInstance()->getItemsCount($damager), Utils::getInstance()->getItemsCount($player)], Main::getInstance()->getConfig()->get("message"));
            $event->setDeathMessage($message);
        }
    }
}