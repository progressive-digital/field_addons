# field_addons
Additional field formatters, widgets and so on.

## How to include it in your Drupal project
Add the repository to your composer.json like this:
```json
"repositories": [
  {
      "type": "composer",
      "url": "https://packages.drupal.org/8"
  },
  {
    "type": "git",
    "url": "https://github.com/progressive-digital/field_addons.git"
  }
]
```

And then require this module:
```bash
composer require 'progressive-digital/field_addons:^1.0'
```
