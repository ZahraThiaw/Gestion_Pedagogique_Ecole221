<?php

namespace Core\Validator;

interface ValidatorInterface {
    public function addRule(string $field, string $rule, string $message, $ruleValue = null);
    public function validate(array $data): bool;
    public function getErrors(): array;
}