<?php

namespace Guccio;

use Guccio\Commands\Feed;
use Guccio\Commands\Heal;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->getServer()->getCommandMap()->registerAll("", [
            new Feed(),
            new Heal()
        ]);
    }
}