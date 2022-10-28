<?php

namespace Guccio\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class Feed extends Command
{

    public function __construct()
    {
        parent::__construct("feed", "Permet de vous nourrir", "/feed", []);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("feed.use")) {
                if ($sender->getHungerManager()->getFood() < 20) {
                    $sender->getHungerManager()->setFood(20);
                    $sender->getHungerManager()->setSaturation(2);
                    $sender->sendMessage("§aVous venez d'être rassasié(e) !");
                } else {
                    $sender->sendMessage("§cVous n'avez pas besoin d'être rassasié(e) !");
                }
            } else {
                $sender->sendMessage("§cVous n'avez pas la permission d'utiliser cette commande.");
            }
        } else {
            $sender->sendMessage("§cCommande non exécutable dans la console");
        }
    }
}