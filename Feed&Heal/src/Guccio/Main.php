<?php

namespace Guccio;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class main extends PluginBase implements Listener{

    public function onEnable(): void
    {
        $this->getLogger()->notice("Le plugin de feed&heal est actif");
    }

    public function onDisable(): void
    {
        $this->getLogger()->notice("Le plugin de feed&heal est inactif");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        $commandname = $command->getName();
        if($commandname == "feed"){
                if($sender instanceof Player){
                    $sender->getHungerManager()->setFood(20);
                    $sender->getHungerManager()->setSaturation(20);
                    $sender->sendMessage("Vous avez bien été Feed!!");

                }
            }


        if($commandname == "heal"){
            if($sender instanceof Player){
                $sender->setHealth(20);
                $sender->sendMessage("Vous avez bien été Heal!!");
            }
        }
    }
}
