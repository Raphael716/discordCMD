<?php

namespace zeyroz\discordcommands;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerDropItemEvent;

class Main extends PluginBase implements Listener {
    /** @var string[] */
    private $config;

    public function onEnable() : void {
        $this->config = $this->getConfig()->getAll();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $cmd,$label, array $args) : bool {
        switch($cmd->getName()) {
            case "discord":
                if($sender instanceof Player){
                        $sender->sendMessage($this->config["message"]);
                } else {
                    $sender->sendMessage($this->config["error"]);
                }
        }
        return true;
    }
}
