# [Corporate UI Dashboard Laravel](https://corporate-ui-dashboard-laravel.creative-tim.com)

![version](https://img.shields.io/badge/version-1.0.0-blue.svg)
[![GitHub issues open](https://img.shields.io/github/issues/creativetimofficial/ct-corporate-ui-dashboard-pro.svg?maxAge=2592000)](https://github.com/creativetimofficial/corporate-ui-dashboard-laravel/issues?q=is%3Aopen+is%3Aissue)
[![GitHub issues closed](https://img.shields.io/github/issues-closed-raw/creativetimofficial/ct-corporate-ui-dashboard-pro.svg?maxAge=2592000)](https://github.com/creativetimofficial/corporate-ui-dashboard-laravel/issues?q=is%3Aissue+is%3Aclosed)

_Frontend version_: Corporate UI Dashboard v1.0.0. More info at https://demos.creative-tim.com/corporate-ui-dashboard/pages/dashboard.html
[ <img src="public/assets/img/thumbnail-free.jpg" width="100%" />](https://corporate-ui-dashboard-laravel.creative-tim.com/?ref=sudl-readme)

Introducing Corporate UI Dashboard Laravel, [Creative Tim](https://creative-tim.com/)'s newest Admin Template designed specifically for professional websites. Using our template, your web app pages will look excellent on all devices and perform flawlessly for a top-notch experience and happy customers.

Corporate UI Dashboard is based on Bootstrap 5 and is made of hundred of elements, designed blocks, and fully coded pages. You can easily customize your projects to match your brand identity and specific needs.

Experience the power of our Admin Template and take your corporate website to the next level!

## Table of Contents

-   [Prerequisites](#prerequisites)
-   [Installation](#installation)
-   [Usage](#usage)
-   [Versions](#versions)
-   [Demo](#demo)
-   [Documentation](#documentation)
-   [Login](#login)
-   [Register](#register)
-   [Forgot Password](#forgot-password)
-   [Reset Password](#reset-password)
-   [User Profile](#my-profile)
-   [Dashboard](#dashboard)
-   [File Structure](#file-structure)
-   [Browser Support](#browser-support)
-   [Reporting Issues](#reporting-issues)
-   [Licensing](#licensing)
-   [Useful Links](#useful-links)
-   [Social Media](#social-media)
-   [Credits](#credits)

## Prerequisites

If you don't already have an Apache local environment with PHP and MySQL, use one of the following links:

-   Windows: https://updivision.com/blog/post/beginner-s-guide-to-setting-up-your-local-development-environment-on-windows
-   Linux & Mac: https://updivision.com/blog/post/guide-what-is-lamp-and-how-to-install-it-on-ubuntu-and-macos

Also, you will need to install Composer: https://getcomposer.org/doc/00-intro.md  
And Laravel: https://laravel.com/docs/10.x

## Installation

1.Unzip the downloaded archive

2.Copy and paste `corporate-dashboard-laravel` folder in your projects folder. Rename the folder to your project's name

3.In your terminal run composer install

4.Copy `.env.example` to `.env` and updated the configurations (mainly the database configuration)

5.In your terminal run `php artisan key:generate`

6.Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables

7.Run `php artisan storage:link` to create the storage symlink (if you are using Vagrant with Homestead for development, remember to ssh into your virtual machine and run the command from there).

## Usage

Register an user or login with data from your database and start testing (make sure to run the migrations and seeders for the credentials to be available).

`admin@corporateui.com` and password `secret`

Besides the dashboard, the auth pages, the billing and tables pages, it has also an edit profile page. All the necessary files are installed out of the box and all the needed routes are added to `routes/web.php`. Keep in mind that all of the features can be viewed once you login using the credentials provided or by registering your own user.

## Versions

[<img src="https://github.com/creativetimofficial/public-assets/blob/master/logos/html-logo.jpg?raw=true" width="60" height="60" />](https://demos.creative-tim.com/corporate-ui-dashboard/pages/dashboard.html)
[<img src="https://github.com/creativetimofficial/public-assets/blob/master/logos/laravel_logo.png?raw=true" width="60" height="60" />](https://corporate-ui-dashboard-laravel.creative-tim.com/?ref=sudl-readme)

| HTML | Laravel |
| --- | --- |
| [![HTML](https://s3.amazonaws.com/creativetim_bucket/products/727/original/corporate-ui-dashboard-pro.jpg?1678117894")](https://www.creative-tim.com/product/corporate-ui-dashboard) | [![Laravel](public/assets/img/thumbnail-free.jpg)](https://www.creative-tim.com/product/corporate-ui-dashboard-laravel)  | 


## Demo

| Register                                                                                                       | Login                                                                                                    | Dashboard                                                                                                        |
| -------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| [<img src="screenshots/register.png" width="322" />](https://corporate-ui-dashboard-laravel.creative-tim.com/signin) | [<img src="screenshots/login.png" width="322" />](https://corporate-ui-dashboard-laravel.creative-tim.com/signup) | [<img src="screenshots/dashboard.png" width="322" />](https://corporate-ui-dashboard-laravel.creative-tim.com/dashboard) |

| Forgot Password Page                                                                                                               | Reset Password Page                                                                                               | Profile Page                                                                                                           |
| ---------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- |
| [<img src="screenshots/forgot-password.png" width="322" />](https://corporate-ui-dashboard-laravel.creative-tim.com/forgot-password) | [<img src="screenshots/reset-password.png" width="322" />](https://corporate-ui-dashboard-laravel.creative-tim.com/signin) | [<img src="screenshots/profile-page.png" width="322" />](https://corporate-ui-dashboard-laravel.creative-tim.com/laravel-examples/user-profile) |

[View More](https://corporate-ui-dashboard-laravel.creative-tim.com/dashboard)

## Documentation

The documentation for the Corporate UI Dashboard Laravel is hosted at our [website](https://www.creative-tim.com/learning-lab/bootstrap/installation-guide/corporate-ui-dashboard).

### Login

The login functionality is fully implemented in our theme helping you to start your project in no time. To login into dashboard you just have to add /login in the URL and fill the login form with one of the credentials (user: `admin@corporateui.com` and password: `secret`).

It uses the auth store located in `app/Http/Controllers/Auth/LoginController`.

```
public function store(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $rememberMe = $request->rememberMe ? true : false;

        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
```

### Register

The register functionality is fully implemented in our theme helping you to start your project in no time. To register a new user you just have to add `/register` in the URL or click on signup link from login page and fill the register form with user details.

It uses the auth store located in `app/Http/Controllers/Auth/Register`.

```
public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:7|max:255',
            'terms' => 'accepted',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'terms.accepted' => 'You must accept the terms and conditions'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
```

### Forgot password

If an existing user forgot his password he has the possibility of resetting his password.

If a user forgets the account's password it is possible to reset the password. For this the user should click on the `"Recover here"` under the login form.

The `app/Http/Controllers/Auth/ForgotPassword` takes care of sending an email to the user where he can reset the password afterwards.

```
public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
```

### Reset password

The user who forgot the password gets an email on the account's email address. The user can access the reset password page by clicking the button found in the email. The link for resetting the password is available for 60 minutes. The user must add the new password and confirm the password for his password to be updated. The user is redirected to the login page.

The `app/Http/Controllers/Auth/ResetPassword` takes care of reseting the password.

```
public function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
```

### My Profile

The profile can be accessed by a logged in user by clicking "**User Profile**" from the sidebar. The user can add information like phone number, location or change name, email and password.

The store used for users form can be found in `app/Http/Controllers/ProfileController`

```
public function update(Request $request)
    {
        if (config('app.is_demo') && in_array(Auth::id(), [1])) {
            return back()->with('error', "You are in a demo version. You are not allowed to change the email for default users.");
        }

        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'location' => 'max:255',
            'phone' => 'max:20|min:10',
            'about' => 'max:255',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
        ]);

        $user = User::find(Auth::id());

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'location' => $request->location,
            'phone' => $request->phone,
            'about' => $request->about,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }
```

### Dashboard

You can access the dashboard either by using the "**Dashboard**" link in the left sidebar or by adding **/dashboard** in the url after logging in.

## File Structure

```
.
|-- app
|   |-- Console
|   |   `-- Kernel.php
|   |-- Exceptions
|   |   `-- Handler.php
|   |-- Http
|   |   |-- Controllers
|   |   |   |-- Auth
|   |   |   |   |-- ForgotPasswordController.php
|   |   |   |   |-- LoginController.php
|   |   |   |   |-- RegisterController.php
|   |   |   |   `-- ResetPasswordController.php
|   |   |   |-- Controller.php
|   |   |   |-- ProfileController.php
|   |   |   `-- UserController.php
|   |   |-- Kernel.php
|   |   `-- Middleware
|   |       |-- Authenticate.php
|   |       |-- EncryptCookies.php
|   |       |-- PreventRequestsDuringMaintenance.php
|   |       |-- RedirectIfAuthenticated.php
|   |       |-- TrimStrings.php
|   |       |-- TrustHosts.php
|   |       |-- TrustProxies.php
|   |       |-- ValidateSignature.php
|   |       `-- VerifyCsrfToken.php
|   |-- Models
|   |   `-- User.php
|   |-- Providers
|   |   |-- AppServiceProvider.php
|   |   |-- AuthServiceProvider.php
|   |   |-- BroadcastServiceProvider.php
|   |   |-- EventServiceProvider.php
|   |   `-- RouteServiceProvider.php
|   `-- View
|       `-- Components
|           |-- AppLayout.php
|           |-- GuestLayout.php
|           `-- navbarGuest.php
...
```
## Browser Support

At present, we officially aim to support the last two versions of the following browsers:

<img src="https://s3.amazonaws.com/creativetim_bucket/github/browser/chrome.png" width="64" height="64"> <img src="https://s3.amazonaws.com/creativetim_bucket/github/browser/firefox.png" width="64" height="64"> <img src="https://s3.amazonaws.com/creativetim_bucket/github/browser/edge.png" width="64" height="64"> <img src="https://s3.amazonaws.com/creativetim_bucket/github/browser/safari.png" width="64" height="64"> <img src="https://s3.amazonaws.com/creativetim_bucket/github/browser/opera.png" width="64" height="64">

## Reporting Issues

We use GitHub Issues as the official bug tracker for the Corporate UI Dashboard. Here are some advices for our users that want to report an issue:

1. Make sure that you are using the latest version of the Corporate UI Dashboard. Check the CHANGELOG from your dashboard on our [website](https://www.creative-tim.com/product/corporate-ui-dashboard).
2. Providing us reproductible steps for the issue will shorten the time it takes for it to be fixed.
3. Some issues may be browser specific, so specifying the browser you encountered the issue on might help.

## Licensing

-   Copyright 2023 [Creative Tim](https://www.creative-tim.com?ref=readme-corporateuidashboard)
-   Creative Tim [license](https://www.creative-tim.com/license?ref=readme-corporateuidashboard)

## Useful Links

-   [Tutorials](https://www.youtube.com/channel/UCVyTG4sCw-rOvB9oHkzZD1w)
-   [Affiliate Program](https://www.creative-tim.com/affiliates/new) (earn money)
-   [Blog Creative Tim](http://blog.creative-tim.com/)
-   [Free Products](https://www.creative-tim.com/bootstrap-themes/free) from Creative Tim
-   [Premium Products](https://www.creative-tim.com/bootstrap-themes/premium?ref=corporateuidashboard-readme) from Creative Tim
-   [React Products](https://www.creative-tim.com/bootstrap-themes/react-themes?ref=corporateuidashboard-readme) from Creative Tim
-   [VueJS Products](https://www.creative-tim.com/bootstrap-themes/vuejs-themes?ref=corporateuidashboard-readme) from Creative Tim
-   [More products](https://www.creative-tim.com/bootstrap-themes?ref=corporateuidashboard-readme) from Creative Tim
-   Check our Bundles [here](https://www.creative-tim.com/bundles??ref=corporateuidashboard-readme)

### Social Media

### Creative Tim

Twitter: <https://twitter.com/CreativeTim?ref=corporateuidashboard-readme>

Facebook: <https://www.facebook.com/CreativeTim?ref=corporateuidashboard-readme>

Dribbble: <https://dribbble.com/creativetim?ref=corporateuidashboard-readme>

Instagram: <https://www.instagram.com/CreativeTimOfficial?ref=corporateuidashboard-readme>

### Updivision:

Twitter: <https://twitter.com/updivision?ref=corporateuidashboard-readme>

Facebook: <https://www.facebook.com/updivision?ref=corporateuidashboard-readme>

Linkedin: <https://www.linkedin.com/company/updivision?ref=corporateuidashboard-readme>

UPDIVISION Blog: <https://updivision.com/blog/?ref=corporateuidashboard-readme>

## Credits

-   [Creative Tim](https://creative-tim.com/?ref=corporateuidashboard-readme)
-   [UPDIVISION](https://updivision.com/?ref=corporateuidashboard-readme)
