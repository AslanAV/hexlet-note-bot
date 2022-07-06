<?php

namespace App\Service;

use App\Entity\Note;
use App\Repository\NoteRepository;
use Symfony\Component\String\UnicodeString;
use TgBotApi\BotApiBase\Method\SendMessageMethod;

class NoteService
{
    private $textParser;
    private NoteRepository $noteRepository;

    public function __construct(TextParser $textParser, NoteRepository $noteRepository)
    {
        $this->textParser = $textParser;
        $this->noteRepository = $noteRepository;
    }

    public function add(int $chatId, string $text): void
    {

        $noteData = $this->textParser->parseNoteAndTags($text);

        $note = new Note($noteData['text']);

        $this->noteRepository->save($note);

//        $method =SendMessageMethod::create($id, $text);
//        $botApi->send($method);
    }
}