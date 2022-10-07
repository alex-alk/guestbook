<?php

namespace App\Tests;

use App\Entity\Comment;
use PHPUnit\Framework\TestCase;

class SpamCheckerTest extends TestCase
{
    public function testSpamScoreWithInvalidRequest(): void
    {
        $comment = new Comment();
    }
}
