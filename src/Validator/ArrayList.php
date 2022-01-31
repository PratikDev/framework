<?php
/**
 * Utopia PHP Framework
 *
 * @package Framework
 * @subpackage Validator
 *
 * @link https://github.com/utopia-php/framework
 * @author Appwrite Team <team@appwrite.io>
 * @license The MIT License (MIT) <http://www.opensource.org/licenses/mit-license.php>
 */

namespace Utopia\HTTP\Validator;

use Utopia\Validator;

/**
 * ArrayList
 *
 * Validate that an variable is a valid array value and each element passes given validation
 *
 * @package Utopia\Validator
 */
class ArrayList extends Validator
{
    /**
     * @var Validator
     */
    protected $validator;

    /**
     * Array constructor.
     *
     * Pass a validator that must be applied to each element in this array
     *
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Get Description
     *
     * Returns validator description
     *
     * @return string
     */
    public function getDescription()
    {
        return 'Value must a valid array and ' . $this->validator->getDescription();
    }

    /**
     * Is array
     *
     * Function will return true if object is array.
     *
     * @return bool
     */
    public function isArray(): bool
    {
        return true;
    }

    /**
     * Get Type
     *
     * Returns validator type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->validator->getType();
    }

    /**
     * Is valid
     *
     * Validation will pass when $value is valid array and validator is valid.
     *
     * @param  mixed $value
     * @return bool
     */
    public function isValid($value)
    {
        if (!\is_array($value)) {
            return false;
        }

        foreach ($value as $element) {
            if (!$this->validator->isValid($element)) {
                return false;
            }
        }

        return true;
    }
}
