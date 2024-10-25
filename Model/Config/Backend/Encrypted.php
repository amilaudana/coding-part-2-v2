<?php

namespace Aligent\LiveChatConfig\Model\Config\Backend;

use Magento\Framework\App\Config\Value;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Data\Collection\AbstractDb;

class Encrypted extends Value
{
    /**
     * @var EncryptorInterface
     */
    protected $encryptor;

    /**
     * Constructor.
     *
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $config
     * @param \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
     * @param EncryptorInterface $encryptor
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Config\ScopeConfigInterface $config,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        EncryptorInterface $encryptor,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->encryptor = $encryptor;
        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }

    /**
     * Encrypt value before saving to database
     *
     * @return $this
     */
    public function beforeSave()
    {
        $value = $this->getValue();
        $this->setValue($this->encryptor->encrypt($value));
        return parent::beforeSave();
    }

    /**
     * Decrypt value after loading from database
     *
     * @return $this
     */
    public function afterLoad()
    {
        $value = $this->getValue();
        $this->setValue($this->encryptor->decrypt($value));
        return parent::afterLoad();
    }
}
