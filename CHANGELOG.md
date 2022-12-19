# Version 5.2.1

## Bugfixes

* none

## Features

* add new config for ignored attribute on update defined in configuration.json
  * Example:
    * Ignore attribute code `msrp_display_actual_price_type` from catalog_product entity on update value
    * Ignore ALL attribute codes from catalog_category entity on update value
```
   "ignore-attribute-value-on-update": {
        "catalog_product": [
            "msrp_display_actual_price_type"
        ],
        "catalog_category": []
    }
```

# Version 5.2.0

## Bugfixes

* none

## Features

* Add #PAC-353 new feature to get magento configuration from api in Pacemaker Enterprise
* Add #PAC-215 option `config-output` as default false to report all configuration json files in logs
  * The command: `bin/import-simple import:debug --config-output=true`

# Version 5.1.0

## Bugfixes

* None

## Features

* Handle black-list.json for dynamic repository statements
 
# Version 5.0.0

## Bugfixes

* Fixed #PAC-206: Prevent finder mappings of different libraries to be overwritten

## Features

* Extend interface with empty attribute value getter
* Extend interface for import explizit filename

# Version 4.0.0

## Bugfixes

* None

## Features

* Add new ConfigurationFactoryInterface

# Version 3.0.0

## Bugfixes

* None

## Features

* Add new method ConfigurationInterface::haveClearArtefacts()

# Version 2.0.0

## Bugfixes

* None

## Features

* Add new method VendorDirConfigurationInterface::isRelative()

# Version 1.0.0

## Bugfixes

* None

## Features

* Initial Release