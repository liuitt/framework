<?php
namespace Liuitt\Traits;

use BadMethodCallException,
    InvalidArgumentException;

trait Accessor
{
    public function __call($method, $args)
    {
        $pattern = '/(?P<accessor>set|get)(?P<property>[A-Z][a-zA-Z0-9]*)/';

        if (!preg_match($pattern, $method, $match) ||
            !property_exists(__CLASS__, $match['property']
                = lcfirst($match['property']))
        ) {

            throw new BadMethodCallException(
                sprintf(
                    'Method "%s" does not exist in %s',
                    $method,
                    __CLASS__
                )
            );
        }

        switch ($match['accessor']) {

            case 'get':
                return $this->{$match['property']};

            case 'set':
                if (!$args) {
                    throw new InvalidArgumentException(
                        sprintf(
                            '"%s%s" requires an argument value.',
                            __NAMESPACE__,
                            $method
                        )
                    );
                }

                $this->{$match['property']} = $args[0];

                return $this;
        }
    }
}
