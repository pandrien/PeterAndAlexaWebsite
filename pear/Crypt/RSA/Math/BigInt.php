<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Crypt_RSA allows to do following operations:
 *     - key pair generation
 *     - encryption and decryption
 *     - signing and sign validation
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Encryption
 * @package    Crypt_RSA
 * @author     Alexander Valyalkin <valyala@gmail.com>
 * @copyright  2005 Alexander Valyalkin
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    1.0.0
 * @link       http://pear.php.net/package/Crypt_RSA
 */

/**
 * Crypt_RSA_Math_BigInt class.
 *
 * Provides set of math functions, which are used by Crypt_RSA package
 * This class is a wrapper for big_int PECL extension,
 * which could be loaded from http://pecl.php.net/packages/big_int
 *
 * @category   Encryption
 * @package    Crypt_RSA
 * @author     Alexander Valyalkin <valyala@gmail.com>
 * @copyright  2005 Alexander Valyalkin
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @link       http://pear.php.net/package/Crypt_RSA
 * @version    @package_version@
 * @access     public
 */
class Crypt_RSA_Math_BigInt
{
    /**
     * error description
     *
     * @var string
     * @access public
     */
    var $errstr = '';

    /**
     * Crypt_RSA_Math_BigInt constructor.
     * Checks an existance of big_int PECL math package.
     * This package is available at http://pecl.php.net/packages/big_int
     * On failure saves error description in $this->errstr
     *
     * @access public
     */
    function Crypt_RSA_Math_BigInt()
    {
        if (!extension_loaded('big_int')) {
            if (!@dl('big_int.' . PHP_SHLIB_SUFFIX) && !@dl('php_big_int.' . PHP_SHLIB_SUFFIX)) {
                // cannot load big_int extension
                $this->errstr = 'Crypt_RSA package requires big_int PECL package. ' .
                     'It is available at http://pecl.php.net/packages/big_int';
                return;
            }
        }

        // check version of big_int extension ( Crypt_RSA requires version 1.0.2 and higher )
        if (!in_array('bi_info', get_extension_funcs('big_int'))) {
            // there is no bi_info() function in versions, older than 1.0.2
            $this->errstr = 'Crypt_RSA package requires big_int package version 1.0.2 and higher';
        }
    }

    /**
     * Transforms binary representation of large integer into its native form.
     * 
     * Example of transformation:
     *    $str = "\x12\x34\x56\x78\x90";
     *    $num = 0x9078563412;
     *
     * @param string $str
     * @return big_int resource
     * @access public
     */
    function bin2int($str)
    {
        return bi_unserialize($str);
    }

    /**
     * Transforms large integer into binary representation.
     * 
     * Example of transformation:
     *    $num = 0x9078563412;
     *    $str = "\x12\x34\x56\x78\x90";
     *
     * @param big_int resource $num
     * @return string
     * @access public
     */
    function int2bin($num)
    {
        return bi_serialize($num);
    }

    /**
     * Calculates pow($num, $pow) (mod $mod)
     *
     * @param big_int resource $num
     * @param big_int resource $pow
     * @param big_int resource $mod
     * @return big_int resource
     * @access public
     */
    function powmod($num, $pow, $mod)
    {
        return bi_powmod($num, $pow, $mod);
    }

    /**
     * Calculates $num1 * $num2
     *
     * @param big_int resource $num1
     * @param big_int resource $num2
     * @return big_int resource
     * @access public
     */
    function mul($num1, $num2)
    {
        return bi_mul($num1, $num2);
    }

    /**
     * Compares abs($num1) to abs($num2).
     * Returns:
     *   -1, if abs($num1) < abs($num2)
     *   0, if abs($num1) == abs($num2)
     *   1, if abs($num1) > abs($num2)
     *
     * @param big_int resource $num1
     * @param big_int resource $num2
     * @return int
     * @access public
     */
    function cmpAbs($num1, $num2)
    {
        return bi_cmp_abs($num1, $num2);
    }

    /**
     * Finds next strong pseudoprime number, following after $num
     *
     * @param big_int resource $num
     * @return big_int resource
     * @access public
     */
    function nextPrime($num)
    {
        return bi_next_prime($num);
    }

    /**
     * Generates random number wich bit length $bits_cnt,
     * using $random_generator as random generator function.
     * If is_set_higher_bit != false, then higer bit of result
     * will be set to 1.
     *
     * @param int $bits_cnt
     * @param string $rnd_generator
     * @return big_int resource
     * @access public
     */
    function getRand($bits_cnt, $random_generator, $is_set_higher_bit = false)
    {
        $tmp = bi_rand($bits_cnt, $random_generator);
        return $is_set_higher_bit ? bi_set_bit($tmp, $bits_cnt - 1) : $tmp;
    }

    /**
     * Calculates $num - 1
     *
     * @param big_int resource $num
     * @return big_int resource
     * @access public
     */
    function dec($num)
    {
        return bi_dec($num);
    }

    /**
     * Returns true, if $num is equal to zero. Else returns false
     *
     * @param big_int resource $num
     * @return bool
     * @access public
     */
    function isZero($num)
    {
        return bi_is_zero($num);
    }

    /**
     * Finds greatest common divider (GCD) of $num1 and $num2
     *
     * @param big_int resource $num1
     * @param big_int resource $num2
     * @return big_int resource
     * @access public
     */
    function gcd($num1, $num2)
    {
        return bi_gcd($num1, $num2);
    }

    /**
     * Finds inverse number $inv for $num by modulus $mod, such as:
     *     $inv * $num = 1 (mod $mod)
     *
     * @param big_int resource $num
     * @param big_int resource $mod
     * @return big_int resource
     * @access public
     */
    function invmod($num, $mod)
    {
        return bi_invmod($num, $mod);
    }

    /**
     * Returns bit length of number $num
     *
     * @param big_int resource $num
     * @return int
     * @access public
     */
    function bitLen($num)
    {
        return bi_bit_len($num);
    }

    /**
     * Calculates bitwise or of $num1 and $num2,
     * starting from bit $start_pos for number $num1
     *
     * @param big_int resource $num1
     * @param big_int resource $num2
     * @param int $start_pos
     * @return big_int resource
     * @access public
     */
    function bitOr($num1, $num2, $start_pos)
    {
        return bi_or($num1, $num2, $start_pos);
    }

    /**
     * Returns part of number $num, starting at bit
     * position $start with length $length
     *
     * @param big_int resource $num
     * @param int start
     * @param int length
     * @return big_int resource
     * @access public
     */
    function subint($num, $start, $length)
    {
        return bi_subint($num, $start, $length);
    }

    /**
     * Returns name of current wrapper
     *
     * @return string name of current wrapper
     * @access public
     */
    function getWrapperName()
    {
        return 'BigInt';
    }
}

?>