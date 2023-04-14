<?php

namespace Ariskinnv\Tests;
use \PHPUnit\Framework\TestCase;
use Ariskinnv\Task05\Truncater;

class TruncaterTest extends TestCase
{
    public function Reduction()
    {
        $truncater = new Truncater();
        $this->assertSame('Длинн...', $truncater->truncate('Длинный текст', ['length' => 5 ]));
        $this->assertSame('...', $truncater->truncate(''));
        $this->assertSame('Арискин Николай Витальевич...', $truncater->truncate('Арискин Николай Витальевич'));
        $this->assertSame('Арискин Ни...', $truncater->truncate('Арискин Николай Витальевич', ['length' => 10]));
        $this->assertSame('Арискин Николай Витальевич...', $truncater->truncate('Арискин Николай Витальевич', ['length' => 50]));
        $this->assertSame('Арискин Николай Витальевич...', $truncater->truncate('Арискин Николай Витальевич', ['length' => -10]));
        $this->assertSame('Арискин Ни*', $truncater->truncate('Арискин Николай Витальевич', ['length' => 10, 'separator' => '*']));
        $this->assertSame('Арискин Николай Витальевич*', $truncater->truncate('Арискин Николай Витальевич', ['separator' => '*']));
    }
}
