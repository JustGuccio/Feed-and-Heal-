<?php

namespace Guccio\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class Heal extends Command {

    public function __construct()
    {
        parent::__construct("heal", "Permet de se soigner", "/heal", []);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player) {
            if ($sender->hasPermission("heal.use")) {
                if ($sender->getHealth() < 20) {
                    $sender->setHealth(20);
                    $sender->sendMessage("§aVous venez d'être soigné(e) !");
            } else {
                    $sender->sendMessage("§cVous n'avez pas besoin d'être soigné(e) !");
                }
            } else {
                $sender->sendMessage("§cVous n'avez pas la permission d'utiliser cette commande.");
            }
        } else {
            $sender->sendMessage("§cCommande non exécutable dans la console");
        }
    }
}