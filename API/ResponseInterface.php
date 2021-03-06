<?php
/**
 * This file is a part of Siny\Amazon\ProductAdvertisingAPIBundle package.
 *
 * (c) Shinichiro Yuki <edy@siny.jp>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Siny\Amazon\ProductAdvertisingAPIBundle\API;

/**
 * This is an interface of Response object.
 *
 * @package SinyAmazonProductAdvertisingAPI
 * @subpackage API
 * @author Shinichiro Yuki <edy@siny.jp>
 */
interface ResponseInterface
{
    /**
     * Is this response success ?
     *
     * @return boolean - Whether the response is successful
     */
    public function isSuccess();

    /**
     * To a SimpleXmlElement class instance created from the returned XML
     *
     * @return SimpleXmlElement class instance
     */
    public function toSimpleXmlElement();

    /**
     * Get a raw body message
     *
     * @return string - A raw response body
     */
    public function getRawBody();
}
