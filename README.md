## LiveChat Configuration Module
This Magento 2 module enables configuration for LiveChat directly from the Magento admin panel. It allows you to configure the LiveChat license number, groups, and parameters, with validations applied to ensure correct inputs.

### Features
Configuration fields for LiveChat license, groups, and parameters.
Input validation, including license number format and group selection.
The configurations are saved via Magento's system configuration mechanism using system.xml.
 
### Installation
1. Add the Repository to Composer. First, add the GitHub repository to your Composer configuration:

``` 
composer config repositories.aligent_live_chat vcs https://github.com/amilaudana/coding-part-2-v2
``` 
2. Install the Module. Once the repository is added, install the module using:

``` 
composer require amilaudana/coding-part-2-v2:dev-main
``` 

3. Enable the Module. After installation, enable the module and run the Magento setup commands:

``` 
php bin/magento module:enable Aligent_LiveChatConfig
php bin/magento setup:upgrade
php bin/magento setup:di:compile
```
4. Clear Magento Cache. Once enabled, make sure to flush the cache to apply the changes:

``` 
php bin/magento cache:flush
```

### Configuration
After installation, you can configure the LiveChat settings by navigating to the following section in the Magento admin panel:
1. Stores > Configuration
2. Under the Live Chat Configuration section, you'll find the configuration options for:
   * License Number
   * Groups
   * Parameters

### License
This module is licensed under the MIT License. 

