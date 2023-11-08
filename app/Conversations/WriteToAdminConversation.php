<?php

namespace App\Conversations;

use Psr\SimpleCache\InvalidArgumentException;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardRemove;

class WriteToAdminConversation extends Conversation
{
    /**
     * @throws InvalidArgumentException
     */
    public function start(Nutgram $bot): void
    {
        $bot->sendMessage(
            text: "Marhamat xabaringizni yozib qoldiring",
            reply_markup: ReplyKeyboardRemove::make(
                remove_keyboard: true
            )
        );

        $this->next('request_message');
    }

    /**
     * @throws InvalidArgumentException
     */
    public function request_message(Nutgram $bot): void
    {
        $text = $bot->message()->text;
        $bot->sendMessage(text: $text, chat_id: config('app.admin'));
        $bot->sendMessage("Xabar yuborildi");
        $this->end();
    }
}