<?php

/**
 * Note:
 * Starting from PHPStan 1.10.49, void types, including void in unions, are
 * transformed into null.
 *
 * @link https://github.com/phpstan/phpstan-src/pull/2778
 */

declare(strict_types=1);

namespace PhpStubs\WordPress\Core\Tests;

use function wp_dropdown_languages;
use function PHPStan\Testing\assertType;

$emptyStringOrNull = Faker::union('', null);
$stringOrNull = Faker::union(Faker::string(), null);

// Default value
assertType('string', wp_dropdown_languages());
assertType('string', wp_dropdown_languages(['selected' => '']));

// Void return type
assertType('null', wp_dropdown_languages(['id' => $emptyStringOrNull, 'selected' => ''])); // SKIP: `void` from a conditional return type is not read as `null`
assertType('null', wp_dropdown_languages(['name' => $emptyStringOrNull, 'selected' => ''])); // SKIP: `void` from a conditional return type is not read as `null`
assertType('null', wp_dropdown_languages(['id' => $emptyStringOrNull, 'name' => $emptyStringOrNull, 'selected' => ''])); // SKIP: `void` from a conditional return type is not read as `null`

// string return type
assertType('string', wp_dropdown_languages(['id' => 'nonEmptyString', 'selected' => '']));
assertType('string', wp_dropdown_languages(['name' => 'nonEmptyString', 'selected' => '']));
assertType('string', wp_dropdown_languages(['id' => 'nonEmptyString', 'name' => 'nonEmptyString', 'selected' => '']));

// Unknown value
assertType('string|null', wp_dropdown_languages(['id' => $stringOrNull, 'selected' => ''])); // SKIP: `void` from a conditional return type is not read as `null`
assertType('string|null', wp_dropdown_languages(['name' => $stringOrNull, 'selected' => ''])); // SKIP: `void` from a conditional return type is not read as `null`
assertType('string|null', wp_dropdown_languages(['id' => $stringOrNull, 'name' => $stringOrNull, 'selected' => ''])); // SKIP: `void` from a conditional return type is not read as `null`
assertType('string|null', wp_dropdown_languages(['id' => 'nonEmptyString', 'name' => $stringOrNull, 'selected' => ''])); // SKIP: `void` from a conditional return type is not read as `null`
assertType('string|null', wp_dropdown_languages(['id' => $stringOrNull, 'name' => 'nonEmptyString', 'selected' => ''])); // SKIP: `void` from a conditional return type is not read as `null`
