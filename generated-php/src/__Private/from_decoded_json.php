<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private;

use Facebook\HHAST\{SchemaVersionError, Script};
use const Facebook\HHAST\SCHEMA_VERSION;
/**
 * @param array<string, mixed> $json
 */
function from_decoded_json(array $json, ?string $file = null) : Script
{
    $version = $json['version'] ?? null;
    if (\is_string($version) && $version !== SCHEMA_VERSION) {
        throw new SchemaVersionError($file ?? '! no file !', $version);
    }
    return Script::fromJSON($json['parse_tree'], $file ?? '! no file !', 0, $json['program_text'], 'Script');
}

