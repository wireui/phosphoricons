# WireUi Phosphor Icons
#### _The Phosphor Icons for laravel blade made by WireUI_
WireUI Phosphor Icons is a library of icon components to empower your Laravel and Livewire application development.

Stop creating all icon components from scratch. Get all WireUI Phosphor Icons for free.


### 🔥 Phosphor Icons
Phosphor is a flexible icon family for interfaces, diagrams, presentations — whatever, really. — Development made by [Phosphor Icons].


### 📚 Get Started
#### Prerequisites:
* [Laravel 9.x](https://laravel.com)
* [PHP 8.1](https://www.php.net/releases/8.1/en.php)

#### Install
```bash
composer require wireui/phosphoricons
```

#### How to use it?
You can find a list of all icons and variants on the [Phosphor Icons] website

**Available variants:**
- thin
- light
- fill
- regular
- duotone
- bold

```blade
<x-icon name="user" />
<x-icon name="user" duotone />
<x-icon name="user" variant="fill" />
<x-icon class="w-5 h-5 text-teal-600" name="user" />
```

#### Configuration (Optional)
```.env
# Set the default icon variant. Default = regular
WIREUI_PHOSPHOR_ICONS_VARIANT=fill

# Set the icon alias. Default = icon
WIREUI_PHOSPHOR_ICONS_ALIAS=icons.phosphor
```

#### Publish (Optional)
```bash
php artisan vendor:publish --tag="wireui.phosphoricons.config"
php artisan vendor:publish --tag="wireui.phosphoricons.views"
```


### 📣 Follow the author
Stay informed about WireUI, follow [@ph7jack] on Twitter.

You will you see all the latest news about features, ideas, discussions, and more...


### 💡 Philosophy
WireUI Phosphor Icons is always FREE to anyone who would like to use it.
You can use the Phosphor Icons in your laravel project.

This project is created [PH7-Jack], and it is maintained by the author with the help of the community.

All contributions are welcome!


### 📝 License

[MIT](https://opensource.org/licenses/MIT)


[PH7-Jack]: <https://github.com/PH7-Jack>
[@ph7jack]: <https://twitter.com/ph7jack>
[Phosphor Icons]: <https://phosphoricons.com>
