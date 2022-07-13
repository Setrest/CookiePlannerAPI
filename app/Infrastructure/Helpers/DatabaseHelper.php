<?php

namespace App\Infrastructure\Helpers;

final class DatabaseHelper
{
    public static function getTableNameByModel(string $modelClassName): string
    {
        return with(new $modelClassName)->getTable();
    }

    /**
     * Get exists patern with DB connection and table name.
     * Получить строку для exists правила валидации.
     *
     * @param string $column Указание столбца для поиска
     * @return string
     */
    public static function getExistsRuleString(string $modelClassName, string $column = null): string
    {
        $modelClass = new $modelClassName;

        $rule = 'exists:' . $modelClass->getConnectionName() . '.' . $modelClass->getTable();

        if ($column) {
            $rule .= ',' . $column;
        }

        return $rule;
    }
}