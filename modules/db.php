<?php
const HOST = 'localhost';
const DB = 'db_cuahangthoitrang';
const USERNAME = 'root';
const PASSWORD = '';
const CHARSET = 'utf8mb4';

/** @var PDO $db */
$db = null;

function newDB(): void
{
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', HOST, DB, CHARSET);
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    global $db;
    $db = new PDO($dsn, USERNAME, PASSWORD, $options);
}

if($db == null)
{
    newDB();
}

function DB():PDO
{
    global $db;
    return $db;
}

