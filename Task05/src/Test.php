<?php

namespace Ariskinnv\Task05;

function runTest()
{
    $truncater = new Truncater();
    echo $truncater->truncate('Длинный текст', ['length' => 5 ]) . PHP_EOL;
    echo $truncater->truncate('') . PHP_EOL;
    echo $truncater->truncate('Арискин Николай Витальевич') . PHP_EOL;
    echo $truncater->truncate('Арискин Николай Витальевич', ['length' => 10]) . PHP_EOL;
    echo $truncater->truncate('Арискин Николай Витальевич', ['length' => 50]) . PHP_EOL;
    echo $truncater->truncate('Арискин Николай Витальевич', ['length' => -10]) . PHP_EOL;
    echo $truncater->truncate('Арискин Николай Витальевич', ['length' => 10, 'separator' => '*']) . PHP_EOL;
    echo $truncater->truncate('Арискин Николай Витальевич', ['separator' => '*']) . PHP_EOL;
}
