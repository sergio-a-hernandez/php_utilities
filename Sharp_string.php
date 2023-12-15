<?php

class Sharp_string {
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function add($other) {
        if ($other instanceof Sharp_string) {
            return new Sharp_string($this->value . $other->value);
        } elseif (is_string($other)) {
            return new Sharp_string($this->value . $other);
        } else {
            throw new \TypeError("Unsupported operand type for +: " . gettype($other));
        }
    }

    public function subtract($other) {
        if ($other instanceof Sharp_string) {
            return new Sharp_string(str_replace($other->value, "", $this->value));
        } elseif (is_string($other)) {
            return new Sharp_string(str_replace($other, "", $this->value));
        } else {
            throw new \TypeError("Unsupported operand type for -: " . gettype($other));
        }
    }

    public function __toString() {
        return $this->value;
    }

    public function clone() {
        return $this->value;
    }

    public function compareTo($other) {
        return ($this->value == $other) ? 0 : 1;
    }

    public function contains($subStr) {
        return strpos($this->value, $subStr) !== false;
    }

    public function endsWith($endStr) {
        return substr($this->value, -strlen($endStr)) === $endStr;
    }

    public function equals($other) {
        return $this->value == $other;
    }

    public function getHashCode() {
        return crc32($this->value);
    }

    public function getType() {
        return gettype($this->value);
    }

    public function indexOf($char) {
        return strpos($this->value, $char);
    }

    public function toLower() {
        return strtolower($this->value);
    }

    public function toUpper() {
        return strtoupper($this->value);
    }

    public function insert($index, $insertStr) {
        return substr_replace($this->value, $insertStr, $index, 0);
    }

    public function lastIndexOf($char) {
        return strrpos($this->value, $char);
    }

    public function lengthOf() {
        return strlen($this->value);
    }

    public function remove($index) {
        return substr($this->value, 0, $index);
    }

    public function replace($oldChar, $newChar) {
        return str_replace($oldChar, $newChar, $this->value);
    }

    public function split($delimiter) {
        return explode($delimiter, $this->value);
    }

    public function startsWith($char) {
        return strpos($this->value, $char) === 0;
    }

    public function substring($start, $end) {
        return substr($this->value, $start, $end - $start);
    }

    public function toCharArray() {
        return str_split($this->value);
    }

    public function trim() {
        return trim($this->value);
    }

    public function toValue() {
        // Octal
        if (preg_match('/^0[0-7]+$/', $this->value)) {
            return octdec($this->value);
        }
    
        // Decimal
        if (preg_match('/^-?\d*\.?\d+$/', $this->value)) {
            return floatval($this->value);
        }
    
        // Hexadecimal
        if (preg_match('/^0x[0-9a-fA-F]+$/', $this->value)) {
            return hexdec(substr($this->value, 2));
        }
    
        // Si no es posible convertir, lanzar una excepción
        //echo "No se pudo convertir el valor a un formato reconocido.";
        return null;
    }
    
    
}

if (!debug_backtrace()) {
    // Este bloque se ejecuta solo si el script se ejecuta directamente y no es incluido desde otro script.

    $firstname = new Sharp_string("Steven Clark");
    $lastname = new Sharp_string("Clark");

    $fn = "Steven Clark";
    $ln = "Clark";

    echo $firstname->add($lastname) . "<br />";
    echo $firstname->add($ln) . "<br />";
    echo $firstname->subtract($lastname) . "<br />";
    echo $firstname->subtract($ln) . "<br />";

    echo $firstname->clone() . "<br />";
    echo $firstname->compareTo($lastname) . "<br />";
    echo $firstname->contains("ven") . "<br />";
    echo $firstname->endsWith("n") . "<br />";
    echo $firstname->equals($lastname) . "<br />";
    echo $firstname->getHashCode() . "<br />";
    echo $firstname->getType() . "<br />";
    echo $firstname->indexOf("e") . "<br />";
    echo $firstname->toLower() . "<br />";
    echo $firstname->toUpper() . "<br />";
    echo $firstname->insert(0, "Hello") . "<br />";
    echo $firstname->lastIndexOf("e") . "<br />";
    echo $firstname->lengthOf() . "<br />";
    echo $firstname->remove(5) . "<br />";
    echo $firstname->replace('e', 'i') . "<br />";

    $split = $firstname->split('e');
    foreach ($split as $part) {
        echo $part . "<br />";
    }

    echo $firstname->startsWith("S") . "<br />";
    echo $firstname->substring(2, 7) . "<br />";
    print_r($firstname->toCharArray()); echo "<br />";
    echo $firstname->trim() . "<br />";

    $numeroDecimal = new Sharp_string("1234.55");
    $numeroOctal = new Sharp_string("01234");
    $numeroHexadecimal = new Sharp_string("0x1234");
    $textoNoNumerico1 = new Sharp_string("abc123");
    $textoNoNumerico2 = new Sharp_string("0abc123");
    $textoNoNumerico3 = new Sharp_string("0xgbc123");

    echo "Convertir a valor:<br />";
    echo "Decimal: " . $numeroDecimal->toValue() . "<br />";
    echo "Octal: " . $numeroOctal->toValue() . "<br />";
    echo "Hexadecimal: " . $numeroHexadecimal->toValue() . "<br />";
    echo "Texto no numérico: " . $textoNoNumerico1->toValue() . "<br />";
    echo "Texto no numérico: " . $textoNoNumerico2->toValue() . "<br />";
    echo "Texto no numérico: " . $textoNoNumerico3->toValue() . "<br />";

}
