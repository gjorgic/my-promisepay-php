<?php
namespace PromisePay;

use PromisePay\Exception;

/**
 * Class Configuration
 * @package PromisePay
 */
class Configuration
{

    /**
     * @var string
     */
    public static $CredentialsFile = '../lib/promisepay-credentials.xml';

    /**
     *
     */
    public function _construct()
    {

    }

    /**
     * @param $data
     * @throws Exception\Credentials
     */
    private function _loadDataFromCredentials($data)
    {
        if(file_exists(self::$CredentialsFile))
        {
            return (string)simplexml_load_file(self::$CredentialsFile)->$data;
        }
        else
        {
            throw new Exception\Credentials(self::$CredentialsFile.' not found!');
        }
    }

    /**
     * @throws Exception\Credentials
     */
    public function getApiUrl()
    {
        return $this->_loadDataFromCredentials('ApiUrl');
    }

    /**
     * @throws Exception\Credentials
     */
    public function getUserLogin()
    {
        return $this->_loadDataFromCredentials('ApiLogin');
    }

    /**
     * @throws Exception\Credentials
     */
    public function getUserPassword()
    {
        return $this->_loadDataFromCredentials('ApiPassword');
    }

    /**
     * @throws Exception\Credentials
     */
    public function getApiKey()
    {
        return $this->_loadDataFromCredentials('ApiKey');
    }
}