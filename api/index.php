<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Teruskan request dari Vercel Serverless ke file public/index.php bawaan Laravel
require __DIR__ . '/../public/index.php';
