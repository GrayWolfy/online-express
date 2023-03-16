<?php
declare(strict_types=1);

namespace App\Helpers;

class ObjectCloner
{
    /**
     * Рекурсивно клонирует объект, включая свойства-массивы с другими объектами.
     * @param object $obj Объект для клонирования.
     * @return object Клонированный объект.
     */
    public function cloneObject(object $obj): object
    {
        $clone = clone $obj;
        foreach ($clone as $key => $value) {
            if (is_object($value)) {
                $clone->$key = $this->cloneObject($value);
            } elseif (is_array($value)) {
                $arrClone = array();
                foreach ($value as $subKey => $subValue) {
                    if (is_object($subValue)) {
                        $arrClone[$subKey] = $this->cloneObject($subValue);
                    } else {
                        $arrClone[$subKey] = $subValue;
                    }
                }
                $clone->$key = $arrClone;
            } else {
                $clone->$key = $value;
            }
        }

        return $clone;
    }
}
