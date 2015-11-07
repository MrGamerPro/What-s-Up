<?php

namespace What-s-Up;

use pocketmine\command\Command;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\player\Player;
use pocketmine\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

public function OnEnable(){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->saveDefaultConfig();
$this->whup = new Config($this->getDataFolder()."whup.properties", Config::PROPERTIES);
$this->getLogger()->info(TextFormat::BLUE . " [What's Up enabled]");
}

public function onDisable(){
$this->whup->save();
$this->getLogger()->info(TextFormat::BLUE . "[What's Up disabled]");
}

public function onLoad(){
$this->whup->save();
}

public function onJoin(PlayerJoinEvent $e){
$name = $e->getPlayer()->getName();
if(!$this->whup->exist($name)){
  $this->whup->set($name);
  }
}

public function onCommand(CommandSender $sender, Command $command, $label, array $args){
   switch($cmd->getName()){
      case "wu":
      if (!($sender instanceof Player)) {
       $sender->sendMessage(TextFormat::RED . "This command must be run in game!");
    	 return true;
      }else{
      	$state = array_shift($args));
      	$lang = $this->getConfig()->get("lang");
      	$this->whup->set($name, $state);
      	$sender->setNameTag($name, $state);
      	if($lang == italian){
      		$sender->sendMessage(TextFormat::BLUE . "[WHUP] Stato aggiornato con successo!");
      	}
      	if($lang == english){
      		$sender->sendMessage(TextFormat::BLUE . "[WHUP] Succesfully updated state!");
      	}else{
      	  $sender->sendMessage(TextFormat::GOLD . "No message has been made for this language");
      	}
      	return true;
      }
    }
  }
}
