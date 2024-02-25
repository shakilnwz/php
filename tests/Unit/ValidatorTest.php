<?php

use Core\Validator;

it('validates a string', function () {
    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();
});

it('validates a string with a maximum length', function () {
    expect(Validator::string('foobar', 10))->toBeFalse();
    expect(Validator::string('foobar', 5))->toBeTrue();
});

it('validates an email', function () {
    expect(Validator::email('foobar'))->toBeFalse();
    expect(Validator::email(false))->toBeFalse();
    expect(Validator::email('foobar@someone.com'))->toBe('foobar@someone.com');
});

it('validates a number greater than a value', function () {
    expect(Validator::greaterThan(5, 1))->toBeTrue();
    expect(Validator::greaterThan(5, 5))->toBeFalse();
})->only();
