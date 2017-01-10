<?php
/**
 * Created by PhpStorm.
 * User: yi
 * Date: 22/03/16
 * Time: 9:57 AM
 */

# PHP
// Add these to the top
use Project\Auth\models\AuthModel;

// needs auto loader
include '../autoloader.php';

// This returns username by default,
// if user is not logged in, returns false.
AuthModel::getUser();
// You can also pass in string as parameter to get email, id, role
AuthModel::getUser('email');  // => return user's email
AuthModel::getUser('id');     // => return user's id
AuthModel::getUser('role');   // => return user's role

# JavaScript
// make sure jQuery and bootstrap js are loaded.
// add <script src="/Assets/js/authApp.js"></script> to the bottom of page.
// place <div id="login"></div> at the place you want to have login and register buttons.

// After Login js is loaded, you can call
// login.show(), login.hide() in JavaScript to show and hide login form.

# API
// /Auth/getLogin can be used to get login status if you need it in JavaScript
// When logged in, it returns "{"success": true, "username": "someUserName"}"
// when not logged in, it gives "{"success": false, "error": []}"