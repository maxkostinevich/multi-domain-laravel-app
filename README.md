<p align="center"><a href="https://laravel101.com" target="_blank"><img src="https://user-images.githubusercontent.com/10295466/56030519-b302f780-5d25-11e9-8344-a9690cf54d63.png"></a></p>

---

# Multi-domain Laravel Application

An example of multi-domain/subdomain Laravel application.

### Demo
- Application itself: [HelloCard.pro](https://hellocard.pro).
- [Example](https://max-kostinevich-5ccda7049a1a2.hellocard.pro) of created website.
- [Example](https://maxko.me) of a website with custom domain.

![demo](https://user-images.githubusercontent.com/10295466/57179443-b7cf4d00-6e86-11e9-8ead-17eee576644c.png)

Feel free to register at [HelloCard.pro](https://hellocard.pro) and create a few websites to see how it works.

![demo](https://user-images.githubusercontent.com/10295466/57179442-b7cf4d00-6e86-11e9-890c-3ad538e7de87.png)

**Please note:** This application is created for demo purpose only. 
HTTPS connection may not work properly on custom added domains. To make it work properly, you'll need to implement automatic issuing of SSL certificates depending on your server's settings.


## Setup

### Deployment

```
composer install

php artisan view:clear
php artisan cache:clear
php artisan vendor:publish
php artisan migrate

php artisan storage:link

php artisan config:cache
```

Then change ```APP_DOMAIN``` to the actual domain name of your app.
Email verification is enabled, so do not forget to set proper SMTP settings for outgoing emails.

---
### Want to learn more?
- [Learn](https://laravel101.com/book) how to build **real-world SaaS applications using Laravel**.
- Subscribe to our [Youtube Channel](https://www.youtube.com/channel/UCxcoXXEjRERiLX1ixP-3Vew) to stay up to date with our latest videos.

### Credits
- Frontend Card Design by [Aaron Taylor](https://codepen.io/BeanBaag/pen/dzyGpM)
- How to build multi-domain Laravel application by [Max Kostinevich](https://maxkostinevich.com/blog/multi-domain-laravel)
---
### [MIT License](https://opensource.org/licenses/MIT)
(c) 2019 [Laravel 101](https://laravel101.com) - All rights reserved.