<?php

namespace Refaltor\MessageLogs;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;

class MessageLogs extends PluginBase implements Listener
{
    protected function onEnable(): void
    {
        @mkdir($this->getDataFolder() . 'logs/');
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onChat(PlayerChatEvent $event): void
    {
        $file = fopen($this->getDataFolder() . 'logs/chat.txt', 'a+');
        $log = "[" . date('d-m-Y H:i:s') . "] {$event->getFormat()}\n";
        fwrite($file, $log);
        fclose($file);
    }
}
