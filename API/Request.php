<?php
/**
 * This file is a part of SinyAmazonProductAdvertisingAPIBundle package.
 *
 * @author Shinichiro YUKI <sinycourage@gmail.com>
 */

namespace Siny\Amazon\ProductAdvertisingAPIBundle\API;

use Siny\Amazon\ProductAdvertisingAPIBundle\API\Exception;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * This is a class to send HTTP request to Amazon
 * through the Amazon Product Advertising API.
 *
 * @author Shinichiro YUKI <sinycourage@gmail.com>
 */
class Request
{
    // API version
    const API_VERSION = '2010-09-01';

    // Timestamp format
    const DATE_FORMAT_ISO8601 = 'Y-m-d\TH:i:s\Z';

    // Countries
    const LOCALE_CA = 'CA'; // canada
    const LOCALE_DE = 'DE'; // germany
    const LOCALE_FR = 'FR'; // france
    const LOCALE_JP = 'JP'; // japan
    const LOCALE_UK = 'UK'; // united kingdom
    const LOCALE_US = 'US'; // united states of america

    // Path
    const REQUEST_PATH = '/onca/xml';

    // Queue prefix
    const QUEUE_PREFIX = 'AmazonRequest';

    // Access Key ID
    protected $awsAccessKeyId;

    // Secret Access Key ID
    protected $secretAccessKey;

    // Associate Tag
    protected $associateTag;

    // Locale
    protected $locale;

    // URL
    protected $url;

    // End-Point
    protected $endPoints = array(
        self::LOCALE_CA => 'ecs.amazonaws.ca',
        self::LOCALE_DE => 'ecs.amazonaws.de',
        self::LOCALE_FR => 'ecs.amazonaws.fr',
        self::LOCALE_JP => 'ecs.amazonaws.jp',
        self::LOCALE_UK => 'ecs.amazonaws.co.uk',
        self::LOCALE_US => 'ecs.amazonaws.com',
    );
    protected $secureEndPoints = array(
        self::LOCALE_CA => 'aws.amazonaws.ca',
        self::LOCALE_DE => 'aws.amazonaws.de',
        self::LOCALE_FR => 'aws.amazonaws.fr',
        self::LOCALE_JP => 'aws.amazonaws.jp',
        self::LOCALE_UK => 'aws.amazonaws.co.uk',
        self::LOCALE_US => 'aws.amazonaws.com',
    );

    /**
     * set the base parameters such as "AssociateTag" for the request.
     * default parameters are used if you don't specify the parameters.
     *
     * @param array $parameters "key-value" style parameters
     */
    public function __construct($awsAccessKeyId, $secretAccessKey, $associateTag, $locale)
    {
        $this->setAwsAccessKeyId($awsAccessKeyId);
        $this->setSecretAccessKey($secretAccessKey);
        $this->setAssociateTag($associateTag);
        $this->setLocale($locale);
    }

    /**
     * set AWS access key ID
     * @param string $awsAccessKeyId
     */
    public function setAwsAccessKeyId($awsAccessKeyId)
    {
        $this->awsAccessKeyId = $awsAccessKeyId;
    }

    /**
     * set Secret access key
     * @param string $secretAccessKey
     */
    public function setSecretAccessKey($secretAccessKey)
    {
        $this->secretAccessKey = $secretAccessKey;
    }

    /**
     * set Associate tag
     * @param string $associateTag
     */
    public function setAssociateTag($associateTag)
    {
        $this->associateTag = $associateTag;
    }

    /**
     * set Locale
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * get AWS Access key ID
     * @return string
     */
    public function getAwsAccessKeyId()
    {
        return $this->awsAccessKeyId;
    }

    /**
     * get Secret access key
     * @return string
     */
    public function getSecretAccessKey()
    {
        return $this->secretAccessKey;
    }

    /**
     * get Associate tag
     * @return string
     */
    public function getAssociateTag()
    {
        return $this->associateTag;
    }

    /**
     * get locale
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
