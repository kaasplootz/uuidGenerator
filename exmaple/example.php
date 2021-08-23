<?php

declare(strict_types=1);

namespace example;

require_once __DIR__ . '/../vendor/autoload.php';

use kaasplootz\uuid_generator\UuidGenerator;

$generator = new UuidGenerator();
echo $generator->generate();