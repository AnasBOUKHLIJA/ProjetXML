<?php

class PermissionController
{
    static function get($Code): array {
        return Permission::get($Code);
    }
}