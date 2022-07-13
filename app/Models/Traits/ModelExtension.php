<?php

namespace App\Models\Traits;

use Exception;

trait ModelExtension
{
    /**
     * Get table name staticaly.
     * Получить название таблицы статично.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return with(new static )->getTable();
    }

    /**
     * Get the connection name staticaly.
     * Получить название соединения статично.
     *
     * @return string
     */
    public static function getDBConnection(): string
    {
        return with(new static )->getConnectionName();
    }

    /**
     * Getting object of model by code.
     *
     * @param string $code
     * @return self
     */
    public static function getByCode(string $code): self
    {
        $modelObject = self::where((new self)->codeField ?? 'code', $code)->first();

        if (!$modelObject) {
            throw new Exception('Record not found. Make sure you pass a correct code!', 500);
        }

        return $modelObject;
    }
}
