<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TgBotApi\BotApiBase\BotApiInterface;
use TgBotApi\BotApiBase\Method\SetWebhookMethod;

class TelegramSetWebHook extends Command
{
    private $botApi;

    public function __construct(BotApiInterface $botApi, string $name = null)
    {
        parent::__construct($name);
        $this->botApi = $botApi;
    }

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'telegram:set-webhook';

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $url = 'https://efe1-85-249-175-151.ngrok.io/webhook';
        $method = SetWebhookMethod::create($url);
        $result = $this->botApi->set($method);

        if(!$result) {
            return Command::FAILURE;
        }
        $output->writeln("Новый wehook url:{$url}");
        return Command::SUCCESS;
    }
}