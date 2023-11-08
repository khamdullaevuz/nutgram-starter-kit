<?php

require __DIR__ . '/vendor/autoload.php';

use App\Commands\StartCommand;
use App\Conversations\WriteToAdminConversation;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Nutgram;

$bot = new Nutgram(config('app.token'));

$bot->registerCommand(StartCommand::class);

$bot->onText('Xabar qoldirish', function () use ($bot){
    WriteToAdminConversation::begin($bot);
});

try {
    $bot->run();
} catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
}