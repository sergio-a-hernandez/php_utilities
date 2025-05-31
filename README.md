# SharpString

**SharpString** is a lightweight PHP class that extends native string handling with a more object-oriented approach. Inspired by method chaining and utility-style operations from other programming languages, `SharpString` provides a fluent interface for string manipulation, comparison, and conversion.

## Features

* String addition and subtraction (`add`, `subtract`)
* Type-safe handling with error checking
* Enhanced string utility methods:

  * `compareTo`, `contains`, `startsWith`, `endsWith`, `equals`
  * `getHashCode`, `getType`, `indexOf`, `lastIndexOf`, `lengthOf`
  * `replace`, `insert`, `remove`, `substring`, `split`
  * `toUpper`, `toLower`, `trim`, `toCharArray`
* Automatic numeric value detection with `toValue()`:

  * Supports decimal, octal, and hexadecimal

## Installation

No dependencies required. Just include the `SharpString` class in your project:

```php
require_once 'SharpString.php';
```

## Usage

### Creating a new instance

```php
$firstName = new SharpString("Steven");
$lastName = new SharpString("Clark");
```

### Adding and subtracting strings

```php
echo $firstName->add($lastName); // StevenClark
echo $firstName->subtract("ven"); // Ste
```

### Comparison and inspection

```php
echo $firstName->compareTo($lastName); // 1 if different, 0 if equal
echo $firstName->contains("ven"); // true
echo $firstName->startsWith("S"); // true
echo $firstName->endsWith("n"); // true
```

### Transformation

```php
echo $firstName->toUpper(); // STEVEN
echo $firstName->toLower(); // steven
echo $firstName->insert(0, "Mr. "); // Mr. Steven
echo $firstName->replace("e", "i"); // Stivin
```

### Splitting and substring

```php
print_r($firstName->split("e")); // ['St', 'v', 'n']
echo $firstName->substring(0, 4); // Stev
```

### Numeric conversion

```php
$dec = new SharpString("123.45");
$oct = new SharpString("0123");
$hex = new SharpString("0x1A3F");

echo $dec->toValue(); // 123.45
echo $oct->toValue(); // 83 (octal)
echo $hex->toValue(); // 6719 (hex)
```

## Output Example

Here's a partial example of the output you’ll get when running the class directly:

```
StevenClark
Steven Clark
Steven
Steven 
Steven Clark
1
1
1
0
245636124
string
2
steven clark
STEVEN CLARK
HelloSteven Clark
8
12
Steve
Stivin Clark
St
v
n
1
even 
Array
(
    [0] => S
    [1] => t
    ...
)
Steven Clark
Convert to value:
Decimal: 1234.55
Octal: 668
Hexadecimal: 4660
Non-numeric text: 
...
```

## Notes

* The `toValue()` method tries to detect and convert the string into a numeric value:

  * Strings starting with `"0x"` are treated as hexadecimal.
  * Strings starting with `"0"` (excluding `"0x"`) are treated as octal.
  * Other valid numbers are treated as decimals.
  * If the string is not a valid number, `null` is returned.

## License

This code is open-source and free to use under the MIT License.

## Author

Originally developed by Sergio A. Hernandez. Contributions and improvements are welcome.
